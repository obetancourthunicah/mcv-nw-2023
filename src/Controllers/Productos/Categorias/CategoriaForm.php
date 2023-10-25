<?php

namespace Controllers\Productos\Categorias;

use Controllers\PublicController;
use Dao\Productos\Categoria as CategoriaDAO;
use Utilities\Site;
use Views\Renderer;

class CategoriaForm extends PublicController
{
    private $mode = 'INS';
    private $viewData = [];
    private $modes = [
        "INS" => "Creando nueva categoria",
        "UPD" => "Editando %s (%s)",
        "DEL" => "Eliminando %s (%s)",
        "DSP" => "Detalle de  %s (%s)"
    ];
    private $categoria = [
        "id" => -1,
        "name" => "",
        "status" => "ACT",
        "create_time" => ""
    ];

    /*
    Init 
    ? IS postback 
        validate
        ejecutar accion
        regresamos a la lista
    Preparamos viewData
    renderizar vista

    */
    public function run(): void
    {
        $this->init();

        $this->prepareViewData();
        $this->render();
    }

    private function init()
    {
        if (isset($_GET["mode"])) {
            if (isset($this->modes[$_GET["mode"]])) {
                $this->mode = $_GET["mode"];
                if($this->mode !== "INS") {
                    if (isset($_GET["id"])){
                        $this->categoria = CategoriaDAO::obtenerCategoriaPorId(intval($_GET["id"]));
                    }
                }
            } else {
                $this->handleError("Oops, el programa no encuentra el modo solicitado, intente de nuevo.");
            }
        } else {
            $this->handleError("Oops, el programa falló, intente de nuevo.");
        }
    }

    private function prepareViewData(){
        $this->viewData["mode"] = $this->mode;
        $this->viewData["categoria"] = $this->categoria;
        if ($this->mode == "INS") {
            $this->viewData["modedsc"] = $this->modes[$this->mode];
        } else {
            $this->viewData["modedsc"] = sprintf(
                $this->modes[$this->mode],
                $this->categoria["name"],
                $this->categoria["id"]
            );
        }
    }

    private function render(){
        Renderer::render("productos/categorias/form", $this->viewData);
    }

    private function handleError($errMsg){
        Site::redirectToWithMsg("index.php?page=Productos-Categorias-CategoriasList", $errMsg);
    }
}

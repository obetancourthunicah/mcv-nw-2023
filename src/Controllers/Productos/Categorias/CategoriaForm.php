<?php

namespace Controllers\Productos\Categorias;

use Controllers\PublicController;
use Dao\Productos\Categoria as CategoriaDAO;
use Utilities\Site;
use Utilities\Validators;
use Views\Renderer;

class CategoriaForm extends PublicController
{
    private $listUrl = "index.php?page=Productos-Categorias-CategoriasList";
    private $mode = 'INS';
    private $viewData = [];
    private $error = [];
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
        if ($this->isPostBack()){
           if($this->validateFormData()){
                $this->categoria["name"] = $_POST["name"];
                $this->categoria["status"] = $_POST["status"];
                $this->processAction();
           }
        }
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
    private function validateFormData(){
         //Si el nombre no esta vacio
         if(Validators::IsEmpty($_POST["name"])){
            $this->error["name_error"] = "Campo es requerido";
        }
        //Sean las opciones correctas
        if(!in_array($_POST["status"], ["INA", "ACT"])) {
            $this->error["status_error"] = "Estado de la categoría es inválido.";
        }
        return count($this->error) == 0;
    }

    private function processAction(){
        switch ($this->mode) {
            case 'INS':
               if ( CategoriaDAO::crearCategoria(
                        $this->categoria["name"],
                        $this->categoria["status"]
                    )
                ) {
                    Site::redirectToWithMsg($this->listUrl, "Categoría creada exitosamente.");
                }
                break;
            case 'UPD':
                if ( CategoriaDAO::actualizarCategoria(
                        $this->categoria["id"],
                        $this->categoria["name"],
                        $this->categoria["status"]
                    )
                ) {
                    Site::redirectToWithMsg($this->listUrl, "Categoría actualizada exitosamente.");
                }
                break;
            case 'DEL':
                if ( CategoriaDAO::deleteCategoria(
                    $this->categoria["id"]
                )
            ) {
                Site::redirectToWithMsg($this->listUrl, "Categoría eliminada exitosamente.");
            }
                break;
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
        //setting category Select values
        $this->viewData["categoria"][$this->categoria["status"]."_selected"] = 'selected';
        //add errors from Form Input
        foreach ($this->error as $key => $error){
            $this->viewData["categoria"][$key] = $error;
        }
    }

    private function render(){
        Renderer::render("productos/categorias/form", $this->viewData);
    }

    private function handleError($errMsg){
        Site::redirectToWithMsg($this->listUrl, $errMsg);
    }
}

<?php
namespace Controllers\Productos\Categorias;

use Controllers\PublicController;
use Dao\Productos\Categoria;
use Views\Renderer;

class CategoriasList extends PublicController {
    public function run():void {
        $dataView = [];
        $dataView["categorias"] = Categoria::obtenerCategorias();

        Renderer::render('productos/categorias/lista', $dataView);
    }
}
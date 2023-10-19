<?php

namespace Controllers\Productos;

use Controllers\PublicController;
use Dao\Productos\Producto;
use Utilities\Site;
use Views\Renderer;

class NewProds extends PublicController {
    public function run():void {
        $viewData["productos"] = Producto::getAllProducts();
        Site::addLink("public/css/cards.css");
        Renderer::render("productos/newprods", $viewData);
    }
}
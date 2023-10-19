<?php
namespace Controllers;

use Views\Renderer;

class FichaDev extends PublicController {

    private $viewData = [];

    public function run():void { //page_load
        $this->viewData["nombre"] = "Orlando J Betancourth";
        $this->viewData["correo"] = "obetancourthunicah@gmail.com";
        Renderer::render("fichadev", $this->viewData);
    }

}
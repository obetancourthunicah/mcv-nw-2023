<?php 

namespace Controllers\Version;

use Controllers\PublicController;
use Dao\Version\Version as VersionDao;
use Views\Renderer;

class Version extends PublicController{
    public function run():void {
        $versions = VersionDao::getAllVersions();
        $viewData = [];
        $viewData["versions"] = $versions;
        $viewData["hasVersionRows"] = count($versions) && true;
        Renderer::render("version/version", $viewData );
    }
}
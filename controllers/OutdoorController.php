<?php

/**
 * Description of OutdoorModel
 * @author Milton Dantas
 */

require_once __DIR__.'/../services/OutdoorService.php';

class OutdoorController {
    private $outdorServer = NULL;
        
    public function __construct() {
        $this->outdorServer = new OutdoorService();
        $listaOutdoors = $this->outdorServer->getOutdoors();
        include __DIR__.'/../views/outdoors.php';
    }
}

$outdoors = new OutdoorController();

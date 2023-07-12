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
        
        if (isset($_POST['action']) && $_POST['action'] === 'eliminar' && isset($_POST['id'])) {
            $idOutdoor = filter_input(INPUT_POST, 'id');
            $this->outdorServer->eliminar($idOutdoor);
        }
        if (isset($_POST['action']) && $_POST['action'] === 'alterar' && isset($_POST['id'])) {
            $idOutdoor = filter_input(INPUT_POST, 'id');
            $tipo = filter_input(INPUT_POST, 'tipo');
            $comuna = filter_input(INPUT_POST, 'comuna');
            $preco = filter_input(INPUT_POST, 'preco');
            $this->outdorServer->alterar($idOutdoor,$tipo, $preco);
        }
        
        $listaOutdoors = $this->outdorServer->getOutdoors();
        include __DIR__.'/../views/outdoors.php';
    }
}

$outdoors = new OutdoorController();

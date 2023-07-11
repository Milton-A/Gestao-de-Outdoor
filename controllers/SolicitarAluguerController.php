<?php

/**
 * Description of SolicitarAluguerModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/SolicitarAluguerService.php';

class SolicitarAluguerController {

    //put your code here
    private $solicitaService = NULL;

    public function __construct() {
        $this->solicitaService = new SolicitarAluguerService();
        if (isset($_POST['action']) && $_POST['action'] === 'aprovar' && isset($_POST['idAluguer'])) {
            $idOutdoor = $_POST['idAluguer'];
            $this->solicitaService->aprovar($idOutdoor);
        }
         if (isset($_POST['action']) && $_POST['action'] === 'reprovar' && isset($_POST['idAluguer'])) {
            $idOutdoor = $_POST['idAluguer'];
            $this->solicitaService->reprovar($idOutdoor);
        }
    }

}

$show = new SolicitarAluguerController();

<?php

/**
 * Description of MunicipioModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/MunicipioService.php';

class MunicipioController {

    //put your code here
    private $municipioService = NULL;

    public function __construct() {
        $this->municipioService = new MunicipioService();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $municipios = $this->municipioService->getMunicipios($id);
        include __DIR__ . '/../views/municipio/municipio.php';
    }


}

// Criando uma instância do controlador e chamando a função showMunicipio
$municipioController = new MunicipioController();
//$municipioController->showMunicipio();
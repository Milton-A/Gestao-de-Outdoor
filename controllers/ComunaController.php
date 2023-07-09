<?php
/**
 * Description of ComunaModel
 *
 * @author Milton Dantas
 */
require_once __DIR__.'/../services/ComunaService.php';

class ComunaController {
    //put your code here
    
    private $comunaService = NULL;
    
    public function __construct() {
        $this->comunaService = new ComunaService();
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $comunas = $this->comunaService->getComunas($id);
        include __DIR__.'/../views/comuna/comuna.php';
    }
}

// Criando uma instância do controlador e chamando a função showMunicipio
$comunaCon = new ComunaController();
//$municipioController->showMunicipio();
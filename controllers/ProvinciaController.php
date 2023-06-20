<?php
/**
 * Description of ProvinciaModel
 *
 * @author Milton Dantas
 */
require_once __DIR__.'/../services/ProvinciaService.php';

class ProvinciaController {
    //put your code here
    
    private $provinciaService = NULL;
    
    public function __construct() {
        $this->provinciaService = new ProvinciaService();
    }
    
    public function showProvincias() {
        $provincias = $this->provinciaService->getProvincias();
        include __DIR__.'/../views/provincia/provincia.php';
    }
}

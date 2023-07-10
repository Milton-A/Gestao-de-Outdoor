<?php

require_once __DIR__.'/./UtilizadorController.php';

class UtilizadorNRegistadoController {
    
    private $utilizadorController = NULL;
    
    public function __construct() {
        $this->utilizadorController = new UtilizadorController();
    }
    
    public function solicitarRegistro() {
        $this->utilizadorController->registrar();
    }
    
    
}

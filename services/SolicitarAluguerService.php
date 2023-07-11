<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of SolicitarAluguerModel
 *
 * @author Milton Dantas
 */

require_once __DIR__.'/./ISolicitarAluguerService.php';
require_once __DIR__.'/../repositories/SolicitarAluguerRepositorie.php';

class SolicitarAluguerService implements ISolicitarAluguerService {
    //put your code here
    private $solicitarRepositorie = NULL;
    
    public function __construct() {
        $this->solicitarRepositorie = new SolicitarAluguerRepositorie();
    }
    
    public function aprovar($id) {
        try {
           $this->solicitarRepositorie->aprovar("Sim", $id);
           return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
     public function reprovar($id) {
        try {
           $this->solicitarRepositorie->aprovar("Reprovado", $id);
           return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

<?php
/**
 * Description of ProvinciaModel
 *
 * @author Milton Dantas
 */

require_once __DIR__.'/../repositories/ProvinciaRepositorie.php';
require_once __DIR__.'/./IProvinciaService.php';

class ProvinciaService implements IProvinciaService{
    //put your code here
    
    private $provinciaRepositorie = NULL;
    
    public function __construct() {
        $this->provinciaRepositorie = new ProvinciaRepositorie();
    }
    
    public function getProvincias() {
        try {
            $res = $this->provinciaRepositorie->selectAll();
            return $res;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

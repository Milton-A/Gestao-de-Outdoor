<?php

/**
 * Description of ComunaModel
 *
 * @author Milton Dantas
 */

require_once __DIR__.'/../repositories/ComunaRepositorie.php';
require_once __DIR__.'/./IComunaService.php';

class ComunaService implements IComunaService{
    //put your code here
    
    private $comunaRepositorie = NULL;
    
    public function __construct() {
        $this->comunaRepositorie = new ComunaRepositorie();
    }
    
    public function getComunas($id) {
        try {
            $res = $this->comunaRepositorie->selectById($id);
            return $res;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

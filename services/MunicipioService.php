<?php
/**
 * Description of MunicipioModel
 *
 * @author Milton Dantas
 */

require_once __DIR__.'/./IMunicipioService.php';
require_once __DIR__.'/../repositories/MunicipioRepositorie.php';

class MunicipioService implements IMunicipioService{
    //put your code here
    
    private $municipioRepositorie = NULL;
    
    public function __construct() {
        $this->municipioRepositorie = new MunicipioRepositorie();
    }
    
    public function getMunicipios($id) {
        try {
            $res = $this->municipioRepositorie->selectById($id);
            return $res;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

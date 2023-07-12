<?php

/**
 * Description of OutdoorModel
 * @author Milton Dantas
 */

require_once __DIR__.'/./IOutdoorService.php';
require_once __DIR__.'/../repositories/OutdoorRepositorie.php';

class OutdoorService implements IOutdoorService {
    //put your code here
    private $outdoorRepositorie = NULL;
    public function __construct() {
        $this->outdoorRepositorie = new OutdoorRepositorie();
    }
    public function getOutdoors() {
        return $this->outdoorRepositorie->selectAll();
    }
    
    public function eliminar($id) {
        $this->outdoorRepositorie->delete($id, "Sim");
    }
    
    public function alterar() {
        $this->alterar();
    }
}

<?php
/**
 * Description of ProvinciaModel
 *
 * @author Milton Dantas
 */

require_once __DIR__.'/../model/ProvinciaModel.php';
require_once __DIR__.'/../dbconfig/DbConnection.php';

class ProvinciaRepositorie {
    //put your code here
    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

     public function selectAll() {
        $provincias = Array();
        $stmt = $this->db->prepare("SELECT * FROM provincia");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $prov) {
        $provincias[] = new ProvinciaModel($prov['idProvincia'], $prov['nome']);
        }
        return $provincias;
    }

}

<?php

/**
 * Description of ComunaModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../model/ComunaModel.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';
require_once __DIR__.'/./IComunaRepositorie.php';

class ComunaRepositorie implements IComunaRepositorie{

    //put your code here

    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM comuna where idMunicipio = :id ");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        $comunas = $stmt->fetchAll(); // Obtenha todos os resultados em vez de apenas uma linha
        $listaComunas = array();

        foreach ($comunas as $comuna) { // Itere sobre os resultados
            $listaComunas[] = new ComunaModel($comuna['idComuna'], $comuna['nome']);
        }

        return $listaComunas;
    }
}

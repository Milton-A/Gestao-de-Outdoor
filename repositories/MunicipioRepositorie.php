<?php

/**
 * Description of MunicipioModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IMunicipioRepositorie.php';
require_once __DIR__.'/../model/MunicipioModel.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';

class MunicipioRepositorie implements IMunicipioRepositorie {

    //put your code here
    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM municipio where idProvincia = :id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        $Municipios = $stmt->fetchAll(); // Obtenha todos os resultados em vez de apenas uma linha
        $listaMunicipios = array();

        foreach ($Municipios as $municipio) { // Itere sobre os resultados
            $listaMunicipios[] = new MunicipioModel($municipio['idMunicipio'], $municipio['nome']);
        }
        return $listaMunicipios;
    }

}

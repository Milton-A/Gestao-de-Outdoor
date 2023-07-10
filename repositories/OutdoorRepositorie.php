<?php

/**
 * Description of OutdoorModel
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IOutdoorRepositorie.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';
require_once __DIR__ . '/../model/OutdoorModel.php';

class OutdoorRepositorie implements IOutdoorRepositorie {

    //put your code here
    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectCount() {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM `outdoor`");
            $stmt->execute();
            $adm = $stmt->fetchColumn(); // Obtenha todos os resultados em vez de apenas uma linha
            return $adm;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectAll() {
        try {
            $stmt = $this->db->prepare("SELECT `idOutdoor`, `tipo`, `idComuna`, `imagem`, `disponibilidade`, `preco` FROM `outdoor`");
            $stmt->execute();
            $outdoors = $stmt->fetchAll(); // Obtenha todos os resultados em vez de apenas uma linha
            $listaOutdoor = array();
            foreach ($outdoors as $cada) { // Itere sobre os resultados
                $listaOutdoor[] = new OutdoorModel($cada['idOutdoor'], $cada['tipo'], $cada['idComuna'], $cada['imagem'], $cada['disponibilidade'], $cada['preco']);
            }
            return $listaOutdoor;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}

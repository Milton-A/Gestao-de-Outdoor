<?php

/**
 * Description of OutdoorModel
 * @author Milton Dantas
 */

require_once __DIR__.'/../model/AluguerModel.php';
require_once __DIR__.'/./ISolicitarAluguerRepositorie.php';
require_once __DIR__.'/../dbconfig/DbConnection.php';

class SolicitarAluguerRepositorie implements ISolicitarAluguerRepositorie{

    //put your code here
    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectCount() {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM `alugueroutdoor`");
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
            $stmt = $this->db->prepare("SELECT `id`,`dataInicio`, `dataFim`, `reciboPagamento`, `idUtilizadorRegistado`, `idOutdoor`, `aprovado` FROM `alugueroutdoor`");
            $stmt->execute();
            $outdoors = $stmt->fetchAll(); // Obtenha todos os resultados em vez de apenas uma linha
            $listaOutdoor = array();
            foreach ($outdoors as $cada) { // Itere sobre os resultados
                $listaOutdoor[] = new AluguerModel($cada['id'],$cada['dataInicio'],$cada['dataFim'], $cada['reciboPagamento'], $cada['idUilizadorRegistado'], $cada['idOutdoor'],$cada['aprovado']);
            }
            return $listaOutdoor;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function aprovar($estado, $id) {
        try {
            $stmt = $this->db->prepare("UPDATE `alugueroutdoor` SET `aprovado`= :estado WHERE id =:id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":estado", $estado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function validarRecibo() {
        
    }

}

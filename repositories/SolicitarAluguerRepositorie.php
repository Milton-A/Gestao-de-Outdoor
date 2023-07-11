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
            $stmt = $this->db->prepare("SELECT `dataInicio`, `dataFim`, `reciboPagamento`,ut.nome as nome,o.tipo as tipo,o.preco as preco, `aprovado`, `id`,a.idOutdoor as idOutdoor FROM `alugueroutdoor` a join utilizadorregistado u on u.idUtilizadorRegistado = a.idUtilizadorRegistado join utilizador ut on ut.idUtilizador = u.idUtilizadorRegistado join outdoor o on o.idOutdoor = a.idOutdoor");
            $stmt->execute();
            $outdoors = $stmt->fetchAll(); // Obtenha todos os resultados em vez de apenas uma linha
            $listaOutdoor = array();
            foreach ($outdoors as $cada) { // Itere sobre os resultados
                $listaOutdoor[] = new AluguerModel($cada['id'],$cada['dataInicio'],$cada['dataFim'], $cada['reciboPagamento'], $cada['nome'], $cada['idOutdoor'],$cada['aprovado'],$cada['preco'], $cada['tipo'] );
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

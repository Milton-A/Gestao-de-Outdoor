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
    
    public function delete($id, $estado){
        try {
            $stmt = $this->db->prepare("UPDATE `outdoor` SET `eliminado`=:estado WHERE idOutdoor =:id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":estado", $estado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function insert($tipo,$idComuna, $imagem, $disponibilidade, $preco, $idGestor, $eliminado)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO `outdoor`(`tipo`, `idComuna`, `imagem`, `disponibilidade`, `preco`, `idGestor`, `eliminado`) VALUES (:tipo,:idComuna,:imagem,:disponibilidade,:preco,:idGestor,:eliminado)");
            $stmt->bindParam(":tipo", $tipo);
            $stmt->bindParam(":idComuna", $idComuna);
            $stmt->bindValue(':imagem', $imagem, PDO::PARAM_LOB);
            $stmt->bindParam(":disponibilidade", $disponibilidade);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindParam(":idGestor", $idGestor);
            $stmt->bindParam(":eliminado", $eliminado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function alterar($id, $tipo,$idComuna, $imagem, $disponibilidade, $preco, $idGestor, $eliminado)
    {
        try {
            $stmt = $this->db->prepare("UPDATE `outdoor` SET `tipo`=:tipo,`idComuna`=:idComuna,`imagem`=:imagem,`disponibilidade`=:disponibilidade,`preco`=:preco,`idGestor`=:idGestor,`eliminado`=:eliminado WHERE idOutdoor = :id");
            $stmt->bindParam(":tipo", $tipo);
            $stmt->bindParam(":idComuna", $idComuna);
            $stmt->bindValue(':imagem', $imagem, PDO::PARAM_LOB);
            $stmt->bindParam(":disponibilidade", $disponibilidade);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindParam(":idGestor", $idGestor);
            $stmt->bindParam(":eliminado", $eliminado);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectCount() {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM `outdoor` WHERE eliminado <> 'Sim'");
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
            $stmt = $this->db->prepare("SELECT `idOutdoor`, `tipo`, `idComuna`, `imagem`, `disponibilidade`, `preco` FROM `outdoor` WHERE eliminado <> 'Sim'");
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

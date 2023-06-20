<?php

/**
 * Description of OutdoorModel
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IOutdoorRepositorie.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';

class OutdoorRepositorie implements IOutdoorRepositorie{
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
}

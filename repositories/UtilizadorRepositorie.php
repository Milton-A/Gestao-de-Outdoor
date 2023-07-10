<?php

/**
 * Description of UtilizadorRepositorie
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../repositories/IUtilizadorRepositorie.php';
require_once __DIR__ . '/../model/Utilizador.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';

class UtilizadorRepositorie implements IUtilizadorRepositorie {

    //put your code here
    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT idUtilizador, senha FROM utilizador WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($password == $user['senha']) {
            $id = $user['idUtilizador'];
            return $id;
        } else {
            return false;
        }
    }

    public function verificaEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM utilizador WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    public function verificaUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM utilizador WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return true;
        } else {
            return false;
        }
    }

}

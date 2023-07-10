<?php

/*
 * Description of GestorModel
 * @author Milton Dantas
 */
require_once __DIR__ . '/../model/GestorModel.php';
require_once __DIR__ . '/./IGestorRepositorie.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';

class GestorRepositorie implements IGestorRepositorie {

    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function insertGestor($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        try {
            $stmt = $this->db->prepare("INSERT INTO `utilizador`(`nome`, `apelido`, `tipoCliente`, `nacionalidade`, `atividadeEmpresa`, `idComuna`, `morada`, `email`, `telemovel`, `username`, `senha`, `eliminado`) VALUES (:nome, :apelido, :tipoCliente, :nacionalidade, :actividadeEmpresa, :comuna, :morada, :email, :telemovel, :username, :senha, :eliminado)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":apelido", $apelido);
            $stmt->bindParam(":tipoCliente", $tipoCliente);
            $stmt->bindParam(":nacionalidade", $nacionalidade);
            $stmt->bindParam(":actividadeEmpresa", $actividadeEmpresa);
            $stmt->bindParam(":comuna", $comuna);
            $stmt->bindParam(":morada", $morada);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telemovel", $telemovel);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":senha", $senha);
            $stmt->bindParam(":eliminado", $eliminado);
            $stmt->execute();
            $id = $this->db->lastInsertId();
            $this->insertId($id);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM utilizador AS u INNER JOIN gestor ON u.idUtilizador = gestor.idGestor where gestor.idGestor = :id ");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        $gestor = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($gestor !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function insertId($id) {
        try {
            $stmt = $this->db->prepare("INSERT INTO gestor (idGestor) VALUES(:id)");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectAll() {
        $stmt = $this->db->prepare("SELECT u.idCliente, u.nome, u.apelido, u.tipoCliente, u.nacionalidade, u.atividadeEmpresa, c.nome AS nomeComuna, u.morada, u.email, u.telemovel FROM utilizador AS u INNER JOIN gestor ON u.idUtilizador = gestor.idGestor INNER JOIN comuna AS c ON c.idComuna = u.idComuna");
        $stmt->execute();
        $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($usersData as $userData) {
            $user = new AdministradorModel(
                    $userData['idUtilizador'],
                    $userData['nome'],
                    $userData['apelido'],
                    $userData['tipoCliente'],
                    $userData['nacionalidade'],
                    $userData['atividadeEmpresa'],
                    $userData['nomeComuna'],
                    $userData['morada'],
                    $userData['email'],
                    $userData['telemovel']
            );
            $users[] = $user;
        }
        return $users;
    }

    public function deleteCliente($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM gestor WHERE idGestor = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $stmt = $this->db->prepare("DELETE FROM utilizador WHERE idUtilizador = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        try {
            $stmt = $this->db->prepare("UPDATE utilizador SET nome = :nome, apelido = :apelido, tipoCliente = :tipoCliente, nacionalidade = :nacionalidade, atividadeEmpresa = :actividadeEmpresa, idComuna = :comuna, morada = :morada, email = :email, telemovel = :telemovel, username = :username, senha = :senha, eliminado = :eliminado WHERE idUtilizador = :id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":apelido", $apelido);
            $stmt->bindParam(":tipoCliente", $tipoCliente);
            $stmt->bindParam(":nacionalidade", $nacionalidade);
            $stmt->bindParam(":actividadeEmpresa", $actividadeEmpresa);
            $stmt->bindParam(":comuna", $comuna);
            $stmt->bindParam(":morada", $morada);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telemovel", $telemovel);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":senha", $senha);
            $stmt->bindParam(":eliminado", $eliminado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectCount() {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM `gestor`");
            $stmt->execute();
            $adm = $stmt->fetchColumn(); // Obtenha todos os resultados em vez de apenas uma linha
            return $adm;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}

<?php

require_once __DIR__ . '/../model/ClienteModel.php';
require_once __DIR__ . '/../dbconfig/DbConnection.php';
require_once __DIR__ . '/../repositories/IClienteRepositorie.php';

class ClienteRepositorie implements IClienteRepositorie {

    private $db;

    public function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function insertCliente($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
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
        try {
            $stmt = $this->db->prepare("SELECT * FROM utilizadorregistado where idUtilizadorRegistado = :id ");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($cliente !== null) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insertId($id) {
        try {
            $stmt = $this->db->prepare("INSERT INTO utilizadorregistado (idUtilizadorRegistado) VALUES(:id)");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectAll() {
        $stmt = $this->db->prepare("SELECT `idUtilizador`, `nome`, `apelido`, `tipoCliente`, `nacionalidade`, `atividadeEmpresa`, `idComuna`, `morada`, `email`, `telemovel`, `username`, `senha`, `eliminado`, estado FROM utilizador u join utilizadorregistado ur on ur.idUtilizadorRegistado = u.idUtilizador");
        $stmt->execute();
        $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($usersData as $userData) {
            $user = new ClienteModel(
                    $userData['idUtilizador'],
                    $userData['nome'],
                    $userData['apelido'],
                    $userData['atividadeEmpresa'],
                    $userData['tipoCliente'],
                    $userData['nome'],
                    $userData['nacionalidade'],
                    $userData['morada'],
                    $userData['email'],
                    $userData['telemovel'],
                    '',
                    '',
                    $userData['eliminado'],
                    $userData['estado']
            );
            $users[] = $user;
        }
        return $users;
    }

    public function deleteCliente($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM utilizadorregistado WHERE idUtilizadorRegistado = :id");
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

    public function setEstado($estado, $id) {
        try {
            $stmt = $this->db->prepare("UPDATE utilizadorregistado SET estado = :estado WHERE idUtilizadorRegistado = :id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":estado", $estado);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectCount() {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM `utilizadorregistado`");
            $stmt->execute();
            $adm = $stmt->fetchColumn(); // Obtenha todos os resultados em vez de apenas uma linha
            return $adm;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}

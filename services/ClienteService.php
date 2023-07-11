<?php

/**
 * Description of ClienteModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../repositories/ClienteRepositorie.php';
require_once __DIR__ . '/./IClienteService.php';

class ClienteService implements IClienteService {

    //put your code here

    private $clienteRepositorie = NULL;

    public function __construct() {
        $this->clienteRepositorie = new ClienteRepositorie();
    }

    public function insertCliente($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        try {
            if ($this->clienteRepositorie->insertCliente($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado))
                mail('adrianonovo33@gmail.com', 'Cadastro de novo Usuário', 'O Usuario: precisa de verificação!', 'From: ' . $email);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        try {
            $this->clienteRepositorie->alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function bloquearCliente($id) {
        try {
            $this->clienteRepositorie->setEstado("bloqueado", $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function desbloquearCliente($id) {
        try {
            $this->clienteRepositorie->setEstado("ativo", $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ativarCliente($id) {
        try {
            $this->clienteRepositorie->setEstado("ativo", $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function showClientes() {
        try {
            return $this->clienteRepositorie->selectAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

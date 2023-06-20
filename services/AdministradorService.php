<?php

/*
 * Description of AdministradorModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IAdministradorService.php';
require_once __DIR__ . '/../repositories/AdministradorRepositorie.php';
require_once __DIR__ . '/../repositories/ClienteRepositorie.php';
require_once __DIR__ . '/../repositories/GestorRepositorie.php';
require_once __DIR__ . '/../repositories/OutdoorRepositorie.php';

class AdministradorService implements IAdministradorService {

    //put your code here
    private $admRepositorie = NULL;
    private $clienteRepositorie = NULL;
    private $gestorRepositorie = NULL;
    private $outdoorRepositorie = NULL;

    public function __construct() {
        $this->admRepositorie = new AdministradorRepositorie();
        $this->clienteRepositorie = new ClienteRepositorie();
        $this->gestorRepositorie = new GestorRepositorie();
        $this->outdoorRepositorie = new OutdoorRepositorie();
    }

    public function insertAdm($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        try {
            $this->admRepositorie->insertAdm($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        try {
            $this->admRepositorie->alterarUtilizador($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteAdministrador($id) {
        try {
            $this->admRepositorie->deleteAdministrador($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function selectAll() {
        try {
            $this->admRepositorie->selectAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function selectById($id) {
        try {
            $this->selectById($id);
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
            $this->clienteRepositorie->setEstado("desbloqueado", $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ativarCliente($id) {
        try {
            $this->clienteRepositorie->setEstado("ativado", $id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function showClientes() {
        return  $this->clienteRepositorie->selectAll();
    }

    public function deleteCliente($id) {
        $this->clienteRepositorie->deleteCliente($id);
    }

    public function criarGestor($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        try {
            $this->gestorRepositorie->insertGestor($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function showGestores(){
        return $this->gestorRepositorie->selectAll();
    }
    public function deleteGestor($id){
        $this->gestorRepositorie->deleteCliente($id);
    }
    
    public function selectCountOutdoor(){
       return $this->outdoorRepositorie->selectCount();
    }
    public function selectCountGestor(){
       return $this->gestorRepositorie->selectCount();
    }
    public function selectCountCliente(){
       return $this->clienteRepositorie->selectCount();
    }
}

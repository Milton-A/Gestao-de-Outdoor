<?php

/*
 * Description of AdministradorModel
 * @author Milton Dantas
 */

require_once __DIR__ . '/../services/AdministradorService.php';
require_once __DIR__ . '/./GestorController.php';

class AdministradorController {

    private $admService = NULL;

    public function __construct() {
        $this->admService = new AdministradorService();
        $op = filter_input(INPUT_GET, 'op');
        $action = isset($op) ? $op : NULL;
        try {
            if ($action === 'addGestor') {
                $this->showCadastrarGestor();
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function showCadastrarGestor() {
        include __DIR__ . '../views/administrador/administradorFormRegisterGestor.php';
    }

    public function redirect($location) {
        header('location: ' . $location);
    }

    public function criarAdm($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        $this->admService->insertAdm($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }

    public function selectAdm($id) {
        $this->admService->selectById($id);
    }

    public function showAdms() {
        $this->admService->selectAll();
    }

    public function showClientes() {
        $clientes = $this->admService->showClientes();
        include __DIR__.'/../views/tabelas/cliente.php';
    }

    public function showGestores() {
        $gestores = $this->admService->showGestores();
        include __DIR__.'/../views/tabelas/gestor.php';
    }

    public function alterarAdm($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        $this->admService->alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }

    public function deleteAdministrador($id) {
        $this->admService->deleteAdministrador($id);
    }

    public function criarGestor($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        $this->admService->criarGestor($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }

    public function getTotalOutdoors() {
        return $this->admService->selectCountOutdoor();
    }

    public function getTotalCliente() {
        return $this->admService->selectCountCliente();
    }

    public function getTotalGestor() {
        return $this->admService->selectCountGestor();
    }

}

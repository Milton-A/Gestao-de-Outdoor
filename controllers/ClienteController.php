<?php
/**
 * Description of ClienteModel
 *
 * @author Milton Dantas
 */

require_once __DIR__.'/../services/ClienteService.php';

class ClienteController {
    private  $clienteService = NULL;
    public function __construct() {
        $this->clienteService = new ClienteService();
        if (isset($_POST['action']) && $_POST['action'] === 'ativarcliente' && isset($_POST['idCliente'])) {
            $idCliente = $_POST['idCliente'];
            $this->clienteService->ativarCliente($idCliente);
        }
        if (isset($_POST['action']) && $_POST['action'] === 'bloquear' && isset($_POST['idCliente'])) {
            $idCliente = $_POST['idCliente'];
            $this->clienteService->bloquearCliente($idCliente);
        }
        if (isset($_POST['action']) && $_POST['action'] === 'desbloquear' && isset($_POST['idCliente'])) {
            $idCliente = $_POST['idCliente'];
            $this->clienteService->desbloquearCliente($idCliente);
        }
         
        
    }   
    public function criarCliente($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
         $this->clienteService->insertCliente($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }
    public function alterarCliente($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado){
        $this->clienteService->alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }
}

$actualizar = new ClienteController();

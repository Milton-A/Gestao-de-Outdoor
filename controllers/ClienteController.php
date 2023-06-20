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
    }   
    public function criarCliente($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
         $this->clienteService->insertCliente($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }
    public function alterarCliente($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado){
        $this->clienteService->alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }
}

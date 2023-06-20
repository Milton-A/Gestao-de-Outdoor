<?php
/**
 * Description of GestorModel
 *
 * @author Milton Dantas
 */
require_once __DIR__.'/../services/GestorService.php';
class GestorController {
    //put your code here
    private $gestorService = NULL;
    public function __construct() {
        $this->gestorService = new GestorService();
    }
    
    public function alterarDados($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        $this->gestorService->alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }
}

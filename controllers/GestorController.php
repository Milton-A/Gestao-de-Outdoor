<?php

/**
 * Description of GestorModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/../services/GestorService.php';

class GestorController {

    //put your code here
    private $gestorService = NULL;

    public function __construct() {
        $this->gestorService = new GestorService();
    }

    public function alterarDados($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        $this->gestorService->alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }
    public function alterarDadosLogin($id,$username, $senha) {
        $this->gestorService->alterarDadosLogin($id,$username, $senha);
    }

    public function inserirOutdoor($tipo, $idComuna, $imagem, $disponibilidade, $preco, $idGestor, $eliminado) {
        try {
            $this->gestorService->inserirOutdoor($tipo, $idComuna, $imagem, $disponibilidade, $preco, $idGestor, $eliminado);
            return true;
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }
    
     public function alterarOutdoor($id, $tipo, $idComuna, $imagem, $disponibilidade, $preco, $idGestor, $eliminado) {
        try {
            $this->gestorService->alterarOutdoor($id,$tipo, $idComuna, $imagem, $disponibilidade, $preco, $idGestor, $eliminado);
            return true;
        } catch (ValidationException $e) {
            $errors = $e->getErrors();
        }
    }

    public function apresentarGestores() {
        $gestores = $this->gestorService->showGestores();
        include __DIR__ . '/../views/tabelas/gestor.php';
    }

    public function apresentarTotalOutdoors() {
        return $this->gestorService->getTotalOutdoors();
    }

    public function apresentarOutdoors() {
        $outdoors = $this->gestorService->showOutdoors();
        include __DIR__ . '/../views/gestor/tabela.php';
    }

    public function apresentarPedidosOutdoors() {
        $outdoors = $this->gestorService->showPedidos();
        include __DIR__ . '/../views/gestor/tabelaPedidos.php';
    }

}

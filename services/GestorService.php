<?php

/**
 * Description of GestorModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IGestorService.php';
require_once __DIR__ . '/../repositories/GestorRepositorie.php';

class GestorService implements IGestorService {

    //put your code here
    private $gestorRepositorie = NULL;

    public function __construct() {
        $this->gestorRepositorie = new GestorRepositorie();
    }

    public function alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        try {
            $this->gestorRepositorie->alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
        } catch (Exception $e) {
            throw $e;
        }
    }
}

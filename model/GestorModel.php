<?php

/*
 * Description of GestorModel
 * @author Milton Dantas
 */
include_once __DIR__.'/./Utilizador.php';

class GestorModel extends Utilizador {
    private $estado;
    public function __construct($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado, $estado) {
        parent::__construct($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado, $estado);
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado): void {
        $this->estado = $estado;
    }
}

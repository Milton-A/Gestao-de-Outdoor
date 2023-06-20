<?php

/*
 * Description of GestorModel
 * @author Milton Dantas
 */
include_once __DIR__.'/./Utilizador.php';

class GestorModel extends Utilizador {
    public function __construct($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        parent::__construct($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }

}

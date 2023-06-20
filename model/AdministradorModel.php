<?php

/*
 * Description of AdministradorModel
 * @author Milton Dantas
 */
require_once __DIR__.'/./Utilizador.php';

class AdministradorModel extends Utilizador{

    public function __construct($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        parent::__construct($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }
}

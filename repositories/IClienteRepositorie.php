<?php

/**
 * Description of ClienteModel
 *
 * @author Milton Dantas
 */
interface IClienteRepositorie {

    //put your code here
    public function insertCliente($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);

    public function selectById($id);

    public function insertId($id);

    public function selectAll();

    public function deleteCliente($id);

    public function alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);

    public function setEstado($estado, $id);
    
    public function selectCount();
}

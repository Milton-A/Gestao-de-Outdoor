<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AdministradorModel
 *
 * @author Milton Dantas
 */
interface IAdministradorService {

    //put your code here
    public function insertAdm($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);

    public function selectById($id);

    public function selectAll();

    public function alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);

    public function deleteAdministrador($id);

    public function deleteCliente($id);

    public function showClientes();

    public function criarGestor($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);

    public function deleteGestor($id);
    
    public function showGestores();
    
    public function selectCountOutdoor();
    public function selectCountCliente();
    public function selectCountGestor();
}

<?php
/**
 * Description of GestorModel
 * @author Milton Dantas
 */
interface IGestorRepositorie {
    //put your code here
   public function insertGestor($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
   public function selectById($id);
   public function insertId($id);
   public function selectAll();
   public function deleteCliente($id);
   public function alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
   public function selectCount();
}

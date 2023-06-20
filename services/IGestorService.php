<?php
/**
 * Description of GestorModel
 *
 * @author Milton Dantas
 */
interface IGestorService {
    //put your code here
   public function alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
}

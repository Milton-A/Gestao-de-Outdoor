<?php

/**
 * Description of GestorModel
 *
 * @author Milton Dantas
 */
interface IGestorService {

    //put your code here
    public function showGestores();

    public function showPedidos();

    public function showOutdoors();

    public function aprovar($id);

    public function getTotalOutdoors();
    
    public function inserirOutdoor($tipo,$idComuna, $imagem, $disponibilidade, $preco, $idGestor, $eliminado);

    public function alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
}

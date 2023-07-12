<?php
/*
 * Description of OutdoorModel
 * @author Milton Dantas
 */
interface IOutdoorRepositorie {
    //put your code here
    public function selectCount();
    public function selectAll();
    public function insert($tipo,$idComuna, $imagem, $disponibilidade, $preco, $idGestor, $eliminado);
    public function delete($id, $estado);
}

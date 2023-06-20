<?php
/**
 * Description of MunicipioModel
 *
 * @author Milton Dantas
 */
class MunicipioModel {
    //put your code here
    private $nome;
    private $idMunicipio;
    
    public function __construct($idMunicipio, $nome) {
        $this->nome = $nome;
        $this->idMunicipio = $idMunicipio;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function getIdMunicipio() {
        return $this->idMunicipio;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setIdMunicipio($idMunicipio): void {
        $this->idMunicipio = $idMunicipio;
    }



}

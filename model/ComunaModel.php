<?php

/**
 * Description of ComunaModel
 *
 * @author Milton Dantas
 */
class ComunaModel {
    //put your code here

    private $idComuna;
    private $nomeComuna;
    private $idMunicipio;

    public function __construct($idComuna, $nome) {
        $this->idComuna = $idComuna;
        $this->nomeComuna = $nome;
    }
   
    public function getIdComuna() {
        return $this->idComuna;
    }

    public function getNomeComuna() {
        return $this->nomeComuna;
    }

    public function getIdMunicipio() {
        return $this->idMunicipio;
    }

    public function setIdComuna($idComuna): void {
        $this->idComuna = $idComuna;
    }

    public function setNomeComuna($nomeComuna): void {
        $this->nomeComuna = $nomeComuna;
    }

    public function setIdMunicipio($idMunicipio): void {
        $this->idMunicipio = $idMunicipio;
    }
}

<?php

/**
 * Description of OutdoorModel
 * @author Milton Dantas
 */
class OutdoorModel {
    //put your code here
    private $idOutdoor;
    private $tipo;
    private $comuna;
    private $imagem;
    private $disponibilidade;
    private $preco;
    
    public function __construct($idOutdoor,$tipo,$comuna, $imagem, $disponibilidade, $preco) {
        $this->idOutdoor = $idOutdoor;
        $this->tipo = $tipo;
        $this->comuna = $comuna;
        $this->imagem = $imagem;
        $this->disponibilidade = $disponibilidade;
        $this->preco = $preco;
    }
    
    public function getIdOutdoor() {
        return $this->idOutdoor;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getDisponibilidade() {
        return $this->disponibilidade;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setIdOutdoor($idOutdoor): void {
        $this->idOutdoor = $idOutdoor;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setImagem($imagem): void {
        $this->imagem = $imagem;
    }

    public function setDisponibilidade($disponibilidade): void {
        $this->disponibilidade = $disponibilidade;
    }

    public function setPreco($preco): void {
        $this->preco = $preco;
    }
}

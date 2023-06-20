<?php

/**
 * Description of OutdoorModel
 * @author Milton Dantas
 */
class OutdoorModel {
    //put your code here
    private $tipo;
    private $provincia;
    private $comuna;
    private $municipio;
    private $imagem;
    private $disponibilidade;
    private $preco;
    private $estadoPagamento;
    
    public function __construct($tipo, $provincia, $comuna, $municipio, $imagem, $disponibilidade, $preco, $estadoPagamento) {
        $this->tipo = $tipo;
        $this->provincia = $provincia;
        $this->comuna = $comuna;
        $this->municipio = $municipio;
        $this->imagem = $imagem;
        $this->disponibilidade = $disponibilidade;
        $this->preco = $preco;
        $this->estadoPagamento = $estadoPagamento;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getMunicipio() {
        return $this->municipio;
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

    public function getEstadoPagamento() {
        return $this->estadoPagamento;
    }

    public function setTipo($tipo): void {
        $this->tipo = $tipo;
    }

    public function setProvincia($provincia): void {
        $this->provincia = $provincia;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setMunicipio($municipio): void {
        $this->municipio = $municipio;
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

    public function setEstadoPagamento($estadoPagamento): void {
        $this->estadoPagamento = $estadoPagamento;
    }   
}

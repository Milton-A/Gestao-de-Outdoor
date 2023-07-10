<?php

/**
 * Description of SolicitarAluguerModel
 *
 * @author Milton Dantas
 */
class AluguerModel {

    //put your code here
    private $dataInicio;
    private $dataFim;
    private $idUsuario;
    private $recibo;
    private $idOutdoor;
    private $aprovado;

    public function __construct($dataInicio, $dataFim, $recibo = null, $idUsuario, $idOutdoor, $aprovado) {
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
        $this->idUsuario = $idUsuario;
        $this->recibo = $recibo;
        $this->idOutdoor = $idOutdoor;
        $this->aprovado = $aprovado;
    }

    public function getAprovado() {
        return $this->aprovado;
    }

    public function setAprovado($aprovado): void {
        $this->aprovado = $aprovado;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataFim() {
        return $this->dataFim;
    }


    public function setDataInicio($dataInicio): void {
        $this->dataInicio = $dataInicio;
    }

    public function setDataFim($dataFim): void {
        $this->dataFim = $dataFim;
    }

    public function setIdUsuario($idUsuario): void {
        $this->idUsuario = $idUsuario;
    }

    public function setIdGestor($idGestor): void {
        $this->idGestor = $idGestor;
    }

    public function getRecibo() {
        return $this->recibo;
    }

    public function getIdOutdoor() {
        return $this->idOutdoor;
    }
    
    public function setRecibo($recibo): void {
        $this->recibo = $recibo;
    }

    public function setIdOutdoor($idOutdoor): void {
        $this->idOutdoor = $idOutdoor;
    }
}

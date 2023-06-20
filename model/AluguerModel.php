<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of SolicitarAluguerModel
 *
 * @author Milton Dantas
 */
class AluguerModel {
    //put your code here
    private $listaOutdoors;
    private $dataInicio;
    private $dataFim;
    private $idUsuario;
    private $idGestor;
    
    public function __construct($listaOutdoors, $dataInicio, $dataFim, $idUsuario, $idGestor) {
        $this->listaOutdoors = $listaOutdoors;
        $this->dataInicio = $dataInicio;
        $this->dataFim = $dataFim;
        $this->idUsuario = $idUsuario;
        $this->idGestor = $idGestor;
    }
    
    public function getListaOutdoors() {
        return $this->listaOutdoors;
    }

    public function getDataInicio() {
        return $this->dataInicio;
    }

    public function getDataFim() {
        return $this->dataFim;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getIdGestor() {
        return $this->idGestor;
    }

    public function setListaOutdoors($listaOutdoors): void {
        $this->listaOutdoors = $listaOutdoors;
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
}

<?php
/**
 * Description of ProvinciaModel
 *
 * @author Milton Dantas
 */
class ProvinciaModel {

    private $idPrivincia;
    //put your code here
    private $nome;
    
    public function __construct($idProvincia, $nome) {
        $this->nome = $nome;
        $this->idPrivincia = $idProvincia;
    }
    public function getNome() {
        return $this->nome;
    }

    public function getIdPrivincia() {
        return $this->idPrivincia;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setIdPrivincia($idPrivincia): void {
        $this->idPrivincia = $idPrivincia;
    }


}

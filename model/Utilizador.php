<?php
/**
 * Description of Utilizador
 *
 * @author Milton Dantas
 */
class Utilizador {
    //put your code here
    private $id;
    private $nome;
    private $apelido;
    private $actividadeEmpresa;
    private $tipoCliente;
    private $comuna;
    private $nacionalidade;
    private $morada;
    private $email;
    private $telemovel;
    private $username;
    private $senha;
    private $eliminado;
    
    public function __construct($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        $this->id = $id;
        $this->nome = $nome;
        $this->apelido = $apelido;
        $this->actividadeEmpresa = $actividadeEmpresa;
        $this->tipoCliente = $tipoCliente;
        $this->comuna = $comuna;
        $this->nacionalidade = $nacionalidade;
        $this->morada = $morada;
        $this->email = $email;
        $this->telemovel = $telemovel;
        $this->username = $username;
        $this->senha = $senha;
        $this->eliminado = $eliminado;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getApelido() {
        return $this->apelido;
    }

    public function getActividadeEmpresa() {
        return $this->actividadeEmpresa;
    }

    public function getTipoCliente() {
        return $this->tipoCliente;
    }

    public function getComuna() {
        return $this->comuna;
    }

    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function getMorada() {
        return $this->morada;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelemovel() {
        return $this->telemovel;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getEliminado() {
        return $this->eliminado;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setApelido($apelido): void {
        $this->apelido = $apelido;
    }

    public function setActividadeEmpresa($actividadeEmpresa): void {
        $this->actividadeEmpresa = $actividadeEmpresa;
    }

    public function setTipoCliente($tipoCliente): void {
        $this->tipoCliente = $tipoCliente;
    }

    public function setProvincia($provincia): void {
        $this->provincia = $provincia;
    }

    public function setMunicipio($municipio): void {
        $this->municipio = $municipio;
    }

    public function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    public function setNacionalidade($nacionalidade): void {
        $this->nacionalidade = $nacionalidade;
    }

    public function setMorada($morada): void {
        $this->morada = $morada;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setTelemovel($telemovel): void {
        $this->telemovel = $telemovel;
    }

    public function setUsername($username): void {
        $this->username = $username;
    }

    public function setSenha($senha): void {
        $this->senha = $senha;
    }

    public function setEliminado($eliminado): void {
        $this->eliminado = $eliminado;
    }
}

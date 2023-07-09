<?php

/**
 * Description of UtilizadorService
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IUtilizadorService.php';
require_once __DIR__ . '/../repositories/UtilizadorRepositorie.php';
require_once __DIR__ . '/../repositories/ClienteRepositorie.php';
require_once __DIR__ . '/../repositories/AdministradorRepositorie.php';
require_once __DIR__ . '/../repositories/GestorRepositorie.php';

class UtilizadorService implements IUtilizadorService {

    //put your code here
    private $utilizadorRepositorie = NULL;
    private $gestorRepositorie = NULL;
    private $clienteRepositorie = NULL;
    private $admRepositorie = NULL;

    public function __construct() {
        $this->utilizadorRepositorie = new UtilizadorRepositorie();
        $this->admRepositorie = new AdministradorRepositorie();
        $this->clienteRepositorie = new ClienteRepositorie();
        $this->gestorRepositorie = new GestorRepositorie();
    }

    public function verificaLogin($username, $senha) {
        try {
            $utilizador = $this->utilizadorRepositorie->login($username, $senha);
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $utilizador;
            if ($utilizador !== NULL) {
                if ($this->isAdm($utilizador)) {
                    return 'adm';
                } else if ($this->isCliente($utilizador) ) {
                    return 'cliente';
                } else if ($this->isGestor($utilizador)) {
                    return'gestor';
                } else {
                    return false;
                }
            }    
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function verificaUsername($username) {
        return $this->utilizadorRepositorie->verificaUsername($username);
    }

    public function verificaEmail($email) {
        return $this->utilizadorRepositorie->verificaEmail($email);
    }

    public function isCliente($id) {
        return $this->clienteRepositorie->selectById($id);
    }

    public function isGestor($id) {
        return $this->gestorRepositorie->selectById($id);
    }

    public function isAdm($id) {
        return $this->admRepositorie->selectById($id);
    }

}

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
            $verLogin = $this->isFirstLogin($utilizador);
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $utilizador;
            
            if ($utilizador !== NULL) {
                if ($this->isAdm($utilizador)) {
                    $_SESSION['tipo'] = "adm";
                    return 'adm';
                } else if ($this->isCliente($utilizador) ) {
                    $_SESSION['tipo'] = "cliente";
                    return 'cliente';
                } else if ($this->isGestor($utilizador) && $verLogin === "Off") {
                    $_SESSION['tipo'] = "gestor";
                    return'alterar';
                }else if ($this->isGestor($utilizador) && $verLogin === "OK") {
                    $_SESSION['tipo'] = "gestor";
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
    
    public function isFirstLogin($id) {
        return $this->gestorRepositorie->isFirstLogin($id);
    }

    public function isAdm($id) {
        return $this->admRepositorie->selectById($id);
    }

}

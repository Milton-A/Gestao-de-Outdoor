<?php

class homeController {

    public function __construct() {
        $op = filter_input(INPUT_GET, 'op');
        $action = isset($op) ? $op : NULL;
        try {
            if ($action === 'cadastrar') {
                
            } else if ($action === 'login') {
                $this->showLogin();
            } else if ($action === 'adm') {
                
            } else if ($action === 'gestor') {
                
            } else {
                $this->showHome();
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }
    
    public function showLogin() {
        include __DIR__ . '/../views/login/loginView.php';
    }
    public function showRegistro() {
        include __DIR__.'/../views/registro/registroView.php';
    }

    public function showHome() {
        include __DIR__ . '/../views/home.php';
    }

}

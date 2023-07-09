<?php

require_once __DIR__ . '/./ClienteController.php';
require_once __DIR__ . '/./AdministradorController.php';
require_once __DIR__ . '/../services/UtilizadorService.php';

class homeController {

    private $admController = NULL;
    private $clienteController = NULL;
    private $gestorController = NULL;
    private $utilizadorService = NULL;

    public function __construct() {

        $this->admController = new AdministradorController();
        $this->gestorController = new GestorController();
        $this->clienteController = new ClienteController();
        $this->utilizadorService = new UtilizadorService();

        $op = filter_input(INPUT_GET, 'op');
        $action = isset($op) ? $op : NULL;
        try {
            if ($action === 'cadastrar') {
                
            } else if ($action === 'login') {
                $this->showLogin();
            } else if ($action === 'adm') {
                $this->showAdmPage();
            }else if ($action === 'logout') {
                $this->showLogOut();
            } else if ($action === 'registrar') {
                $this->showRegistro();
            } else if ($op == 'registroCliente') {
                $this->registrar();
            } else if ($op == 'alterarAdm' || $op == 'alterarGestor' || $op == 'alterarCliente') {
                $this->alterar();
            } else {
                $this->showHome();
                //$this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function showLogOut() {
        session_start();
        session_destroy();
        $this->redirect('index.php');
    }

    public function showLogin() {
        if (isset($_POST['form-login-submitted'])) {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'senha');
            if (empty($username) || empty($password)) {
                echo "<script>alert('Por favor, preencha todos os campos!');</script>";
            } else {
                $utilizador = $this->utilizadorService->verificaLogin($username, $password);
                if ($utilizador === 'cliente') {
                    $this->redirect('index.php?op=cliente');
                } else if ($utilizador === 'gestor') {
                    $this->redirect('index.php?op=gestor');
                } else if ($utilizador === 'adm') {
                    echo "<script>alert('Por favor, preencha todos os campos!');</script>";
                    $this->redirect('index.php?op=adm');
                }
            }
        } else
            include __DIR__ . '/../views/login/loginView.php';
    }

    public function showRegistro() {
        $filterOp = filter_input(INPUT_GET, 'op');
        $filterUser = filter_input(INPUT_GET, 'user');
        $op = isset($filterOp) ? $filterOp : NULL;
        if (isset($_POST['form-register-submeitted'])) {
            echo "<script>alert('Email já utilizado!');</script>";
            $nome = filter_input(INPUT_POST, 'nome');
            $apelido = filter_input(INPUT_POST, 'apelido');
            $actividadeEmpresa = filter_input(INPUT_POST, 'atividadeEmpresa');
            $tipoCliente = filter_input(INPUT_POST, 'tipoCliente');
            $comuna = filter_input(INPUT_POST, 'comuna');
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
            $morada = filter_input(INPUT_POST, 'morada');
            $email = filter_input(INPUT_POST, 'email');
            $telemovel = filter_input(INPUT_POST, 'telemovel');
            $username = filter_input(INPUT_POST, 'userName');
            $senha = filter_input(INPUT_POST, 'senha');
            $eliminado = 0; // Defina o valor de eliminado conforme necessário
            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
            try {
                if (!$this->utilizadorService->verificaEmail($email)) {
                    if (!$this->utilizadorService->verificaUsername($username)) {
                        $this->clienteController->criarCliente($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senhaCriptografada, $eliminado);
                        $this->redirect('index.php?op=login');
                    } else {
                        echo "<script>alert('Username já utilizado!');</script>";
                    }
                } else {
                    echo "<script>alert('Email já utilizado!');</script>";
                }
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        } else
            include __DIR__ . '/../views/registro/registroView.php';
    }

    public function showHome() {
        include __DIR__ . '/../views/home.php';
    }
    
    public function showAdmPage() {
        include __DIR__.'/../views/administrador/administradorView.php';
    }

    public function showError($tittle, $message) {
        include __DIR__ . '/../views/error.php';
    }

    public function alterar() {
        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;
        if (isset($_POST['form-submitted'])) {
            $id = filter_input(INPUT_POST, 'id');
            $nome = filter_input(INPUT_POST, 'nome');
            $apelido = filter_input(INPUT_POST, 'apelido');
            $actividadeEmpresa = filter_input(INPUT_POST, 'atividadeEmpresa');
            $tipoCliente = filter_input(INPUT_POST, 'tipoCliente');
            $comuna = filter_input(INPUT_POST, 'comuna');
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
            $morada = filter_input(INPUT_POST, 'morada');
            $email = filter_input(INPUT_POST, 'email');
            $telemovel = filter_input(INPUT_POST, 'telemovel');
            $username = filter_input(INPUT_POST, 'userName');
            $senha = filter_input(INPUT_POST, 'senha');
            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
            $eliminado = 0; // Defina o valor de eliminado conforme necessário
            try {
                if (!$this->utilizadorService->verificaEmail($email)) {
                    if (!$this->utilizadorService->verificaUsername($username)) {
                        if ($op == 'alterarAdm') {
                            $this->admController->alterarAdm($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senhaCriptografada, $eliminado);
                        } else if ($op == 'alterarCliente') {
                            $this->clienteController->alterarCliente($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senhaCriptografada, $eliminado);
                        } else if ($op == 'alterarGestor') {
                            $this->gestorController->alterarDados($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senhaCriptografada, $eliminado);
                        }
                    } else {
                        echo "<script>alert('Username já utilizado!');</script>";
                    }
                } else {
                    echo "<script>alert('Email já utilizado!');</script>";
                }
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        include __DIR__ . '/../views/registro/header.php';
    }

    public function redirect($location) {
        header('Location: ' . $location);
    }

}

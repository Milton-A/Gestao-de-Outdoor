<?php

require_once __DIR__ . '/./ClienteController.php';
require_once __DIR__ . '/./AdministradorController.php';
require_once __DIR__ . '/../services/UtilizadorService.php';
require_once __DIR__ . '/../model/AluguerModel.php';

class homeController {

    private $admController = NULL;
    private $clienteController = NULL;
    private $gestorController = NULL;
    private $utilizadorService = NULL;
    private $aluger = array();

    public function __construct() {
        $this->admController = new AdministradorController();
        $this->gestorController = new GestorController();
        $this->clienteController = new ClienteController();
        $this->utilizadorService = new UtilizadorService();

        if (isset($_POST['form-aluguer'])) {
            //$preco = filter_input(INPUT_POST, 'precoItem');
            $dataFim = filter_input(INPUT_POST, 'dataFim');
            $dataInicio = filter_input(INPUT_POST, 'dataInicio');
            $idOut = filter_input(INPUT_POST, 'idItem');
            $idU = filter_input(INPUT_POST, 'idUser');
            $this->aluger[] = new AluguerModel($dataInicio, $dataFim, null, $idU, $idOut, "Nao");
        }
        $op = filter_input(INPUT_GET, 'op');
        $opEstado = filter_input(INPUT_GET, 'estado');
        $action = isset($op) ? $op : NULL;
        try {
            if ($action === 'cadastrar') {
                
            } else if ($action === 'login') {
                $this->showLogin();
            } else if ($action === 'gestor') {
                if ($opEstado === 'verPedidos') {
                    $this->showGestorPagePedidos();
                } else if ($opEstado === 'addOutdoor') {
                    $this->showGestorPageAddOutdoor();
                }else if ($opEstado === 'alterarGestor') {
                    $this->showGestorAlterar();
                } else
                    $this->showGestorPage();
            } else if ($action === 'adm') {
                if ($opEstado === 'addGestor') {
                    $this->showRegistro("addGestor");
                } elseif ($opEstado === 'verGestor') {
                    $this->showAdmPageGestor();
                } elseif ($opEstado === 'verOutdoors') {
                    $this->showAdmPageOutdoors();
                } else
                    $this->showAdmPage();
            } else if ($action === 'logout') {
                $this->showLogOut();
            } else if ($action === 'registrar') {
                $this->showRegistro("addCliente");
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
                    $this->redirect('index.php?op=adm');
                }else if ($utilizador === 'alterar') {
                    $this->redirect('index.php?op=gestor&&estado=alterarGestor');
                }
            }
        } else
            include __DIR__ . '/../views/login/loginView.php';
    }

    public function showRegistro($estado) {
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
            $eliminado = 'Nao';
            try {
                if (!$this->utilizadorService->verificaEmail($email)) {
                    if (!$this->utilizadorService->verificaUsername($username)) {
                        if ($estado === "addGestor") {
                            $this->admController->criarGestor($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
                            $to_email = "$email";
                            $subject = "Dados de Login";
                            $body = "Dados de Login (Username: $username && Senha: $senha)! Deverá alterar os dados para poder acessar o sistema";
                            $headers = "From: suporte@GestoaOutdoor.com";

                            if (mail($to_email, $subject, $body)) {
                                echo "Email successfully sent to $to_email...";
                            } else {
                                echo "Email sending failed...";
                            }
                            $this->redirect('index.php?op=login');
                        } else {
                            $this->clienteController->criarCliente($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);

                            $to_email = "adrianonovo33@gmail.com";
                            $subject = "Novo Registro";
                            $body = "Um novo Usuário foi registrado";
                            $headers = "From: $email ";

                            if (mail($to_email, $subject, $body)) {
                                echo "Email successfully sent to $to_email...";
                            } else {
                                echo "Email sending failed...";
                            }

                            $this->redirect('index.php?op=login');
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
        } else
            include __DIR__ . '/../views/registro/registroView.php';
    }

    public function showHome() {
        include __DIR__ . '/../views/home.php';
    }

    public function showAdmPage() {
        include __DIR__ . '/../views/administrador/administradorView.php';
    }

    public function showGestorPage() {
        include __DIR__ . '/../views/gestor/gestorView.php';
    }

    public function showGestorPagePedidos() {
        include __DIR__ . '/../views/gestor/gestorViewPedidos.php';
    }
    
    public function showGestorAlterar() {
        if (isset($_POST['form-alterarD'])) {
            $idGestor = $_SESSION['id'];
            $username = $_POST['username'];
            $senha = $_POST['password'];
            try {
                $this->gestorController->alterarDadosLogin($idGestor, $username, $senha);
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
            $this->redirect('index.php?op=gestor');
        }
        include __DIR__ . '/../views/gestor/gestorAlterarDados.php';
    }

    public function showGestorPageAddOutdoor() {
        include __DIR__ . '/../views/gestor/gestorViewCriar.php';
        if (isset($_POST['form-register-outdoor']) && $_POST['form-register-outdoor'] >0) {
            $idGestor = $_SESSION['id'];
            $id = $_POST['form-register-outdoor'];
            $preco = $_POST['preco'];
            $tipo_outdoor = $_POST['tipo_outdoor'];
            $comuna = $_POST['Comuna'];
            $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
            try {
                $this->gestorController->alterarOutdoor($id, $tipo_outdoor, $comuna, $imagem, "Livre", $preco, $idGestor, "Nao");
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        } else if (isset($_POST['form-register-outdoor']) && $_POST['form-register-outdoor'] == 0) {
            $idGestor = $_SESSION['id'];
            $preco = $_POST['preco'];
            $tipo_outdoor = $_POST['tipo_outdoor'];
            $comuna = $_POST['Comuna'];
            $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
            try {
                $this->gestorController->inserirOutdoor($tipo_outdoor, $comuna, $imagem, "Livre", $preco, $idGestor, "Nao");
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
    }

    public function showAdmPageOutdoors() {
        include __DIR__ . '/../views/administrador/administradorViewOutdoors.php';
    }

    public function showAdmPageGestor() {
        include __DIR__ . '/../views/administrador/administradorViewGestor.php';
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

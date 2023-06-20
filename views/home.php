
<?php
session_start();
// Verificar se o usuário está logado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Usuário logado
    $logado = true;
} else {
    // Usuário não logado
    $logado = false;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>XPTO Solutions</title>
        <link rel="stylesheet" href="content/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="content/css/style.css">
    </head>
    <body>
        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="d-none d-lg-block">XPTO Solution</span>
                </a>
            </div>

            <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="GET" action="#">
                    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                </form>
            </div>
            <?php if ($logado) { ?>
                <form class="d-flex ms-auto me-1">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Aluger
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle me-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <div class="dropdown-menu me-5" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item me-5" href="#">Alterar Dados</a>
                        <a class="dropdown-item me-5" href="views/logout.php">Sair</a>
                    </div>
                </div>
            <?php } else { ?>
                <nav class="header-nav ms-auto">
                    <ul class="d-flex align-items-center">
                        <li><a href="views/login/loginView.php?op=login" class="d-flex btn btn-outline-dark">Entrar</a>
                        </li>
                        <li>
                            <a href = "views/registro/registroView.php?op=registroCliente" class="d-flex btn btn-outline-dark m-3">
                                Registrar-se
                            </a>
                        </li>
                    </ul>
                </nav>
            <?php } ?>
        </header>
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">O melhor da Publicidade</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Encontre o que procura</p>
                </div>
            </div>
        </header>
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php for ($i = 0; $i < 5; $i++) { ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <img class="card-img-top" src="" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">Item 2</h5>
                                        kz40.00 - kz80.00
                                    </div>
                                </div>
                                <?php if ($logado) { ?>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Adicionar a lista</a></div>
                                    </div>
                                <?php } else { ?>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Adicionar a lista</a></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; XPTO Solutions 2023</p></div>
        </footer>
        <<script src="scripts/custom/js/script.js"></script>
    </body>
</html>

<?php
include 'header.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['tipo'] === "gestor") {
    // Usuário logado
    require_once __DIR__ . '/../../controllers/GestorController.php';
    $gestorController = new GestorController();
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php?op=<?php echo $_SESSION['tipo']; ?>">XPTO Gestor Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" id="menu">
                <li class="nav-item" >
                    <a class="nav-link" href="index.php?op=gestor&&estado=verPedidos">Ver Pedidos</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <main class="mx-auto w-75">
        <div class="container">
            <h1>Alterar Nome de Usuário e Senha</h1>
            <form method="post" action="index.php?op=gestor&&estado=alterar">
                <div class="form-group">
                    <label for="username">Novo Nome de Usuário</label>
                    <input type="text" class="form-control" name="username" placeholder="Digite o novo nome de usuário">
                </div>
                <div class="form-group">
                    <label for="password">Nova Senha</label>
                    <input type="password" class="form-control" name="password" placeholder="Digite a nova senha">
                </div>
                <input type="hidden" name="form-alterarD" value="1" />
                <button type="submit" class="btn btn-primary">Alterar</button>
            </form>
        </div>
    </main>
    <?php
    include 'footer.php';
} else
    echo '!!!!Pagina não encontrada';
?>
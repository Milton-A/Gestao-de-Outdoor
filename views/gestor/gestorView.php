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
    <main>
        <div class="dashboard-container">

            <div class="info-detail">
                <h3>Outdores</h3>
                <p> total:
                    <?php echo $gestorController->apresentarTotalOutdoors(); ?>
                </p>
            </div>
            <?php $gestorController->apresentarOutdoors(); ?>
        </div>
    </main>
    <?php
    include 'footer.php';
} else
    echo '!!!!Pagina não encontrada';
?>
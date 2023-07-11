<?php
include 'header.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['tipo'] === "adm") {
    // Usuário logado
    require_once __DIR__ . '/../../controllers/AdministradorController.php';
    $admController = new AdministradorController();
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php?op=<?php echo $_SESSION['tipo']; ?>">XPTO ADM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" id="menu">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=adm">Ver Clientes</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="index.php?op=adm&&estado=verGestor">Ver Gestor</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link" href="index.php?op=adm&&estado=verOutdoors">Ver Outdoors</a>
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
            <div class="card total1">
                <div class="info">
                    <div class="info-detail">
                        <h3>Clientes</h3>
                        <p> total:
                            <?php echo $admController->getTotalCliente(); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card total2">
                <div class="info">
                    <div class="info-detail">
                        <h3>Gestores</h3>
                        <p> total:
                        </p>
                    </div>
                </div>
            </div>
            <div class="card total3">
                <div class="info">
                    <div class="info-detail">
                        <h3>Outdores</h3>
                        <p> total:
                            <?php echo $admController->getTotalOutdoors(); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php $admController->showOutdoors(); ?>
        </div>
    </main>
    <?php
    include 'footer.php';
} else
    echo '!!!!Pagina não encontrada';
?>
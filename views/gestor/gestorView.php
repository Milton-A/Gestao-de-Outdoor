<?php
include 'header.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['tipo'] === "adm") {
    // Usuário logado
    require_once __DIR__ . '/../../controllers/AdministradorController.php';
    $admController = new AdministradorController();
    ?>
    <nav class="navbar">
        <h4>Dashboard</h4>
        <div class="profile">
            <p class="profile-name"> <?php echo $_SESSION['username']; ?></p>
        </div>
    </nav>
    <input type="checkbox" id="toggle">
    <label class="side-toggle" for="toggle"><span class="fas fa-bars"></span></label>
    <div class="sidebar">
        <div class="sidebar-menu">
            <span class="fas fa-clipboard-list"></span><p>Home</p>
        </div>
        <div class="sidebar-menu">
            <span class="fas fa-users"></span>
            <p>Clientes</p>
        </div>
        <div class="sidebar-menu">
            <a href="index.php?op=adm&&estado=addGestor" class="sidebar-link">
                <span class="fas fa-users"></span>
                <p>Gestores</p>
            </a>
        </div>
        <div class="sidebar-menu">
            <span class="fas fa-users"></span>
            <p>Administradores</p>
        </div>
        <div class="sidebar-menu">
            <span class="fas fa-id-card"></span>
            <p>Contactos</p>
        </div>
        <div class="sidebar-menu">
            <span class="fas fa-cog"></span>
            <p>Definições</p>
        </div>
    </div>
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
                            <?php echo $admController->getTotalGestor(); ?>
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
            <div class="card detail">
                <div class="detail-header">
                    <h2>Todos</h2>
                    <button>ver mais..</button>
                </div>
                <?php echo $admController->showClientes(); ?>
            </div>
        </div>
    </main>

    <?php
    include 'footer.php';
} else
echo '!!!!Pagina não encontrada';
?>
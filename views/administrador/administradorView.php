<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Usuário logado
    require_once __DIR__ . '/../../controllers/AdministradorController.php';
    $admController = new AdministradorController();
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Adm Dashboard</title>
            <link rel="stylesheet" href="../../content/css/admStyle.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        </head>
        <body>
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
                    <span class="fas fa-users"></span>
                    <p>Gestores</p>
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
                        <table>
                            <tr>
                                <th>Cod</th>
                                <th>Nome Completo</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                            <?php 
                            $clientes = $admController->showClientes();
                            foreach ($clientes as $cada) {
                            ?>
                            <tr>
                                <td><?php echo $cada->getId(); ?></td>
                                <td><?php echo $cada->getNome()." ".$cada->getApelido(); ?></td>
                                <td><?php echo $cada->getEmail(); ?></td>
                                <td><span class="status ativo"><i class="fas fa-circle"></i> <?php echo $cada->getEstado(); ?></span></td>
                                <td><button>Ativar</button><button>Bloquear</button><button>Desbloquear</button></td>
                            </tr>
                            <tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </main>
        </body>
    </html>
    <?php
}
echo '!!!!Pagina não encontrada';
?>
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
    <form method="POST" action="processar_form.php">
        <h2>Inserir Informações do Outdoor</h2>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" id="preco" required>

        <label for="tipo_outdoor">Tipo de Outdoor:</label>
        <select name="tipo_outdoor" id="tipo_outdoor" required>
            <option value="PaineisLuminosos">Paineis Luminosos</option>
            <option value="PaineisNaoLuminosos">Paineis Não Luminosos</option>
            <option value="Faixadas">Faixadas</option>
            <option value="PlacasIndicativas">Placas Indicativas</option>
            <option value="Lampoles">Lampoles</option>
        </select>

        <label for="provincia">Província:</label>
        <input type="text" name="provincia" id="provincia" required>

        <label for="municipio">Município:</label>
        <input type="text" name="municipio" id="municipio" required>

        <label for="comuna">Comuna:</label>
        <input type="text" name="comuna" id="comuna" required>

        <label for="estado">Estado Inicial:</label>
        <select name="estado" id="estado" required>
            <option value="disponivel">Disponível</option>
            <option value="aguardar_pagamento">A Aguardar Pagamento</option>
            <option value="por_validar_pagamento">Por Validar Pagamento</option>
            <option value="ocupado">Ocupado</option>
        </select>

        <input type="submit" value="Inserir">
    </form>
    <?php
    include 'footer.php';
} else
    echo '!!!!Pagina não encontrada';
?>
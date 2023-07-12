<?php
include 'header.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['tipo'] === "gestor") {
    // Usuário logado
    $idO = $_GET['idO'];
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php?op=gestor&&estado=verPedidos">Ver Pedidos</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-text text-primary">
                        <?php echo $_SESSION['username']; ?>
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="index.php?op=logout">Sair</a>
                </li>
            </ul>
        </div>
    </nav>

    <form method="POST" class="mt-4" enctype="multipart/form-data">
        <div class="container">
            <h2 class="text-center">Inserir Informações do Outdoor</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <input type="text" name="preco" id="preco" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="rowr">
                <div class="">
                    <div class="form-group">
                        <label for="tipo_outdoor">Tipo de Outdoor:</label>
                        <select name="tipo_outdoor" id="tipo_outdoor" class="form-control" required>
                            <option value="PaineisLuminosos">Paineis Luminosos</option>
                            <option value="PaineisNaoLuminosos">Paineis Não Luminosos</option>
                            <option value="Faixadas">Faixadas</option>
                            <option value="PlacasIndicativas">Placas Indicativas</option>
                            <option value="Lampoles">Lampoles</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <?php
                    include __DIR__ . '/../../controllers/ProvinciaController.php';
                    $provincia = new ProvinciaController();
                    $provincia->showProvincias();
                    ?>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Município:</label>
                        <select class="form-control" name="Municipio" id="Municipio">
                            <option>Selecione um Município</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Comuna:</label>
                        <select class="form-control" name="Comuna" id="Comuna">
                            <option>Selecione uma Comuna</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="imagem">Imagem:</label>
                        <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100">Inserir</button>
                    <input type="hidden" name="form-register-outdoor" value="<?php if($idO ==NULL) {echo 0; }else{echo $idO;}?>" />
                </div>
            </div>
        </div>
    </form>

    <?php
    include 'footer.php';
} else
    echo '!!!!Pagina não encontrada';
?>

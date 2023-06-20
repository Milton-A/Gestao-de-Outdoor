
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../content/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../content/css/style.css">
        <title>Registro</title>
    </head>
    <body>
        <main>
            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div>
                                <a href="../../index.php" class="col-12 ">
                                   <button type="button" class="btn-close btn btn-danger p-2" disabled aria-label="Close"></button>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center py-4">
                                    <a href="../../index.php" class="logo d-flex align-items-center w-auto">
                                        <span class="d-none d-lg-block">XPTO Solutions</span>
                                    </a>
                                </div>
                                <div class="card card-register mb-3">
                                    <div class="card-body">
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Criar uma conta</h5>
                                            <p class="text-center small">Insira os dados pessoais</p>
                                        </div>
                                        <form method="post" class="row g-3">
                                            <div class="row g-3">
                                                <hr>
                                                <div class="col">
                                                    <label class="form-label">Nome</label>
                                                    <input type="text" class="form-control" name="nome" placeholder="Nome">
                                                </div>
                                                <div class="col">
                                                    <label class="form-label">Apelido</label>
                                                    <input type="text" class="form-control" name="apelido"  placeholder="Apelido">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Confirmar Email</label>
                                                <input type="email" class="form-control" name="confirmarEmail" placeholder="Confirmar Email">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Telefone</label>
                                                <input type="text" class="form-control" name="telefone" placeholder="Telefone">
                                            </div>
                                            <hr>
                                            <div class="col-12">
                                                <label class="form-label">Morada</label>
                                                <input type="text" class="form-control" name="morada" placeholder="rua 5, casa S Nº 25, maianga">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Nacionalidade</label>
                                                <input type="text" class="form-control" name="nacionalidade" placeholder="Nacionalidade">
                                            </div>
                                            <?php
                                            include __DIR__ . '/../../controllers/ProvinciaController.php';
                                            $provincia = new ProvinciaController();
                                            $provincia->showProvincias();
                                            include __DIR__ . '/../../controllers/MunicipioController.php';
                                            include __DIR__ . '/../../controllers/ComunaController.php';
                                            ?>
                                            <hr>

                                            <div class="col-md-4">
                                                <label class="form-label">Tipo Cliente</label>
                                                <select class="form-select" name="tipoCliente">
                                                    <option>Particular</option>
                                                    <option>Empresa</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Actividade Empresa</label>
                                                <input type="text" class="form-control" name="atividadeEmpresa">
                                            </div>
                                            <hr>
                                            <div class="row g-3">
                                                <div class="col">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" class="form-control" name="userName" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Senha</label>
                                                <input type="password" class="form-control" name="senha" placeholder="Senha">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Confirmar Senha</label>
                                                <input type="password" class="form-control" name="confirmarSenha" placeholder="Confirmar Senha">
                                            </div>
                                            <div class="col-12">

                                                <button type="submit" class="btn btn-primary" name="btn-save">
                                                    Criar
                                                </button>  
                                                <input type="hidden" name="form-submitted" value="1" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <<script src="../../scripts/custom/js/scritpProvincia.js"></script>
        </main>
        <?php
        include_once 'footer.php';
        
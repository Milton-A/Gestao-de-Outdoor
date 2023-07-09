<?php
 include_once 'header.php';
?>
<main>
            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div>
                            <a href="index.php" class="col-12 ">
                                   <button type="button" class="btn-close btn btn-danger p-2" disabled aria-label="Close"></button>
                                </a>
                            </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                                <div class="d-flex justify-content-center py-4">
                                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                                        <span class="d-none d-lg-block">XPTO Solutions</span>
                                    </a>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Faça Login</h5>
                                        </div>
                                        <form method="post" class="row g-3 needs-validation">
                                            <div class="col-12">
                                                <label class="form-label">Username</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    <input type="text" name="username" class="form-control" id="username" required>
                                                    <div class="invalid-feedback">Insira um username.</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <input type="password" name="senha" class="form-control" id="senha" required>
                                                <div class="invalid-feedback">insira uma Senha!</div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                    <label class="form-check-label" for="rememberMe">Lembrar</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit">Login</button>
                                            </div>
                                            <input type="hidden" name="form-login-submitted" value="1" />
                                            <div class="col-12">
                                                <p class="small mb-0">Não tem uma conta? <a href="pages-register.html">Criar Conta</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <?php
        include_once 'footer.php';

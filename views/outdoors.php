<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $_SESSION['carrinho'] = [];
    $logado = true;
} else {
    // Usuário não logado
    $logado = false;
}
foreach ($listaOutdoors as $cada):
    ?>
    <div class="col mb-5">
        <div class="card h-100">
            <?php
            $imagem = $cada->getImagem();
            if ($imagem !== null) {
                $imagemBase64 = base64_encode($imagem);
                $imagemURL = "data:image/jpeg;base64," . $imagemBase64;
                // Exibe a imagem usando a URL gerada
                echo '<img class="card-img-top" src="' . $imagemURL . '" alt="..." />';
            } else {
                echo '<img class="card-img-top" src="caminho-para-imagem-placeholder.jpg" alt="Imagem não disponível" />';
            }
            ?>
            <div class="card-body p-4">
                <div class="text-center">
                    <h5 class="fw-bolder"><?php echo $cada->getTipo(); ?></h5>
                    kz<?php echo $cada->getPreco(); ?>
                </div>
            </div>
            <?php if ($logado) { ?>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center">
                        <a class="btn btn-outline-dark mt-auto" href="#" data-toggle="modal">Adicionar a lista</a>
                    </div>
                </div>
            <?php } else { ?>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <p>Login Necessário!!!</p>
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="index.php?op=login">Adicionar a lista</a></div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="modal fade" id="listaModal" tabindex="-1" role="dialog" aria-labelledby="listaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="listaModalLabel">Lista de Itens</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul id="listaItens"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

<?php endforeach ?>
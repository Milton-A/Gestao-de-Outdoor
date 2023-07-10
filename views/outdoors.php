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
    <div class="modal fade" id="adicionarListaModal" tabindex="-1" role="dialog" aria-labelledby="adicionarListaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adicionarListaModalLabel">Adicionar à lista</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="adicionarListaForm">
                    <div class="modal-body">
                        <!-- Formulário de adição à lista -->
                        <div class="form-group">
                            <label for="idItem">Id do item:</label>
                            <h5 class="fw-bolder"><?php echo $cada->getTipo(); ?></h5>
                            <input type="text" class="form-control" id="idItem" name="idItem" readonly value="<?php echo $cada->getTipo(); ?>">
                            <input type="hidden" name="idUser" value="<?php echo $_SESSION['id']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="precoItem">Preço do item:</label>
                            <input type="text" class="form-control" id="precoItem" name="precoItem" readonly value="<?php echo $cada->getPreco(); ?>">
                        </div>
                        <div class="form-group">
                            <label for="dataInicio">Data de início:</label>
                            <input type="date" class="form-control" id="dataInicio" name="dataInicio">
                        </div>

                        <div class="form-group">
                            <label for="dataFim">Data de fim:</label>
                            <input type="date" class="form-control" id="dataFim" name="dataFim">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="form-aluguer" value="1" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" id="adicionarListaBtn">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                        <a class="btn btn-outline-dark mt-auto" href="#" data-toggle="modal" data-target="#adicionarListaModal" onclick="adicionarLista()">Adicionar a lista</a>
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

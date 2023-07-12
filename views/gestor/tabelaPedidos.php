<div class="card info-detail mt-3">
    <div class="card-body">
        <h3 class="card-title m-3">Pedidos Registados</h3>
        <table id="listarDados" class="table">
            <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Data Inicio</th>
                    <th scope="col">Data Fim</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Aprovado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($outdoors as $cada): ?>
                    <tr>
                        <td><?php echo $cada->getId(); ?></td>
                        <td><?php echo $cada->getTipo() ?></td>
                        <td><?php echo $cada->getIdUsuario(); ?></td>
                        <td><?php echo $cada->getDataInicio(); ?></td>
                        <td><?php echo $cada->getDataFim(); ?></td>
                        <td><?php echo "Kz " . $cada->getPreco() . ",00"; ?></td>
                        <td>
                            <span class="status
                            <?php
                            if ($cada->getAprovado() === 'Nao') {
                                echo 'off';
                            } else if ($cada->getAprovado() === 'Reprovado') {
                                echo 'bloqueado';
                            } else if ($cada->getAprovado() === 'Sim') {
                                echo 'ativo';
                            }
                            ?>">
                                <i class="fas fa-circle"></i> <?php echo $cada->getAprovado(); ?>
                            </span>
                        </td>
                        <td>
                            <button id="aprovar" class="btn btn-primary btn-sm">Aprovar</button>
                            <button id="reprovar" class="btn btn-danger btn-sm">Reprovar</button>
                            <button id="baixarRecibo" class="btn btn-secondary btn-sm">Baixar</button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
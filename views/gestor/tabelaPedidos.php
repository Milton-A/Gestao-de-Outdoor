<div class="card detail">
    <div class="detail-header">
        <h2>Outdoors Registrados</h2>
        <button>ver mais..</button>
    </div>
    <table id="listarDados">
        <tr>
            <th>Cod</th>
            <th>Tipo</th>
            <th>Cliente</th>
            <th>Data Inicio</th>
            <th>Data Fim</th>
            <th>Preço</th>
            <th>Aprovado</th>
            <th></th>
        </tr>
        <?php
        foreach ($outdoors as $cada) {
            ?>
            <tr>
                <td><?php echo $cada->getId(); ?></td>
                <td><?php echo $cada->getTipo() ?></td>
                <td><?php echo $cada->getIdUsuario(); ?></td>
                <td><?php echo $cada->getDataInicio(); ?></td>
                <td><?php echo $cada->getDataFim(); ?></td>
                <td><?php echo "Kz " . $cada->getPreco() . ",00"; ?></td>
                <td><span class="status
                    <?php
                    if ($cada->getAprovado() === 'Nao') {
                        echo 'off';
                    } else if ($cada->getAprovado() === 'Reprovado') {
                        echo 'bloqueado';
                    } else if ($cada->getAprovado() === 'Sim') {
                        echo 'ativo';
                    }
                    ?>"><i class="fas fa-circle"></i> <?php echo $cada->getAprovado(); ?></span></td>
                <td>
                    <button id="aprovar">Aprovar</button>
                    <button id="reprovar">Reprovar</button>
                    <button id="aprovar">Baixar Recibo</button>
                </td>
            </tr>
            <tr>
            <?php } ?>
    </table>

</div>
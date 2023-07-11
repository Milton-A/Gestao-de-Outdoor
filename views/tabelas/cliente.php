
<div class="card detail">
    <div class="detail-header">
        <h2>Usuarios Registrados</h2>
        <button>ver mais..</button>
    </div>

    <table id="listarDados">
        <tr>
            <th>Cod</th>
            <th>Nome Completo</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Comuna</th>
            <th></th>
        </tr>
        <?php
        foreach ($clientes as $cada) {
            ?>
            <tr>
                <td><?php echo $cada->getId(); ?></td>
                <td><?php echo $cada->getNome() . " " . $cada->getApelido(); ?></td>
                <td><?php echo $cada->getEmail(); ?></td>
                <td><?php echo $cada->getComuna(); ?></td>
                <td><span class="status
                    <?php
                    if ($cada->getEstado() === 'Off') {
                        echo 'off';
                    } else if ($cada->getEstado() === 'bloqueado') {
                        echo 'bloquado';
                    } else if ($cada->getEstado() === 'ativo') {
                        echo 'ativo';
                    }
                    ?>"><i class="fas fa-circle"></i> <?php echo $cada->getEstado(); ?></span>
                </td>
                <td>
    <?php if ($cada->getEstado() === "Off") { ?>
                        <button id="ativar">Ativar</button>
                    <?php } else { ?>
                        <button id="bloquear">Bloquear</button>
                        <button id="desbloquear">Desbloquear</button>
    <?php } ?>
                </td>
            </tr>
            <tr>
<?php } ?>
    </table>

</div>
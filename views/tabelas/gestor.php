
<div class="card detail">
    <div class="detail-header">
        <h2>Gestores Registrados</h2>
        <button>ver mais..</button>
    </div>

    <a href="index.php?op=adm&&estado=addGestor" class="sidebar-link">
        <button>Novo Gestor</button>
    </a>
    <br>
    <table id="listarDados">
        <tr>
            <th>Cod</th>
            <th>Nome Completo</th>
            <th>Email</th>
            <th>Estado</th>
        </tr>
        <?php
        foreach ($gestores as $cada) {
            ?><tr>
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
            </tr>
            <tr>
            <?php } ?>
    </table>

</div>
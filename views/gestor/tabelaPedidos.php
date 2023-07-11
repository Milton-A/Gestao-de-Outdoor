<div class="card detail">
    <div class="detail-header">
        <h2>Outdoors Registrados</h2>
        <button>ver mais..</button>
    </div>
    <table id="listarDados">
        <tr>
            <th>Cod</th>
            <th>Tipo</th>
            <th>Comuna</th>
            <th>Disponibilidade</th>
            <th>Preço</th>
        </tr>
        <?php
        foreach ($outdoors as $cada) {
            ?>
            <tr>
                <td><?php echo $cada->getIdOutdoor(); ?></td>
                <td><?php echo $cada->getTipo() ?></td>
                <td><?php echo $cada->getComuna(); ?></td>
                <td><span class="status ativo"><i class="fas fa-circle"></i> <?php if($cada->getDisponibilidade() === 0) echo 'Livre'; else  echo 'Ocupado';  ?></span></td>
                <td><?php echo $cada->getPreco(); ?></td>
            </tr>
            <tr>
            <?php } ?>
    </table>

</div>
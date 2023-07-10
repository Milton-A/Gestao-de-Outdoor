<table id="listarDados">
    <tr>
        <th>Cod</th>
        <th>Tipo</th>
        <th>Comuna</th>
        <th>Disponibilidade</th>
        <th>Preço</th>
        <th></th>
    </tr>
    <?php
    
    foreach ($clientes as $cada) {
        ?>
        <tr>
            <td><?php echo $cada->getId(); ?></td>
            <td><?php echo $cada->getNome() . " " . $cada->getApelido(); ?></td>
            <td><?php echo $cada->getEmail(); ?></td>
            <td><span class="status ativo"><i class="fas fa-circle"></i> <?php echo $cada->getEstado(); ?></span></td>
            <td><button>Ativar</button><button>Bloquear</button><button>Desbloquear</button></td>
        </tr>
        <tr>
        <?php } ?>
</table>
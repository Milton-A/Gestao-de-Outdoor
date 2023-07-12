<div class="card info-detail mt-3">
    <div class="card-body">
        <h3 class="card-title m-3">Outdoors Registados</h3>
        <table id="listarDados" class="table">
            <thead>
                <tr>
                    <th scope="col">Cod</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Comuna</th>
                    <th scope="col">Disponibilidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($outdoors as $cada) {
                    ?>
                    <tr>
                        <td><?php echo $cada->getIdOutdoor(); ?></td>
                        <td><?php echo $cada->getTipo() ?></td>
                        <td><?php echo $cada->getComuna(); ?></td>
                        <td>
                            <span class="status ativo">
                                <i class="fas fa-circle"></i> 
                                <?php
                                if ($cada->getDisponibilidade() !== "Ocupado")
                                    echo 'Livre';
                                else
                                    echo 'Ocupado';
                                ?>
                            </span>
                        </td>
                        <td>
                            <?php echo $cada->getPreco(); ?>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" id="eliminar">Eliminar</button>
                            <a class="btn btn-primary btn-sm" href="index.php?op=gestor&&estado=addOutdoor&&idO=<?php echo $cada->getIdOutdoor(); ?>">Alterar</a>
                        </td>
                    </tr>
                    <tr>
                    <?php } ?>
            </tbody>
        </table>

    </div>
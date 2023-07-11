<?php

/**
 * Description of SolicitarAluguerModel
 *
 * @author Milton Dantas
 */
interface ISolicitarAluguerRepositorie {
    public function selectCount();
    public function selectAll();
    public function validarRecibo();
    public function aprovar($estado, $id);
}

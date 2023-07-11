<?php

/**
 * Description of SolicitarAluguerModel
 *
 * @author Milton Dantas
 */
interface ISolicitarAluguerRepositorie {
    public function selectCount();
    public function selectAll();
    public function aprovar();
    public function validarRecibo();
}

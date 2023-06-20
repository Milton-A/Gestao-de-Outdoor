<?php

/**
 *
 * @author Milton Dantas
 */
interface IUtilizadorService {
    //put your code here
    public function verificaLogin($username, $senha);
    public function verificaUsername($username);
    public function verificaEmail($email);
    public function isAdm($id);
    public function isGestor($id);
    public function isCliente($id);
}

<?php

/**
 *
 * @author Milton Dantas
 */
interface IUtilizadorRepositorie {
    //put your code here
    public function login($username, $password);
    public function verificaEmail($email);
    public function verificaUsername($username);
}

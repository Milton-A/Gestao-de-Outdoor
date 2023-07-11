<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of SolicitarAluguerModel
 *
 * @author Milton Dantas
 */
interface ISolicitarAluguerService {
    //put your code here
    public function aprovar($id);
    public function reprovar($id);
}

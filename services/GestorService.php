<?php

/**
 * Description of GestorModel
 *
 * @author Milton Dantas
 */
require_once __DIR__ . '/./IGestorService.php';
require_once __DIR__ . '/../repositories/GestorRepositorie.php';
require_once __DIR__.'/../repositories/OutdoorRepositorie.php';
require_once __DIR__.'/../repositories/SolicitarAluguerRepositorie.php';

class GestorService implements IGestorService {

    //put your code here
    private $gestorRepositorie = NULL;
    private $outdoorRepositorie = NULL;
    private $solicitaAl = NULL;
    
    public function __construct() {
        $this->gestorRepositorie = new GestorRepositorie();
        $this->outdoorRepositorie = new OutdoorRepositorie();
        $this->solicitaAl = new SolicitarAluguerRepositorie();
    }

    public function alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
        try {
            $this->gestorRepositorie->alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    public function showGestores()
    {
        try{
           return $this->gestorRepositorie->selectAll();
        } catch (Exception $ex) {
            throw $e;
        }
    }
    
    public function showOutdoors()
    {
        try{
           return $this->outdoorRepositorie->selectAll();
        } catch (Exception $ex) {
            throw $e;
        }
    }
    
    public function aprovar($id)
    {
        try{
           return $this->solicitaAl->aprovar("Sim", $id);
        } catch (Exception $ex) {
            throw $e;
        }
    }
    
    public function getTotalOutdoors() {
        try{
           return $this->outdoorRepositorie->selectCount();
        } catch (Exception $ex) {
            throw $e;
        }
    }
}

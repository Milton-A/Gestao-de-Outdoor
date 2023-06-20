<?php
/*
 * Description of AdministradorModel
 * @author Milton Dantas
 */

require_once __DIR__.'/../services/AdministradorService.php';
require_once __DIR__.'/./GestorController.php';

class AdministradorController {
    private $admService = NULL;
    
    public function __construct(){
        $this->admService = new AdministradorService();
    }
    
    public function redirect($location){
        header('location: '.$location);
    }
    
    public function criarAdm($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado) {
         $this->admService->insertAdm($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }
    public function selectAdm($id){
        $this->admService->selectById($id);
    }
    public function bloquearCliente($id){
        $this->admService->bloquearCliente($id);
    }
    public function desbloquearCliente($id){
        $this->admService->desbloquearCliente($id);
    }
    public function ativarCliente($id){
        $this->admService->ativarCliente($id);
    }
    public function showAdms(){
        $this->admService->selectAll();
    }
    public function showClientes(){
       return $this->admService->showClientes();
    }
    public function showGestores(){
       return $this->admService->showGestores();
    }
    public function alterarAdm($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado){
        $this->admService->alterarUtilizador($id, $nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }
    public function deleteAdministrador($id){
        $this->admService->deleteAdministrador($id);
    }
    
    public function criarGestor($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado)  {
        $this->admService->criarGestor($nome, $apelido, $actividadeEmpresa, $tipoCliente, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $senha, $eliminado);
    }
    
    public function getTotalOutdoors(){
       return $this->admService->selectCountOutdoor();
    }
    
    public function getTotalCliente(){
      return  $this->admService->selectCountCliente();
    }
    
    public function getTotalGestor(){
      return  $this->admService->selectCountGestor();
    }
}

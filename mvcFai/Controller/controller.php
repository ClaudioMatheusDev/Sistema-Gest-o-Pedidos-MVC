<?php

require "Model/model.php";
require "View/view.php";

class Controller{

  private $view;
  private $conn;

  public $model;


    // HEADER NAV 
    public function monta_home() {
        $view = new View();
    
        $view->render_header();
      }
 // HEADER NAV

  // PAGINA LISTAGEM_PEDIDOS.PHP
    public function monta_listagemPedi(){
       
        $view = new View();
        $view->render_listagemPe($this->conn);
    }
 // PAGINA LISTAGEM_PEDIDOS.PHP 


 // PAGINA SOLICITA_PEDIDOS.PHP
    public function form_solicitaPedid(){
        $view = new View();
        $view->form_solicitaPedi($this->conn);
    }
  // PAGINA SOLICITA_PEDIDOS.PHP  


  // PAGINA REGISTRA_ITENS.PHP
    public function form_RegistraItem(){
        $view = new View();
        $view->form_RegistraItens();
    }
 // PAGINA REGISTRA_ITENS.PHP
  
}
?>
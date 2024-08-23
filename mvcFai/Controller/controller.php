<?php

require "Model/model.php";
require "View/view.php";

class Controller{
    public function monta_home() {
        $view = new View();
    
        $view->render_header();
      }

    public function monta_listagemPedi(){
        $view = new View();
        $view->render_listagemPe();
    }

    public function form_solicitaPedid(){
        $view = new View();
        $view->form_solicitaPedi();
    }

    public function form_RegistraItem(){
        $view = new View();
        $view->form_RegistraItens();
    }

  
}
?>
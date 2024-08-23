<?php
class Model{

    public function __construct(){
        $this->string = "Meu primeiro MVC";
    }

    public function get_string(){
        return $this->string;
    }

    public function get_get_form(){
        return "Olá FULANO, Digite sua chave de acesso";
    }
}
?>
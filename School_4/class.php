<?php

class persona{
    public $nome;
    public $cognome;
    public $eta;

    function __construct($nome, $cognome, $eta){
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->eta = $eta;
    }

    function get_nome(){
        return $this->nome;
    }

    function get_cognome(){
        return $this->cognome;
    }

    function get_eta(){
        return $this->eta;
    }



}
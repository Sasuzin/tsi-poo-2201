<?php

require_once '../Models/Cliente.class.php';

Class Main {

    public function __construct(){

    }

    public function listarClientes()
    {
        require_once '../Views/cliente.listar.php';
    }
}

new Main;
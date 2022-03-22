<?php
chdir(__DIR__);
require_once 'Usuario.class.php';
require_once '../interfaces/Usuario.interface.php';

class Vendedor extends Usuario implements iUsuario {

    public function acao(array $idProdutos):bool
    {
        echo "Executou ação do vendedor";
        return true;
    }
}
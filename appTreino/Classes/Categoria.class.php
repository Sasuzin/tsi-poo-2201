<?php
chdir(__DIR__);
require_once 'Usuario.class.php';
require_once '../interfaces/Usuario.interface.php';

class Categoria implements Crud {

    private $id;
    private $nome;
    
    public function criar(array $dados):bool
    {
        echo "\nCriado Produto\n";
        return true;        
    }
    public function apagar(int $id):bool
    {
        echo "\nApagado Produto $id\n";
        return true;
    }
    public function editar(int $id, array $dados):bool
    {
        echo "\nEditado Produto $id\n";
        return true;
    }
    public function listar(int $id = null):array
    {
        echo "\nListado Produto $id\n";
        return [];
    }

}
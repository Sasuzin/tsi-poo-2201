<?php
chdir(__DIR__);
require_once '../interfaces/Crud.interface.php';

class Perfil implements Crud {
    
    private $id;
    private $nome;
    private $descricao;
    private $permissoes;

    public function criar(array $dados):bool
    {
        echo "\nCriado Perfil\n";
        return true;        
    }
    public function apagar(int $id):bool
    {
        echo "\nApagado Perfil $id\n";
        return true;
    }
    public function editar(int $id, array $dados):bool
    {
        echo "\nEditado Perfil $id\n";
        return true;
    }
    public function listar(int $id = null):array
    {
        echo "\nListado Perfil $id\n";
        return [];
    }
}
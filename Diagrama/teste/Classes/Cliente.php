<?php

class Cliente implements Crud
{

    protected $id;
    protected $nome;
    protected $telefone;

    public function criar(array $dados):bool
    {
        echo "\nCriado Cliente\n";
        return true;
    }

    public function apagar(int $id):bool
    {
        echo "\nApagado Cliente\n";
        return true;
    }

    public function atualizar(int $id, array $dados):bool
    {
        echo "\nCliente Atualizado\n";
        return true;
    }

    public function listar (int $id = null):array
    {
        echo "\nListar Clientes\n";
        return [];
    }
}
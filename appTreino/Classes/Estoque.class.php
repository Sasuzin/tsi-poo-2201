<?php
chdir(__DIR__);
require_once 'Usuario.class.php';
require_once '../interfaces/Usuario.interface.php';

class Estoque implements Crud {

    private $id;
    private $qtd;
    private $id_produto;
    private $local;
    private $limite_min;
    private $produto;
    
public function __construct(Produto $objProd = null)
    {
        if(is_object($objProd)){
            $this->produto = $objProd;
        }
    }
    public function criar(array $dados):bool
    {
        echo "\nCriado Produto no Estoque\n";
        return true;        
    }
    public function apagar(int $id):bool
    {
        echo "\nApagado Produto do Estoque $id\n";
        return true;
    }
    public function editar(int $id, array $dados):bool
    {
        echo "\nEditado Produto do Estoque $id\n";
        return true;
    }
    public function listar(int $id = null):array
    {
        echo "\nListado Produto no Estoque $id\n";
        return [];
    }
}
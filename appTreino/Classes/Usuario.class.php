<?php
chdir(__DIR__);
require_once '../interfaces/Crud.interface.php';
require_once '../interfaces/Usuario.interface.php';

class Usuario implements Crud, iUsuario {

    private $email;
    private $nome;
    private $id;
    private $senha;
    private $id_perfil;

    public function __construct()
    {
        echo 'Construtor da classe usuario';
    }

    protected function xpto()
    {
        echo 'Metodo XPTO';
    }

    public function criar(array $dados):bool
    {
        echo "\nCriado Usuário\n";
        return true;        
    }
    public function apagar(int $id):bool
    {
        echo "\nApagado Usuário $id\n";
        return true;
    }
    public function editar(int $id, array $dados):bool
    {
        echo "\nEditado Usuário $id\n";
        return true;
    }
    public function listar(int $id = null):array
    {
        echo "\nListado Usuário $id\n";
        return [];
    }
    public function acao(array $idProdutos):bool
    {
        echo "Ação genérica para usuários";
        return true;
    }
    }
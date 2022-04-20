<?php

abstract class Model extends PDO {

    protected string $tabela;


    public function __construct(){
        if(is_file(__DIR__ . '/../config/db.php')){
            die('Não há arquivo de configuração do BD');
        }

            parent::__construct(DSN,DB_USER,DB_PASS);
    }
        abstract function inserir(array $dados):?int;
        
        abstract function atualizar(int $id, array $dados):bool;
        
        abstract function apagar(int $id):bool;

        abstract function listar(int $id = null):?array;    
}
<?php
include_once __DIR__ . '/../config/db.php';

abstract class Model extends PDO {

    protected string $tabela;


    public function __construct(){
        if(!defined('DSN') || !defined('DB_USER') || !defined('DB_PASS')){
            die('Não há arquivo de configuração do BD');
        }

        

            parent::__construct(DSN,DB_USER,DB_PASS);
    }
        abstract function inserir(array $dados):?int;
        
        abstract function atualizar(int $id, array $dados):bool;
        
        abstract function listar(int $id = null):?array;   
        
        function apagar(int $id):bool
        {
                    $stmt = $this->prepare("DELETE FROM  {$this->tabela} WHERE id = :id");
   
            $stmt->bindParam(':id', $id);
            
            if($stmt->execute()){
   
               return true;
    
             }else{
   
                return false;
             }
        }
}

//O abstract é uma classe que não pode ser instanciada, para poder usar tem que herdar pra poder usar. E quando eu tiver uma função abstract ela é obrigada a ter nas outras paginas que herdar.//

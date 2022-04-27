<?php
require __DIR__ . '/Model.class.php';

class Cliente extends Model {

    public function __construct()
    {
        parent::__construct();

        $this->tabela ='clientes';
    }
     function inserir(array $dados):?int 
     {

         $stmt = $this->prepare("INSERT INTO {$this->tabela}
                                          (nome,telefone) 
                                        VALUES
                                          (:nome,:telefone)");

         $stmt->bindParam(':nome', $dados['nome']);
         $stmt->bindParam(':telefone', $dados['telefone']);

         if($stmt->execute()){

           return ($this->lastInsertId());

         } else{

        return null;
         }
     }
        
     function atualizar(int $id, array $dados):bool
     {
      
         $stmt = $this->prepare("UPDATE  {$this->tabela} SET
                                          nome = :nome, telefone = :telefone
                                        WHERE
                                          id = :id");

         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':nome', $dados['nome']);
         $stmt->bindParam(':telefone', $dados['telefone']);

         if($stmt->execute()){

            return true;
 
          }else{

             return false;
          }
     }
    
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

     function listar(int $id = null):?array
     {
        return null;
     }
}

$clientes = new Cliente;

echo $clientes->apagar(1);
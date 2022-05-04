<?php
require __DIR__ . '/Model.class.php';

class Ativo extends Model {

    public function __construct()
    {
        parent::__construct();
        $this->tabela ='ativo';
    }
     function inserir(array $dados):?int 
     {
        
            $stmt = $this->prepare("INSERT INTO {$this->tabela}
                                           (id,nome) 
                                       VALUES
                                          (:id,:nome)");

         $stmt->bindParam(':nome', $dados['nome']);
         $stmt->bindParam(':id', $dados['id']);

         if($stmt->execute()){

      return ($this->lastInsertId());

   } else{

            return null;
}
     }
        
     function atualizar(int $id, array $dados):bool
     {
            $stmt = $this->prepare("UPDATE  {$this->tabela} SET
                           id = :id, 
                           nome = :nome,
                   
                         WHERE
                           id = :id");

      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':nome', $dados['nome']);


         if($stmt->rowCount() > 0){

            return true;

         }else{

            return false;
         }
     }
    
     function listar(int $id = null):?array
     {
      if($id){

         $stmt = $this->prepare("SELECT  (nome) FROM {$this->tabela}");

         $stmt->bindParam(':id',$id);

       }else{

         $stmt = $this->prepare("SELECT  (:nome) FROM {$this->tabela}");

       }

       $stmt->execute();

       $lista = [];

       while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){
         
         $lista[] = $registro;

       }
         return $lista;
         
         }
     }

$ativo = new Ativo;

 echo $ativo->inserir(['nome' => 'PETR4']);

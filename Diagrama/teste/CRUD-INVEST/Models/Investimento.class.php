<?php
require __DIR__ . '/Model.class.php';

class Investimento extends Model {

    public function __construct()
    {
        parent::__construct();
        $this->tabela ='Investimentos';
    }
     function inserir(array $dados):?int 
     {
         $stmt = $this->prepare("INSERT INTO {$this->tabela}
                                             (qnt,id_ativo,id_cliente) 
                                       VALUES
                                             (:qtd,:id_ativo,:id_cliente)");

         $stmt->bindParam(':qtd', $dados['qtd']);
         $stmt->bindParam(':id_ativo', $dados['id_ativo']);
         $stmt->bindParam(':id_cliente', $dados['id_cliente']);

            if($stmt->execute()){

                return ($this->lastInsertId());

            } else{

                     return null;

    }
 }
        
     function atualizar(int $id, array $dados):bool
     {
      
      $stmt = $this->prepare("UPDATE  {$this->tabela} SET
                              qtd = :qtd, 
                              id_ativo = :id_ativo,
                              id_cliente = :id_cliente
                            WHERE
                                 id = :id");

         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':qtd', $dados['qtd']);
         $stmt->bindParam(':id_ativo', $dados['id_ativo']);
         $stmt->bindParam(':id_cliente', $dados['id_cliente']);

         if($stmt->rowCount() > 0){

                  return true;

               }else{

                  return false;
            }
     }
    
     function listar(int $id = null):?array
     {
      if($id){

         $stmt = $this->prepare("SELECT id,id_ativo,id_cliente FROM {$this->tabela}");

         $stmt->bindParam(':id',$id);

       }else{

         $stmt = $this->prepare("SELECT id, id_ativo, id_cliente FROM {$this->tabela}");

       }

       $stmt->execute();

       $lista = [];

       while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){
         
         $lista[] = $registro;

       }
         return $lista;

         }
     }

$invest = new Investimento;

var_dump($invest->inserir(['qnt' => 45,
                           'id_ativo'=>3,
                           'id_cliente' => 1]));

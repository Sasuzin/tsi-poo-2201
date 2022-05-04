<?php
require_once __DIR__ . '/Model.class.php';

class Investimento extends Model {

    public function __construct()
    {
        parent::__construct();

        $this->tabela = 'investimentos';
    }

    function inserir(array $dados):?int
    {
        $stmt = $this->prepare("INSERT INTO {$this->tabela} 
                                    (qtd, id_ativo, id_cliente) 
                                VALUES 
                                    ( :qtd, :id_ativo, :id_cliente)");

        $stmt->bindParam(':qtd', $dados['qtd']);
        $stmt->bindParam(':id_ativo', $dados['id_ativo']);
        $stmt->bindParam(':id_cliente', $dados['id_cliente']);

        if($stmt->execute()){

            return $this->lastInsertId(); 

        }else{

            return false;
        }
    }

    function atualizar(int $id, array $dados):bool
    {
        $stmt = $this->prepare("UPDATE {$this->tabela} SET
                                    qtd = :qtd, 
                                    id_ativo = :id_ativo, 
                                    id_cliente = :id_cliente
                                WHERE 
                                    id = :id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':qtd', $dados['qtd']);
        $stmt->bindParam(':id_ativo', $dados['id_ativo']);
        $stmt->bindParam(':id_cliente', $dados['id_cliente']);

        $stmt->execute();

        if($stmt->rowCount() > 0){

            return true;

        }else{

            return false;
        }
    }

    function listar(int $id = null):?array
    {
        if($id){

            $stmt = $this->prepare("SELECT 
                                        id, qtd, id_ativo, id_cliente
                                    FROM 
                                        {$this->tabela} 
                                    WHERE 
                                        id = :id");

            $stmt->bindParam(':id', $id);

        }else{

            $stmt = $this->prepare("SELECT id, qtd, id_ativo, id_cliente FROM {$this->tabela}");
        }

        $stmt->execute();

        $lista = [];

        while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){

            $lista[] = $registro;
        }

        return $lista;
    }

    function carteiraCliente(int $id_cliente):array
    {
        
        $stmt = $this->prepare("SELECT 
                                    id, qtd, id_ativo
                                FROM 
                                    {$this->tabela} 
                                WHERE 
                                    id_cliente = :id");

        $stmt->bindParam(':id', $id_cliente);

        $stmt->execute();

        $lista = [];

        while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){

            $lista[] = $registro;
        }

        return $lista;        
    }
}
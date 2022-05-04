<?php
require_once __DIR__ . '/Model.class.php';

class Ativo extends Model {

    public function __construct()
    {
        parent::__construct();

        $this->tabela = 'ativos';
    }

    function inserir(array $dados):?int
    {
        $stmt = $this->prepare("INSERT INTO {$this->tabela} 
                                    (nome) 
                                VALUES 
                                    (:nome)");

        $stmt->bindParam(':nome', $dados['nome']);

        if($stmt->execute()){

            return $this->lastInsertId(); 

        }else{

            return false;
        }
    }

    function atualizar(int $id, array $dados):bool
    {
        $stmt = $this->prepare("UPDATE {$this->tabela} SET
                                    id = :id, 
                                    nome = :nome 
                                WHERE 
                                    id = :id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $dados['nome']);

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
                                        id, nome
                                    FROM 
                                        {$this->tabela} 
                                    WHERE 
                                        id = :id");

            $stmt->bindParam(':id', $id);

        }else{

            $stmt = $this->prepare("SELECT id, nome FROM {$this->tabela}");
        }

        $stmt->execute();

        $lista = [];

        while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){

            $lista[] = $registro;
        }

        return $lista;
    }
}
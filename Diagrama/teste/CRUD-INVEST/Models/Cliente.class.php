<?php
require_once __DIR__ . '/Model.class.php';

class Cliente extends Model {

    public function __construct()
    {
        parent::__construct();

        $this->tabela = 'clientes';
    }

    function inserir(array $dados):?int
    {
        $stmt = $this->prepare("INSERT INTO {$this->tabela} 
                                    (nome, telefone) 
                                VALUES 
                                    ( :nome, :telefone)");

        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':telefone', $dados['telefone']);

        if($stmt->execute()){

            return $this->lastInsertId(); 

        }else{

            return false;
        }
    }

    function atualizar(int $id, array $dados):bool
    {
        $stmt = $this->prepare("UPDATE {$this->tabela} SET
                                    nome = :nome, telefone = :telefone
                                WHERE 
                                    id = :id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':telefone', $dados['telefone']);

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

            $stmt = $this->prepare("SELECT id, nome, telefone FROM {$this->tabela} WHERE id = :id");

            $stmt->bindParam(':id', $id);

        }else{

            $stmt = $this->prepare("SELECT id, nome, telefone FROM {$this->tabela}");
        }

        $stmt->execute();

        $lista = [];

        while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){

            $lista[] = $registro;
        }

        return $lista;
    }
}
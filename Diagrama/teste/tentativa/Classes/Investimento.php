<?php

class Investimento
{
    protected $id;
    protected $qtd;
    protected $id_ativo;
    protected $id_cliente;
    
    public function criar(array $dados):bool
    {
        echo "\nCriado Cliente\n";
        return true;
    }

    public function validar_remocao_qtd (int $qtd):bool
    {
        if(!empty($qtd)){
            echo "\nInvestimento Removido\n";
            return true;
        } else {
            echo "\nSem Investimento do Ativo para ser removido\n";
            return false;
        }
    }

    public function comprar_investimento (int $id_ativo, int $id_cliente):bool
    {
        echo "\ninvestimento $id_ativo comprado, obrigado $id_cliente\n";
        return true;
    }


}
<?php

require_once '../Models/Cliente.class.php';

class Main {

    private Cliente $cliente;

    public function __construct(){

        $this->cliente = new Cliente;

        $this->listarClientes();
    }

    public function listarClientes()
    {
        $clientes = $this->cliente->listar();

        //Para cada cliente
        foreach($clientes as $ind => $cliente){

            //Recupero a carteira de investimentos
            $carteira = $this->cliente->carteira($cliente['id']);

            $totalAtivos = 0;

            //E calculo o total de ativos na carteira
            foreach ($carteira as $cadaAtivo){

                $totalAtivos += $cadaAtivo['qtd'];
            }

            $clientes[$ind]['totalAtivos'] = $totalAtivos;
        }

        require_once '../Views/cliente.listar.php';
    }

}
new Main;

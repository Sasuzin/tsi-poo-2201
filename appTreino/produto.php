<?php

require_once('classes/Produto.class.php');

class Main {

    private $produto;

    public function __construct()
    {
        $this->produto = new Produto;

        $vetor =[];

        $this->novo($vetor);

    }
    function novo($vetor):void 
    {
        if (is_array($vetor) ){
        $this->produto->criar($vetor);
        }else {
            throw 'Erro';
        }
    }
    public function __destruct()
    {
      echo  '\nDestrutor Executado\n';
    }

}
$main = new Main;


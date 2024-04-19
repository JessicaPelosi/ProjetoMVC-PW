<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\LimpezaDAO;
use Php\Primeiroprojeto\Models\Domain\Limpeza;

class LimpezaController{
    
    public function inserir($params){
        require_once("../src/Views/limpeza/inserir_limpeza.html");
    }

    public function novo($params){
        $limpeza = new Limpeza(0,$_POST['aplicacao'],$_POST['nome'],$_POST['preco'], $_POST['quantidade']);
        $limpezaDAO = new LimpezaDAO();
        if ($limpezaDAO->inserir($limpeza)){
            return "Material de limpeza inserido com sucesso!";
        } else {
            return "Erro ao inserir material de limpeza";
        }
    }
}

?>
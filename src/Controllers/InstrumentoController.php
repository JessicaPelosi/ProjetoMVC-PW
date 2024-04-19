<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\InstrumentoDAO;
use Php\Primeiroprojeto\Models\Domain\Instrumento;

class InstrumentoController{
    
    public function inserir($params){
        require_once("../src/Views/instrumento/inserir_instrumento.html");
    }

    public function novo($params){
        $instrumento = new Instrumento(0,$_POST['tipo'],$_POST['nome'],$_POST['preco']);
        $instrumentoDAO = new InstrumentoDAO();
        if ($instrumentoDAO->inserir($instrumento)){
            return "Instrumento inserido com sucesso!";
        } else {
            return "Erro ao inserir instrumento";
        }
    }
}

?>
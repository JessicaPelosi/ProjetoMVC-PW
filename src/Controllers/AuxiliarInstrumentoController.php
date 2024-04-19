<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\AuxiliarInstrumentoDAO;
use Php\Primeiroprojeto\Models\Domain\AuxiliarInstrumento;

class AuxiliarInstrumentoController{
    
    public function inserir($params){
        require_once("../src/Views/auxiliarInstrumento/inserir_auxiliarInstrumento.html");
    }

    public function novo($params){
        $auxiliarInstrumento = new AuxiliarInstrumento(0,$_POST['origem'],$_POST['nome'],$_POST['preco']);
        $auxiliarInstrumentoDAO = new AuxiliarInstrumentoDAO();
        if ($auxiliarInstrumentoDAO->inserir($auxiliarInstrumento)){
            return "Auxiliar de instrumento inserido com sucesso!";
        } else {
            return "Erro ao inserir auxiliar de instrumento";
        }
    }
}

?>
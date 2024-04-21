<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CfopDAO;
use Php\Primeiroprojeto\Models\Domain\Cfop;

class CfopController{
    
    public function inserir($params){
        require_once("../src/Views/cfop/inserir_cfop.html");
    }

    public function novo($params){
        $cfop = new Cfop(0,$_POST['entradaSaida'],$_POST['grupoOuOperacao'],$_POST['tipoPrestacao']);
        $cfopDAO = new CfopDAO();
        if ($cfopDAO->inserir($cfop)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir";
        }
    }
}

?>
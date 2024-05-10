<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\CfopDAO;
use Php\Primeiroprojeto\Models\Domain\Cfop;

class CfopController{

    public function index($params){
        $cfopDAO = new CfopDAO();
        $resultado = $cfopDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true"){
            $mensagem = "Registro inserido com sucesso!";
        } elseif($acao == "inserir" && $status == "false"){
            $mensagem = "Erro ao inserir!";
        } elseif($acao == "alterar" && $status == "true"){
            $mensagem = "Registro alterado com sucesso!";
        } elseif($acao == "alterar" && $status == "false"){
            $mensagem = "Erro ao alterar!";
        } elseif($acao == "excluir" && $status == "true"){
            $mensagem = "Registro excluído com sucesso!";
        } elseif($acao == "excluir" && $status == "false"){
            $mensagem = "Erro ao excluir!";
        } else {
            $mensagem = "";
        }
        require_once("../src/Views/CFOP/cfop.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/CFOP/inserir_cfop.html");
    }

    public function novo($params){
        $cfop = new Cfop(0,$_POST['entradaSaida'],$_POST['grupoOuOperacao'],$_POST['tipoPrestacao']);
        $cfopDAO = new CfopDAO();
        if ($cfopDAO->inserir($cfop)){
            header("location: /cfop/inserir/true");
        } else {
            header("location: /cfop/inserir/false");
        }
    }

    public function alterar($params){
        $cfopDAO = new CfopDAO();
        $resultado = $cfopDAO->consultar($params[1]);
        require_once("../src/Views/CFOP/alterar_cfop.php");
    }

    public function excluir($params){
        $cfopDAO = new CfopDAO();
        $resultado = $cfopDAO->consultar($params[1]);
        require_once("../src/Views/CFOP/excluir_cfop.php");
    }

    public function editar($params){
        $cfop = new Cfop($_POST['id_CFOP'], $_POST['entradaSaida'], $_POST['grupoOuOperacao'], $_POST['tipoPrestacao']);
        $cfopDAO = new CfopDAO();
        if ($cfopDAO->alterar($cfop)) {
            header("location: /cfop/alterar/true");
        } else {
            header("location: /cfop/alterar/false");
        }
    }

    public function deletar($params){
        $cfopDAO = new CfopDAO();
        if ($cfopDAO->excluir($_POST['id_CFOP'])){
            header("location: /cfop/excluir/true");
        } else {
            header("location: /cfop/excluir/false");
        }
    }
}


?>
<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\AuxiliarInstrumentoDAO;
use Php\Primeiroprojeto\Models\Domain\AuxiliarInstrumento;

class AuxiliarInstrumentoController{

    public function index($params){
        $auxiliarInstrumentoDAO = new AuxiliarInstrumentoDAO();
        $resultado = $auxiliarInstrumentoDAO->consultarTodos();
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
        require_once("../src/Views/AuxiliarInstrumento/auxiliarInstrumento.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/AuxiliarInstrumento/inserir_auxiliarInstrumento.html");
    }

    public function novo($params){ 
        $auxiliarInstrumento = new AuxiliarInstrumento(0,$_POST['origem'],$_POST['nome'],$_POST['preco']);
        $auxiliarInstrumentoDAO = new AuxiliarInstrumentoDAO();
        if ($auxiliarInstrumentoDAO->inserir($auxiliarInstrumento)){
            header("location: /auxiliarInstrumento/inserir/true");
        } else {
            header("location: /auxiliarInstrumento/inserir/false");
        }
    }

    public function alterar($params){
        $auxiliarInstrumentoDAO = new AuxiliarInstrumentoDAO();
        $resultado = $auxiliarInstrumentoDAO->consultar($params[1]);
        require_once("../src/Views/AuxiliarInstrumento/alterar_auxiliarInstrumento.php");
    }

    public function excluir($params){
        $auxiliarInstrumentoDAO = new AuxiliarInstrumentoDAO();
        $resultado = $auxiliarInstrumentoDAO->consultar($params[1]);
        require_once("../src/Views/AuxiliarInstrumento/excluir_auxiliarInstrumento.php");
    }

    public function editar($params){
        $auxiliarInstrumento = new AuxiliarInstrumento($_POST['id'], $_POST['origem'], $_POST['nome'], $_POST['preco']);
        $auxiliarInstrumentoDAO = new AuxiliarInstrumentoDAO();
        if ($auxiliarInstrumentoDAO->alterar($auxiliarInstrumento)) {
            header("location: /auxiliarInstrumento/alterar/true");
        } else {
            header("location: /auxiliarInstrumento/alterar/false");
        }
    }

    public function deletar($params){
        $auxiliarInstrumentoDAO = new AuxiliarInstrumentoDAO();
        if ($auxiliarInstrumentoDAO->excluir($_POST['id'])){
            header("location: /auxiliarInstrumento/excluir/true");
        } else {
            header("location: /auxiliarInstrumento/excluir/false");
        }
    }
}

?>
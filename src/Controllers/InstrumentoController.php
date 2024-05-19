<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\InstrumentoDAO;
use Php\Primeiroprojeto\Models\Domain\Instrumento;

class InstrumentoController{
    
    public function index($params){
        $instrumentoDAO = new InstrumentoDAO();
        $resultado = $instrumentoDAO->consultarTodos();
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
        require_once("../src/Views/Instrumento/instrumento.php");
    }

    public function inserir($params){
        require_once("../src/Views/Instrumento/inserir_instrumento.html");
    }

    public function novo($params){
        $instrumento = new Instrumento(0,$_POST['tipo'],$_POST['nome'],$_POST['preco']);
        $instrumentoDAO = new InstrumentoDAO();
        if ($instrumentoDAO->inserir($instrumento)){
            header("location: /instrumento/inserir/true");
        } else {
            header("location: /instrumento/inserir/false");
        }
    }

    public function alterar($params){
        $instrumentoDAO = new InstrumentoDAO();
        $resultado = $instrumentoDAO->consultar($params[1]);
        require_once("../src/Views/Instrumento/alterar_instrumento.php");
    }

    public function excluir($params){
        $instrumentoDAO = new InstrumentoDAO();
        $resultado = $instrumentoDAO->consultar($params[1]);
        require_once("../src/Views/Instrumento/excluir_instrumento.php");
    }

    public function editar($params){
        $instrumento = new Instrumento($_POST['id'], $_POST['tipo'], $_POST['nome'], $_POST['preco']);
        $instrumentoDAO = new InstrumentoDAO();
        if ($instrumentoDAO->alterar($instrumento)) {
            header("location: /instrumento/alterar/true");
        } else {
            header("location: /instrumento/alterar/false");
        }
    }

    public function deletar($params){
        $instrumentoDAO = new InstrumentoDAO();
        if ($instrumentoDAO->excluir($_POST['id'])){
            header("location: /instrumento/excluir/true");
        } else {
            header("location: /instrumento/excluir/false");
        }
    }
}

?>
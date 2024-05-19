<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\LimpezaDAO;
use Php\Primeiroprojeto\Models\Domain\Limpeza;

class LimpezaController{

    public function index($params){
        $limpezaDAO = new LimpezaDAO();
        $resultado = $limpezaDAO->consultarTodos();
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
        require_once("../src/Views/Limpeza/limpeza.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/Limpeza/inserir_limpeza.html");
    }

    public function novo($params){
        $limpeza = new Limpeza(0, $_POST['aplicacao'],$_POST['nome'],$_POST['preco'], $_POST['quantidade']);
        $limpezaDAO = new LimpezaDAO();
        if ($limpezaDAO->inserir($limpeza)){
            header("location: /limpeza/inserir/true");
        } else {
            header("location: /limpeza/inserir/false");
        }
    }

    public function alterar($params){
        $limpezaDAO = new LimpezaDAO();
        $resultado = $limpezaDAO->consultar($params[1]);
        require_once("../src/Views/Limpeza/alterar_limpeza.php");
    }

    public function excluir($params){
        $limpezaDAO = new LimpezaDAO();
        $resultado = $limpezaDAO->consultar($params[1]);
        require_once("../src/Views/Limpeza/excluir_limpeza.php");
    }

    public function editar($params){
        $limpeza = new Limpeza($_POST['id'], $_POST['aplicacao'], $_POST['nome'], $_POST['preco'], $_POST['quantidade']);
        $limpezaDAO = new LimpezaDAO();
        if ($limpezaDAO->alterar($limpeza)) {
            header("location: /limpeza/alterar/true");
        } else {
            header("location: /limpeza/alterar/false");
        }
    }

    public function deletar($params){
        $limpezaDAO = new LimpezaDAO();
        if ($limpezaDAO->excluir($_POST['id'])){
            header("location: /limpeza/excluir/true");
        } else {
            header("location: /limpeza/excluir/false");
        }
    }
}

?>
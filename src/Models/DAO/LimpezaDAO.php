<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Limpeza;

class LimpezaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Limpeza $limpeza){
        try{
            $sql ="INSERT INTO limpeza (aplicacao, nome, preco, quantidade) VALUES (:aplicacao, :nome, :preco, :quantidade)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":aplicacao", $limpeza->getAplicacao());
            $p->bindValue(":nome", $limpeza->getNome());
            $p->bindValue(":preco", $limpeza->getPreco());
            $p->bindValue(":quantidade", $limpeza->getQuantidade());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Limpeza $limpeza){
        try{
            $sql = "UPDATE limpeza SET aplicacao = :aplicacao, nome = :nome, preco = :preco, quantidade = :quantidade WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":aplicacao", $limpeza->getAplicacao());
            $p->bindValue(":nome", $limpeza->getNome());
            $p->bindValue(":preco", $limpeza->getPreco());
            $p->bindValue(":quantidade", $limpeza->getQuantidade());
            $p->bindValue(":id", $limpeza->getId());
            return $p->execute();
        } catch(\Exception $e) {
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM limpeza WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM limpeza";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM limpeza WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e) {
            return 0;
        }
    }
}
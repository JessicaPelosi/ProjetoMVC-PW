<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Instrumento;

class InstrumentoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Instrumento $instrumento){
        try{
            $sql ="INSERT INTO instrumento (tipo, nome, preco) VALUES (:tipo, :nome, :preco)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":tipo", $instrumento->getTipo());
            $p->bindValue(":nome", $instrumento->getNome());
            $p->bindValue(":preco", $instrumento->getPreco());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Instrumento $instrumento){
        try{
            $sql = "UPDATE instrumento SET tipo = :tipo, nome = :nome, preco = :preco WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":tipo", $instrumento->getTipo());
            $p->bindValue(":nome", $instrumento->getNome());
            $p->bindValue(":preco", $instrumento->getPreco());
            $p->bindValue(":id", $instrumento->getId());
            return $p->execute();
        } catch(\Exception $e) {
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM instrumento WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM instrumento";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM instrumento WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e) {
            return 0;
        }
    }
}
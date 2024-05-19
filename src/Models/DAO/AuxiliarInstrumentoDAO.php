<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\AuxiliarInstrumento;

class AuxiliarInstrumentoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(AuxiliarInstrumento $auxiliarInstrumento){
        try{
            $sql ="INSERT INTO auxiliarInstrumento (origem, nome, preco) VALUES (:origem, :nome, :preco)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":origem", $auxiliarInstrumento->getOrigem());
            $p->bindValue(":nome", $auxiliarInstrumento->getNome());
            $p->bindValue(":preco", $auxiliarInstrumento->getPreco());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(AuxiliarInstrumento $auxiliarInstrumento){
        try{
            $sql = "UPDATE auxiliarInstrumento SET origem = :origem, nome = :nome, preco = :preco WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":origem", $auxiliarInstrumento->getOrigem());
            $p->bindValue(":nome", $auxiliarInstrumento->getNome());
            $p->bindValue(":preco", $auxiliarInstrumento->getPreco());
            $p->bindValue(":id", $auxiliarInstrumento->getId());
            return $p->execute();
        } catch(\Exception $e) {
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM auxiliarInstrumento WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM auxiliarInstrumento";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM auxiliarInstrumento WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e) {
            return 0;
        }
    }
}
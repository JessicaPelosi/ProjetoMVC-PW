<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Cfop;

class CfopDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Cfop $cfop){
        try{
            $sql ="INSERT INTO cfop (entradaSaida, grupoOuOperacao, tipoPrestacao) VALUES (:entradaSaida, :grupoOuOperacao, :tipoPrestacao)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":entradaSaida", $cfop->getEntradaSaida());
            $p->bindValue(":grupoOuOperacao", $cfop->getGrupoOuOperacao());
            $p->bindValue(":tipoPrestacao", $cfop->getTipoPrestacao());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Cfop $cfop){
        try{
            $sql = "UPDATE cfop SET entradaSaida = :entradaSaida, grupoOuOperacao = :grupoOuOperacao, tipoPrestacao = :tipoPrestacao  WHERE id_CFOP = :id_CFOP";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":entradaSaida", $cfop->getEntradaSaida());
            $p->bindValue("grupoOuOperacao", $cfop->getGrupoOuOperacao());
            $p->bindValue("tipoPrestacao", $cfop->getTipoPrestacao());
            $p->bindValue(":id_CFOP", $cfop->getId_CFOP());
            return $p->execute();
        } catch(\Exception $e) {
            return 0;
        }
    }

    public function excluir($id_CFOP){
        try{
            $sql = "DELETE FROM cfop WHERE id_CFOP = :id_CFOP";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_CFOP", $id_CFOP);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM cfop";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id_CFOP){
        try{
            $sql = "SELECT * FROM cfop WHERE id_CFOP = :id_CFOP";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id_CFOP", $id_CFOP);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e) {
            return 0;
        }
    }
}
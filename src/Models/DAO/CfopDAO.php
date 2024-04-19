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
}
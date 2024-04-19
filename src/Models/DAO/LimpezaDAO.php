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
}
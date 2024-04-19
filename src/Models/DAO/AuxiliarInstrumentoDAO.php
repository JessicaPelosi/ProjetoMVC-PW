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
}
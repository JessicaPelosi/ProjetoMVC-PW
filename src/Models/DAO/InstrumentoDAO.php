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
}
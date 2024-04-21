<?php 

namespace Php\Primeiroprojeto\Models\Domain;

class Instrumento{
    private $id;
    private $tipo;
    private $nome;
    private $preco;

    public function __construct($id, $tipo, $nome, $preco){
        $this->setId($id);
        $this->setTipo($tipo);
        $this->setNome($nome);
        $this->setPreco($preco);
 
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getTipo(){
        return $this->tipo;
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }

}


?>
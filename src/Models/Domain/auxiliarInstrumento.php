<?php 
namespace Php\Primeiroprojeto\Models\Domain;

class AuxiliarInstrumento {
    private $id;
    private $origem;
    private $nome;
    private $preco;
 
    
    public function __construct($id, $origem, $nome, $preco){
        $this->setId($id);
        $this->setOrigem($origem);
        $this->setNome($nome);
        $this->setPreco($preco);
        
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    
    public function getOrigem(){
        return $this->origem;
    }
    public function setOrigem($origem){
        $this->origem = $origem;
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
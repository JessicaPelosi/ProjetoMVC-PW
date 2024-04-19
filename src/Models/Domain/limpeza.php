<?php 
namespace Php\Primeiroprojeto\Models\Domain;

class Limpeza {
    private $id;
    private $aplicacao;
    private $nome;
    private $preco;
    private $quantidade;

 
    
    public function __construct($id, $aplicacao, $nome, $preco, $quantidade){
        $this->setId($id);
        $this->setaplicacao($aplicacao);
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setPreco($quantidade);
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    
    public function getAplicacao(){
        return $this->aplicacao;
    }
    public function setAplicacao($aplicacao){
        $this->aplicacao = $aplicacao;
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

    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

}

?>
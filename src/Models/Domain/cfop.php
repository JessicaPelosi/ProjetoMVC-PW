<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Cfop{

    private $id_CFOP;
    private $entradaSaida;
    private $grupoOuOperacao;
    private $tipoPrestacao;

    public function __construct($id_CFOP, $entradaSaida, $grupoOuOperacao, $tipoPrestacao){
        $this->setId_CFOP($id_CFOP);
        $this->setEntradaSaida($entradaSaida);
        $this->setGrupoOuOperacao($grupoOuOperacao);
        $this->setTipoPrestacao($tipoPrestacao);
    }
 
    public function getId_CFOP(){
        return $this->id_CFOP;
    }
    public function setId_CFOP($id_CFOP){
        $this->id_CFOP = $id_CFOP;
    }

    public function getEntradaSaida(){
        return $this->entradaSaida;
    }
    public function setEntradaSaida($entradaSaida){
        $this->entradaSaida = $entradaSaida;
    }

    public function getGrupoOuOperacao(){
        return $this->grupoOuOperacao;
    }
    public function setGrupoOuOperacao($grupoOuOperacao){
        $this->grupoOuOperacao = $grupoOuOperacao;
    }

    public function getTipoPrestacao(){
        return $this->tipoPrestacao;
    }
    public function setTipoPrestacao($tipoPrestacao){
        $this->tipoPrestacao = $tipoPrestacao;
    }


}

?>

	entradaSaida	grupoOuOperacao	tipoPrestacao	

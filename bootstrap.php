<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php/Primeiroprojeto\Router

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

//chamando o formulário para inserir categoria

$r->get('/categoria/inserir', 'Php\Primeiroprojeto\Controllers\CategoriaController@inserir');

$r->post('/categoria/novo', 'Php\Primeiroprojeto\Controllers\CategoriaController@novo');

$r->get('/auxiliarInstrumento/inserir', 'Php\Primeiroprojeto\Controllers\AuxiliarInstrumentoController@inserir');

$r->post('/auxiliarInstrumento/novo', 'Php\Primeiroprojeto\Controllers\AuxiliarInstrumentoController@novo');

$r->get('/cfop/inserir', 'Php\Primeiroprojeto\Controllers\CfopController@inserir');

$r->post('/cfop/novo', 'Php\Primeiroprojeto\Controllers\CfopController@novo');

$r->get('/instrumento/inserir', 'Php\Primeiroprojeto\Controllers\InstrumentoController@inserir');

$r->post('/instrumento/novo', 'Php\Primeiroprojeto\Controllers\InstrumentoController@novo');

$r->get('/limpeza/inserir', 'Php\Primeiroprojeto\Controllers\LimpezaController@inserir');

$r->post('/limpeza/novo', 'Php\Primeiroprojeto\Controllers\LimpezaController@novo');

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller-> $resultado($r->getParams());
}
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

$r->get('/categoria', 'Php\Primeiroprojeto\Controllers\CategoriaController@index');

$r->get('/categoria/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\CategoriaController@index');

$r->get('/categoria/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\CategoriaController@alterar');

$r->get('/categoria/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\CategoriaController@excluir');

$r->post('/categoria/editar', 'Php\Primeiroprojeto\Controllers\CategoriaController@editar');

$r->post('/categoria/deletar', 'Php\Primeiroprojeto\Controllers\CategoriaController@deletar');

//chamando o formulário para inserir auxiliarInstrumento

$r->get('/auxiliarInstrumento/inserir', 'Php\Primeiroprojeto\Controllers\AuxiliarInstrumentoController@inserir');

$r->post('/auxiliarInstrumento/novo', 'Php\Primeiroprojeto\Controllers\AuxiliarInstrumentoController@novo');

$r->get('/auxiliarInstrumento', 'Php\Primeiroprojeto\Controllers\AuxiliarInstrumentoController@index');

$r->get('/auxiliarInstrumento/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\AuxiliarInstrumentoController@index');

$r->get('/auxiliarInstrumento/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\AuxiliarInstrumentoController@alterar');

$r->get('/auxiliarInstrumento/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\AuxiliarInstrumentoController@excluir');

$r->post('/auxiliarInstrumento/editar', 'Php\Primeiroprojeto\Controllers\AuxiliarInstrumentoController@editar');

$r->post('/auxiliarInstrumento/deletar', 'Php\Primeiroprojeto\Controllers\AuxiliarInstrumentoController@deletar');

//chamando o formulário para inserir cfop

$r->get('/cfop/inserir', 'Php\Primeiroprojeto\Controllers\CfopController@inserir');

$r->post('/cfop/novo', 'Php\Primeiroprojeto\Controllers\CfopController@novo');

$r->get('/cfop', 'Php\Primeiroprojeto\Controllers\CfopController@index');

$r->get('/cfop/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\CfopController@index');

$r->get('/cfop/alterar/id/{id_CFOP}', 'Php\Primeiroprojeto\Controllers\CfopController@alterar');

$r->get('/cfop/excluir/id/{id_CFOP}', 'Php\Primeiroprojeto\Controllers\CfopController@excluir');

$r->post('/cfop/editar', 'Php\Primeiroprojeto\Controllers\CfopController@editar');

$r->post('/cfop/deletar', 'Php\Primeiroprojeto\Controllers\CfopController@deletar');

//chamando o formulário para inserir instrumento

$r->get('/instrumento/inserir', 'Php\Primeiroprojeto\Controllers\InstrumentoController@inserir');

$r->post('/instrumento/novo', 'Php\Primeiroprojeto\Controllers\InstrumentoController@novo');

$r->get('/instrumento', 'Php\Primeiroprojeto\Controllers\InstrumentoController@index');

$r->get('/instrumento/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\InstrumentoController@index');

$r->get('/instrumento/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\InstrumentoController@alterar');

$r->get('/instrumento/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\InstrumentoController@excluir');

$r->post('/instrumento/editar', 'Php\Primeiroprojeto\Controllers\InstrumentoController@editar');

$r->post('/instrumento/deletar', 'Php\Primeiroprojeto\Controllers\InstrumentoController@deletar');


//chamando o formulário para inserir limpeza

$r->get('/limpeza/inserir', 'Php\Primeiroprojeto\Controllers\LimpezaController@inserir');

$r->post('/limpeza/novo', 'Php\Primeiroprojeto\Controllers\LimpezaController@novo');

$r->get('/limpeza', 'Php\Primeiroprojeto\Controllers\LimpezaController@index');

$r->get('/limpeza/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\LimpezaController@index');

$r->get('/limpeza/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\LimpezaController@alterar');

$r->get('/limpeza/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\LimpezaController@excluir');

$r->post('/limpeza/editar', 'Php\Primeiroprojeto\Controllers\LimpezaController@editar');

$r->post('/limpeza/deletar', 'Php\Primeiroprojeto\Controllers\LimpezaController@deletar');

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
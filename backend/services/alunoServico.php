<?php

set_include_path( implode(PATH_SEPARATOR, array( realpath(dirname(__FILE__) . '/library'), 	get_include_path() ) ) );

require_once 'Slim/Slim.php';
require_once 'controller/AlunoController.php';

$app = new Slim();
$alunoController = new AlunoController();

#INDEX

#ALUNO
//Rota para busca
$app->get('/alunos', function() use ( $alunoController ){
	echo json_encode($alunoController->buscarTodos());
});

$app->get('/aluno/:id_aluno', function( $id_aluno ) use ( $alunoController ){
		echo json_encode($alunoController->buscarAluno( $id_aluno ) );
});

$app->post('/cadastro',function() use ($app,$alunoController){
	$app->response()->header("Content-Type", "application/json");
	$data = json_decode($app->request()->getBody());
	$post = get_object_vars($data);//Transforma o objeto json em um array PHP

	echo json_encode($alunoController->salvarAluno($post));
});

//Rota para atualizar
$app->put('/alterar', function() use ( $app, $alunoController ){
	$app->response()->header("Content-Type", "application/json");
  $data = json_decode($app->request()->getBody());
  $put = get_object_vars($data);//Transforma o objeto json em um array PHP
	echo json_encode($alunoController->salvarAluno($put));
});

$app->delete('/excluirAluno/:idAluno', function($idAluno) use ($app, $alunoController){
	echo $alunoController->excluirAluno($idAluno);
});

#Run
$app->run();

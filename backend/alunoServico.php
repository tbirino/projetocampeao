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

//
// //Rota para cadastro
// $app->get('/cadastro', function() use ( $smarty ){
//
// 	$smarty->display( "cadastro.tpl" );
//
// });
//
// $app->post('/cadastro', function() use ( $app, $alunoController ){
//
// 	$data = $app->request()->post();
// 	$alunoController->salvarFicha( $data);
//
// });
//
// //Rota para atualizar
// $app->put('/cadastro', function() use ( $app, $alunoController ){
//
// 	$data = $app->request()->put();
// 	echo $alunoController->salvarFicha( $data );
//
// });
//
// //Rota para remover
// $app->delete('/cadastro/:idFicha', function( $idFicha ) use ( $app, $alunoController ){
//
// 	echo $alunoController->removerFicha( $idFicha );
//
// });

#Run
$app->run();

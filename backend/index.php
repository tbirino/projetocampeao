<?php

set_include_path( implode(PATH_SEPARATOR, array( realpath(dirname(__FILE__) . '/library'), 	get_include_path() ) ) );

require_once 'Slim/Slim.php';
require_once 'controller/AlunoController.php';

$app = new Slim();
$alunoController = new AlunoController();

#INDEX

#CARTAO
//Rota para busca
$app->get('/alunos', function() use ( $alunoController ){

	echo json_encode($alunoController->buscarTodos());

});

$app->get('/pesquisa_json', function() use ( $fichaController ){

	echo $fichaController->buscarTodos( 'json' );

});

$app->get('/ficha/:id_ficha', function( $id_ficha ) use ( $fichaController ){

		echo json_encode($fichaController->buscarFicha( $id_ficha ) );

});
//
// //Rota para cadastro
// $app->get('/cadastro', function() use ( $smarty ){
//
// 	$smarty->display( "cadastro.tpl" );
//
// });
//
// $app->post('/cadastro', function() use ( $app, $fichaController ){
//
// 	$data = $app->request()->post();
// 	$fichaController->salvarFicha( $data);
//
// });
//
// //Rota para atualizar
// $app->put('/cadastro', function() use ( $app, $fichaController ){
//
// 	$data = $app->request()->put();
// 	echo $fichaController->salvarFicha( $data );
//
// });
//
// //Rota para remover
// $app->delete('/cadastro/:idFicha', function( $idFicha ) use ( $app, $fichaController ){
//
// 	echo $fichaController->removerFicha( $idFicha );
//
// });

#Run
$app->run();

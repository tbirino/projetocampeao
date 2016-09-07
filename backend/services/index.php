<?php

set_include_path( implode(PATH_SEPARATOR, array( realpath(dirname(__FILE__) . '../library'), 	get_include_path() ) ) );

require_once 'Slim/Slim.php';
require_once 'controller/FichaController.php';

$app = new Slim();
$fichaController = new FichaController();

#INDEX

#CARTAO
//Rota para busca
$app->get('/fichas', function() use ( $fichaController ){

	echo json_encode($fichaController->buscarTodos());

});

$app->get('/pesquisa_json', function() use ( $fichaController ){

	echo $fichaController->buscarTodos( 'json' );

});
//
// $app->get('/pesquisa/:id_ficha', function( $id_ficha ) use ( $smarty, $app, $fichaController ){
//
// 		$smarty->assign( "fichas", $fichaController->buscarFicha( $id_ficha ) );
// 		$smarty->display( "pesquisa.tpl" );
//
// });
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

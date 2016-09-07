<?php

require_once 'model/Ficha.php';

class FichaController {

	public function buscarTodos( $output = "" )
	{
	  $fichas = Ficha::all();
		$return = array();

		foreach ($fichas as $ficha)
		{
			$c = array();
			$c['idFicha'] = $ficha->id_ficha;
			$c['tipoPessoa'] = $ficha->tipo_pessoa;
			$c['nomePessoa'] = $ficha->nome_pessoa;
			$c['idadePessoa'] = $ficha->idade_pessoa;
			$c['estadoCivil'] = $ficha->estado_civil;
			$c['nomeCadastrante'] = $ficha->nome_usuario;

			$return[] = $c;
		}

		if( $output == 'json' )	{
			return json_encode($return);
		}else{
			return $return;
		}

	}

	public function buscarFicha ($id_ficha)
	{
		$ficha = Ficha::find( $id_ficha );
		$return = array();

		$c = array();
		$c['idFicha'] = $ficha->id_ficha;
		$c['tipoPessoa'] = $ficha->tipo_pessoa;
		$c['nomePessoa'] = $ficha->nome_pessoa;
		$c['idadePessoa'] = $ficha->idade_pessoa;
		$c['estadoCivil'] = $ficha->estado_civil;
		$c['nomeCadastrante'] = $ficha->nome_usuario;

		$return[] = $c;

		return $return;
	}

	public function salvarFicha( $ficha )
	{
		$c = array();

		if($ficha['id_ficha'])
		{
			$model = Ficha::find( $ficha['id_ficha'] );
			$model->ficha = $ficha['ficha'];
			$model->save();
			$c['status'] = 'update';
		}
		else
		{
			$model = Ficha::create( $ficha );
			$c['status'] = 'insert';
		}

		return $c;

	}

	public function removerFicha( $fichaId )
	{
		$ficha = Ficha::find( $fichaId );
		return $ficha->delete();
	}

}

?>

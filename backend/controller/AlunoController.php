<?php

require_once 'model/Aluno.php';

class AlunoController {

  public function buscarTodos( $output = "" )
  {
    $alunos = Aluno::all();
    $return = array();

    foreach ($alunos as $aluno)
    {
      $c = array();
      $c['idAluno'] = $aluno->id_aluno;
      $c['nome'] = $aluno->nome;
      $c['cpf'] = $aluno->cpf;
      $c['rg'] = $aluno->rg;
      $c['dtNascimento'] = $aluno->dt_nascimento;
      $c['telCelular'] = $aluno->tel_celular;

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

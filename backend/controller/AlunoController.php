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

  public function buscarAluno ($id_aluno)
  {
    $aluno = Aluno::find( $id_aluno );
    $return = array();

    $c = array();
    $c['idAluno'] = $aluno->id_aluno;
    $c['nome'] = $aluno->nome;
    $c['cpf'] = $aluno->cpf;
    $c['rg'] = $aluno->rg;
    $c['dtNascimento'] = $aluno->dt_nascimento;
    $c['telCelular'] = $aluno->tel_celular;

    $return[] = $c;

    return $return;
  }

  public function salvarAluno($aluno)
  {
    $a = array();

    if($aluno['id_aluno'])
    {
      $model = Aluno::find( $aluno['id_aluno'] );
      $model->aluno = $aluno['aluno'];
      $model->save();
      $a['status'] = 'update';
    }
    else
    {
      $model = Aluno::create( $aluno );
      $a['status'] = 'insert';
    }
    return $a;
  }

  public function removerFicha( $fichaId )
  {
    $ficha = Ficha::find( $fichaId );
    return $ficha->delete();
  }

}

?>

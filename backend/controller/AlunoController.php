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

  public function salvarAluno( $aluno )
  {
    $return = array();

    if($aluno['idAluno'])
    {
      $return[] = $aluno;
      $model = Aluno::find( $aluno['idAluno'] );
      $model->nome = $aluno['nome'];
      $model->cpf = $aluno['cpf'];
      $model->rg = $aluno['rg'];
      $model->dt_nascimento = $aluno['dtNascimento'];
      $model->endereco = $aluno['endereco'];
      $model->tel_residencial = $aluno['telResidencial'];
      $model->tel_celular = $aluno['telCelular'];
      $model->nome_pai = $aluno['nomePai'];
      $model->nome_mae = $aluno['nomeMae'];
      $model->email = $aluno['email'];
      $model->dt_entrada = $aluno['dtEntrada'];
      $model->aluno_tipo_sanguineo = $aluno['alunoTipoSanguineo'];
      $model->save();
      $c['status'] = 'update';
    }
    else
    {
      $return[] = $aluno;
      $model = Aluno::create( $aluno );
    }

    return $return;

  }

  public function removerFicha( $fichaId )
  {
    $ficha = Ficha::find( $fichaId );
    return $ficha->delete();
  }

}

?>

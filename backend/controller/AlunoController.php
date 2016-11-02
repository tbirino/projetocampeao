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
    $c['dtEntrada'] = $aluno->dt_entrada;
    $c['email'] = $aluno->email;
    $c['endereco'] = $aluno->endereco;
    $c['nomeMae'] = $aluno->nome_mae;
    $c['nomePai'] = $aluno->nome_pai;
    $c['telResidencial'] = $aluno->tel_residencial;


    $return[] = $c;

    return $return;
  }

  public function salvarAluno($aluno)
  {
    $a = array();

    if($aluno['id_aluno'])
    {
      $model = Aluno::find( $aluno['id_aluno'] );
      $model->nome = $aluno['nome'];
      $model->cpf = $aluno['cpf'];
      $model->rg = $aluno['rg'];
      $model->dt_nascimento = $aluno['dt_nascimento'];
      $model->tel_celular = $aluno['tel_celular'];
      $model->dt_entrada = $aluno['dt_entrada'];
      $model->email = $aluno['email'];
      $model->endereco = $aluno['endereco'];
      $model->nome_mae = $aluno['nome_mae'];
      $model->nome_pai = $aluno['nome_pai'];
      $model->tel_residencial = $aluno['tel_residencial'];
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

  public function excluirAluno($idAluno)
  {
    $aluno = Aluno::find($idAluno);
    return $aluno->delete();
  }
  
}

?>

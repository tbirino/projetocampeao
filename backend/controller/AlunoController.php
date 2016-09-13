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

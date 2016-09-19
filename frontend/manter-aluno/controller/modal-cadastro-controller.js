angular
.module('app')
.controller('ModalCadastrarAlunosController', ModalCadastrarAlunosController);

ModalCadastrarAlunosController.$inject = ['$http', '$uibModalInstance', 'id'];

function ModalCadastrarAlunosController ($http, $uibModalInstance, id){

  var self = this;
  self.cadastrar = cadastrar;
  self.fechar = fechar;

  self.aluno = {
    idAluno : null,
    nome : null,
    cpf : null,
    rg : null,
    dtNascimento : null,
    endereco : null,
    telResidencial:null,
    telCelular:null,
    nomePai:null,
    nomeMae:null,
    email:null,
    dtEntrada:null,
    alunoTipoSanguineo:null

  };


  init();

  function fechar(){
    $uibModalInstance.dismiss();
  }

  function cadastrar() {
    $http.post('http://localhost:1904/projetocampeao/backend/alunoServico.php/cadastro', converterObjeto(self.aluno)).then(
      function(resultado) {
        limparDados();
      }
    );
  }

  function converterObjeto(aluno){
    return {
      'idAluno' : aluno.id_aluno,
      'nome': aluno.nome,
      'cpf': aluno.cpf,
      'rg':aluno.rg,
      'dtNascimento':aluno.dt_nascimento,
      'telCelular':aluno.tel_celular,
      'endereco':aluno.endereco,
      'telResidencial':aluno.tel_residencial,
      'nomePai':aluno.nome_pai,
      'nomeMae':aluno.nome_mae,
      'email':aluno.email,
      'dtEntrada':aluno.dt_entrada,
      'alunoTipoSanguineo':aluno.aluno_tipo_sanguineo
    };
  }

  function init(){
    if(id && id > 0){
      $http.get('http://localhost:1904/projetocampeao/backend/alunoServico.php/alunos/' + id ).then(
        function(resultado) {
          self.ficha  = resultado.data[0];
        }
      );
    }
  }

}

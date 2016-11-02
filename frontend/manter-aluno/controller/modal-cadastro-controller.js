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
    if(self.aluno.idAluno){
      $http.put('http://localhost/projetocampeao/backend/alunoServico.php/alterar', converterObjetoSlim(self.aluno)).then(
        function(resultado) {
          limparDados();
        }
      );
    }else {
      $http.post('http://localhost/projetocampeao/backend/alunoServico.php/cadastro', converterObjetoSlim(self.aluno)).then(
        function(resultado) {
          limparDados();
        }
      );
    }
  }

  function converterObjetoSlim(aluno){
    return {
      'id_aluno' : aluno.idAluno,
      'nome': aluno.nome,
      'cpf': aluno.cpf,
      'rg':aluno.rg,
      'dt_nascimento':aluno.dtEntrada,
      'tel_celular':aluno.telCelular,
      'endereco':aluno.endereco,
      'tel_residencial':aluno.telResidencial,
      'nome_pai':aluno.nomePai,
      'nome_mae':aluno.nomeMae,
      'email':aluno.email,
      'dt_entrada':aluno.dtEntrada,
    };
  }

  function init(){
    if(id){
      $http.get('http://localhost/projetocampeao/backend/alunoServico.php/aluno/' + id ).then(
        function(resultado) {
          self.aluno  = resultado.data[0];
        }
      );
    }
  }

}

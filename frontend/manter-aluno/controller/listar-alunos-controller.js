angular
.module('app')
.controller('ListarAlunosController', ListarAlunosController);

ListarAlunosController.$inject = ['$http', '$uibModal','toastr','Restangular'];

function ListarAlunosController ($http, $uibModal,toastr,Restangular){

  var self = this;
  var path = 'alunoServico.php/';

  self.abrirModalCadastroAluno = abrirModalCadastroAluno;
  self.abrirModalAlterarAluno = abrirModalAlterarAluno;
  self.excluirAluno = excluirAluno;

  function init() {
    return Restangular.all(path + '/alunos').getList().then(function(resultado) {
      self.alunos = resultado.plain();
    });

  }

  function excluirAluno(idAluno) {
    Restangular.one(path + '/excluirAluno', idAluno).remove().then(function(resultado) {
      toastr.success('O aluno foi excluido do banco de dados!');
      init();
    });

  }

  function abrirModalCadastroAluno(){
    var modalInstance = $uibModal.open(
      {
        templateUrl: 'frontend/manter-aluno/view/modal-cadastrar-alunos.html',
        controller: 'ModalCadastrarAlunosController',
        controllerAs: 'modalCadastrarAlunosCtrl',
        size: 'lg',
        resolve: {
          'id' : function () {
            return null;
          }
        }
      }
    );
    modalInstance.result.then(function() {
      init();
    });
  }

  function abrirModalAlterarAluno(id){
    var modalInstance = $uibModal.open(
      {
        templateUrl: 'frontend/manter-aluno/view/modal-cadastrar-alunos.html',
        controller: 'ModalCadastrarAlunosController',
        controllerAs: 'modalCadastrarAlunosCtrl',
        size: 'lg',
        resolve: {
          'id' : function () {
            return id;
          }
        }
      }
    );
    modalInstance.result.then(function() {
      init();
    });
  }

  init();


}

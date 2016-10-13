angular
.module('app')
.controller('ListarAlunosController', ListarAlunosController);

ListarAlunosController.$inject = ['$http', '$uibModal'];

function ListarAlunosController ($http, $uibModal){

  var self = this;

  self.abrirModalCadastroAluno = abrirModalCadastroAluno;
  self.abrirModalAlterarAluno = abrirModalAlterarAluno;

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
  }


  $http.get('http://localhost/projetocampeao/backend/alunoServico.php/alunos').then(
    function(resultado) {
      self.alunos = resultado.data;
    }
  );

}

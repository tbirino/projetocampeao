angular
.module('app')
.controller('ListarAlunosController', ListarAlunosController);

FichaPesquisaController.$inject = ['$http', '$uibModal'];

function FichaPesquisaController ($http, $uibModal){

  var self = this;

  self.abrirModalCadastro = abrirModalCadastro;
  self.abrirModalAlterar = abrirModalAlterar;

  function abrirModalCadastro(){
    var modalInstance = $uibModal.open(
      {
        templateUrl: 'frontend/manter-aluno/view/modal-cadastro-alunos.html',
        controller: 'ModalCadastroAlunosController',
        controllerAs: 'modalCadastroAlunosCtrl',
        size: 'lg',
        resolve: {
                'id' : function () {
                  return null;
                }
        }
      }
    );
  }

  function abrirModalAlterar(id){
    var modalInstance = $uibModal.open(
      {
        templateUrl: 'frontend/manter-aluno/view/modal-cadastro-alunos.html',
        controller: 'ModalCadastroAlunosController',
        controllerAs: 'modalCadastroAlunosCtrl',
        size: 'lg',
        resolve: {
                'id' : function () {
                  return id;
                }
        }
      }
    );
  }



  $http.get('http://localhost/sisadail/backend/index.php/fichas').then(
    function(resultado) {
      self.teste = resultado.data;
    }
  );

}

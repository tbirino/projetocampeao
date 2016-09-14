angular
.module('app')
.controller('FichaPesquisaController', FichaPesquisaController);

FichaPesquisaController.$inject = ['$http', '$uibModal'];

function FichaPesquisaController ($http, $uibModal){

  var self = this;

  self.abrirModalCadastro = abrirModalCadastro;
  self.abrirModalAlterar = abrirModalAlterar;

  function abrirModalCadastro(){
    var modalInstance = $uibModal.open(
      {
        templateUrl: 'frontend/manter-ficha/view/modal-cadastro.html',
        controller: 'ModalCadastroController',
        controllerAs: 'modalCadastroCtrl',
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
        templateUrl: 'frontend/manter-ficha/view/modal-cadastro.html',
        controller: 'ModalCadastroController',
        controllerAs: 'modalCadastroCtrl',
        size: 'lg',
        resolve: {
                'id' : function () {
                  return id;
                }
        }
      }
    );
  }



  $http.get('http://localhost/sisadail/backend/alunoServico.php/fichas').then(
    function(resultado) {
      self.teste = resultado.data;
    }
  );

}

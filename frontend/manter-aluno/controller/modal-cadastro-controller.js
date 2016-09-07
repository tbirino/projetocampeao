angular
.module('app')
.controller('ModalCadastroAlunosController', ModalCadastroAlunosController);

ModalCadastroController.$inject = ['$http', '$uibModalInstance', 'id'];

function ModalCadastroController ($http, $uibModalInstance, id){

  var self = this;

  self.ficha = {
      idFicha : null,
      tipoPessoa : null,
      nomePessoa : null,
      idadePessoa : null,
      contatoPessoa : null,
      enderecoPessoa : null,
      emailPessoa : null,
      estadoCivil : null,
      quantidadeFilhos : 0,
      isFazParteDeIgreja : false,
      isAfastadoIgreja : false,
      isBatizado : false,
      pedidosDeOracao : null,
      notaReceptividade : null,
      nomeCadastrante : null,
      dataCadastro : null
  };

  self.fechar = fechar;


  init();

  function fechar(){
    $uibModalInstance.dismiss();
  }

  function init(){
    if(id && id > 0){
      $http.get('http://localhost/sisadail/backend/index.php/ficha/' + id ).then(
        function(resultado) {
          self.ficha  = resultado.data[0];
        }
      );
    }
  }

}

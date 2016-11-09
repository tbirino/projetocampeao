angular
    .module('app')
    .controller('ModalExibirAlunosController', ModalExibirAlunosController);

ModalExibirAlunosController.$inject = ['$http', '$uibModalInstance', 'id', 'toastr', 'Restangular'];

function ModalExibirAlunosController($http, $uibModalInstance, id, toastr, Restangular) {

    var self = this;
    var path = 'alunoServico.php/';
    self.fechar = fechar;

    init();

    function fechar() {
        $uibModalInstance.dismiss();
    }

    function init() {
        if (id) {
            Restangular.one(path + '/aluno/' + id).get().then(function(resultado) {
                self.aluno = resultado.plain()[0];
            });
        }
    }

}

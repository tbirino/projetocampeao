angular
    .module('app')
    .controller('ListarAlunosController', ListarAlunosController);

ListarAlunosController.$inject = ['$http', '$uibModal', 'toastr', 'Restangular', 'NgTableParams'];

function ListarAlunosController($http, $uibModal, toastr, Restangular, NgTableParams) {

    var self = this;
    var path = 'alunoServico.php/';

    self.abrirModalCadastroAluno = abrirModalCadastroAluno;
    self.abrirModalAlterarAluno = abrirModalAlterarAluno;
    self.abrirModalExibirAluno = abrirModalExibirAluno;
    self.excluirAluno = excluirAluno;

    function init() {
        Restangular.all(path + '/alunos').getList().then(function(resultado) {
            self.alunos = resultado.plain();
            initTabelaAlunos(self.alunos);
        });

    }

    function initTabelaAlunos(alunos) {
        self.tblAlunos = new NgTableParams({
            page: 1,
            count: 10,
        }, {
            total: 0,
            counts: [5, 10, 15, 20, 50, 100],
            data: alunos
        });
    }

    function excluirAluno(idAluno) {
        Restangular.one(path + '/excluirAluno', idAluno).remove().then(function(resultado) {
            toastr.success('O aluno foi excluido do banco de dados!');
            init();
        });

    }

    function abrirModalCadastroAluno() {
        var modalInstance = $uibModal.open({
            templateUrl: 'frontend/manter-aluno/view/modal-cadastrar-alunos.html',
            controller: 'ModalCadastrarAlunosController',
            controllerAs: 'modalCadastrarAlunosCtrl',
            size: 'lg',
            resolve: {
                'id': function() {
                    return null;
                }
            }
        });
        modalInstance.result.then(function() {
            init();
        });
    }

    function abrirModalAlterarAluno(id) {
        var modalInstance = $uibModal.open({
            templateUrl: 'frontend/manter-aluno/view/modal-cadastrar-alunos.html',
            controller: 'ModalCadastrarAlunosController',
            controllerAs: 'modalCadastrarAlunosCtrl',
            size: 'lg',
            resolve: {
                'id': function() {
                    return id;
                }
            }
        });
        modalInstance.result.then(function() {
            init();
        });
    }

    function abrirModalExibirAluno(id) {
        var modalInstance = $uibModal.open({
            templateUrl: 'frontend/manter-aluno/view/modal-exibir-alunos.html',
            controller: 'ModalExibirAlunosController',
            controllerAs: 'ModalExibirAlunosCtrl',
            size: 'lg',
            resolve: {
                'id': function() {
                    return id;
                }
            }
        });
        modalInstance.result.then(function() {
            init();
        });
    }

    init();


}

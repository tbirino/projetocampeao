angular
    .module('app')
    .controller('ModalCadastrarAlunosController', ModalCadastrarAlunosController);

ModalCadastrarAlunosController.$inject = ['$http', '$uibModalInstance', 'id', 'toastr', 'Restangular'];

function ModalCadastrarAlunosController($http, $uibModalInstance, id, toastr, Restangular) {

    var self = this;
    var path = 'alunoServico.php/';
    self.cadastrar = cadastrar;
    self.fechar = fechar;

    self.aluno = {
        idAluno: null,
        nome: null,
        cpf: null,
        rg: null,
        dtNascimento: null,
        endereco: null,
        telResidencial: null,
        telCelular: null,
        nomePai: null,
        nomeMae: null,
        email: null,
        dtEntrada: null,
        alunoTipoSanguineo: null

    };


    init();

    function fechar() {
        $uibModalInstance.dismiss();
    }

    function cadastrar() {
        if (self.aluno.idAluno) {
            Restangular.one(path + '/alterar').customPUT(converterObjetoSlim(self.aluno)).then(function(resultado) {
                toastr.success('Aluno alterado com sucesso');
                $uibModalInstance.close();
            });
        } else {
            Restangular.all(path + '/cadastro').post(converterObjetoSlim(self.aluno)).then(function(resultado) {
                toastr.success('Aluno cadastrado com sucesso');
                $uibModalInstance.close();
            });
        }
    }

    function converterObjetoSlim(aluno) {
        return {
            'id_aluno': aluno.idAluno,
            'nome': aluno.nome,
            'cpf': aluno.cpf,
            'rg': aluno.rg,
            'dt_nascimento': aluno.dtNascimento,
            'tel_celular': aluno.telCelular,
            'endereco': aluno.endereco,
            'tel_residencial': aluno.telResidencial,
            'nome_pai': aluno.nomePai,
            'nome_mae': aluno.nomeMae,
            'email': aluno.email,
            'dt_entrada': aluno.dtEntrada,
        };
    }

    function init() {
        if (id) {
            Restangular.one(path + '/aluno/' + id).get().then(function(resultado) {
                self.aluno = resultado.plain()[0];
            });
        }
    }

}

angular
.module('app')
.controller('ModalCadastrarAlunosController', ModalCadastrarAlunosController);

ModalCadastrarAlunosController.$inject = ['$http', '$uibModalInstance', 'id'];

function ModalCadastrarAlunosController ($http, $uibModalInstance, id){

    var self = this;

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

    self.fechar = fechar;


    init();

    function fechar(){
        $uibModalInstance.dismiss();
    }

    function init(){
        if(id && id > 0){
            $http.get('http://localhost/sisadail/backend/alunoServico.php/alunos/' + id ).then(
                function(resultado) {
                    self.ficha  = resultado.data[0];
                }
            );
        }
    }

}

angular
.module('app', ['ngRoute', 'ui.bootstrap'])
.config(appConfig);

appConfig.$inject = ['$routeProvider'];

function appConfig($routeProvider){

  $routeProvider

    .when('/', {
       templateUrl : 'frontend/manter-ficha/view/ficha-pesquisa.html',
       controller : 'FichaPesquisaController',
       controllerAs : 'pesquisaCtrl',
    })
    .when('/listarAlunos',{
      templateUrl:'frontend/manter-aluno/view/listar-alunos.html',
      controller:'',
      controllerAs:'',
    })
    .otherwise ({ redirectTo: '/' });

}

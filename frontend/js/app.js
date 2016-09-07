angular
.module('app', ['ngRoute', 'ui.bootstrap'])
.config(appConfig);

appConfig.$inject = ['$routeProvider'];

function appConfig($routeProvider){

  $routeProvider

    .when('/listarAlunos',{
      templateUrl:'frontend/manter-aluno/view/listar-alunos.html',
      controller:'ListarAlunosController',
      controllerAs:'listarCtrl',
    })
    .otherwise ({ redirectTo: '/listarAlunos' });

}

angular
.module('app', ['ngRoute', 'ui.bootstrap','ngMask'])
.config(appConfig);

appConfig.$inject = ['$routeProvider'];

function appConfig($routeProvider){

  $routeProvider

    .when('/listarAlunos',{
      templateUrl:'frontend/manter-aluno/view/listar-alunos.html',
      controller:'ListarAlunosController',
      controllerAs:'listarAlunosCtrl',
    })
    .otherwise ({ redirectTo: '/listarAlunos' });

}

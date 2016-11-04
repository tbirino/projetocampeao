angular
.module('app', ['ngRoute', 'ui.bootstrap','ngMask','toastr'])
.config(appConfig);

appConfig.$inject = ['$routeProvider','toastrConfig'];

function appConfig($routeProvider,toastrConfig){

  angular.extend(toastrConfig, {
    autoDismiss: false,
    containerId: 'toast-container',
    maxOpened: 0,
    newestOnTop: true,
    positionClass: 'toast-top-right',
    preventDuplicates: false,
    preventOpenDuplicates: false,
    target: 'body'
  });

  $routeProvider

  .when('/listarAlunos',{
    templateUrl:'frontend/manter-aluno/view/listar-alunos.html',
    controller:'ListarAlunosController',
    controllerAs:'listarAlunosCtrl',
  })
  .otherwise ({ redirectTo: '/listarAlunos' });

}

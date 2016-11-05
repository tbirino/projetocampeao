angular
.module('app', ['ngRoute', 'ui.bootstrap','ngMask','toastr','restangular'])
.config(appConfig);

appConfig.$inject = ['$routeProvider','toastrConfig','RestangularProvider'];

function appConfig($routeProvider,toastrConfig,RestangularProvider){

RestangularProvider.setBaseUrl('http://localhost/projetocampeao/backend/');

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

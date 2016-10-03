/**
 * Created by Wagner de Lima on 02/10/16.
 */

var app = angular.module('CadastroUsuario', []);

app.controller('CadastroUsuarioController', ['$scope', '$http', '$log', function ($scope, $http, $log) {

    $scope.nome = '';
    $scope.sobrenome = '';
    $scope.email = '';
    $scope.senha = '';
    $scope.dataNascimento = '';
    $scope.sexo = '';
    $scope.cidade = '';
    $scope.idPais = '';
    $scope.celular = '';
    $scope.telefone = '';
    $scope.facebookLink = '';
    $scope.situacao = '';
    $scope.dataCadastro = '';


    var verifyFieldsNull = function () {

        /*Método verifica se algum dos campos de cadastro de usuário está vazio.*/
        return $scope.name == null || $scope.sobrenome == null || $scope.email == null || $scope.senha == null ||
                $scope.dataNascimento == null || $scope.sexo == null || $scope.cidade == null || $scope.cidade == null ||
                $scope.idPais == null || $scope.celular == null || $scope.telefone == null || $scope.facebookLink == null ||
                $scope.situacao == null ;
    };

    $scope.cadastrarUsuario = function () {

        $log.log('Cadastrado!');
    };

}]);

app.factory('CadastroUsuarioService', ['$http', function ($http) {


}]);
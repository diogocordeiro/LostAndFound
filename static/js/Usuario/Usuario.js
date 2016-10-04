/**
 * Created by Wagner de Lima on 04/10/16.
 */

var app = angular.module('login', []);

app.controller('CadastroController', ['$scope', '$http', '$log', function ($scope, $http, $log) {

    $scope.email = '';
    $scope.data_nascimento = '';
    $scope.senha = '';
    $scope.confirmar_senha = '';

    var verifyFieldsNull = function () {

        /*Método retorna true se allgum dos campos de cadastro for vazio,*/
        return $scope.email == null || $scope.data_nascimento == null ||
            $scope.senha == null || $scope.confirmar_senha == null;
    };



}]);

app.factory('CadastroService', ['$http', '$log', function ($http, $log) {

    return {

    }
}]);

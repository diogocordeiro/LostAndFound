/**
 * Created by Wagner de Lima on 02/10/16.
 */

var app = angular.module('PerfilUsuario', []);

app.controller('PerfilUsuarioController', ['$scope', '$http', '$log', 'PerfilUsuarioService',
    function ($scope, $http, $log, PerfilUsuarioService) {

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
        $scope.dataCadastro = '';

        var verifyFieldsNull = function () {

            /*Método verifica se algum dos campos de cadastro de usuário está vazio.*/
            return $scope.nome == null || $scope.sobrenome == null || $scope.email == null || $scope.senha == null ||
                $scope.dataNascimento == null || $scope.sexo == null || $scope.cidade == null || $scope.idPais == null ||
                $scope.celular == null || $scope.telefone == null || $scope.facebookLink == null || $scope.situacao == null;
        };

        var verifyUserAge = function (birthday) {

            /*Método verifica se idade de usuário é maior que 18.*/

            var ageDifferenceMs = Date.now() - birthday.getTime();
            // miliseconds from epoch
            var ageDate = new Date(ageDifferenceMs);
            return Math.abs(ageDate.getUTCFullYear() - 1970);

        };

        $scope.atualizarUsuario = function () {

            if (!verifyFieldsNull() && verifyUserAge($scope.dataNascimento) >= 18) {

                PerfilUsuarioService.atualizarUsuario($scope.nome, $scope.sobrenome, $scope.email, $scope.senha,
                    $scope.dataNascimento, $scope.sexo, $scope.cidade, $scope.celular, $scope.telefone, $scope.facebookLink, $scope.situacao);
            } else {
                alert("Apenas usuários com mais de 18 anos podem cadastrarem-se no sistema.");
            }
        };

    }]);

app.factory('PerfilUsuarioService', ['$http', 'UrlService', '$log', function ($http, UrlService, $log) {

    return {

        atualizarUsuario: function (nome, sobrenome, email, senha, dataNascimento,
                                    sexo, cidade, celular, telefone, facebookLink, situacao) {

            $http.post(UrlService.updateUrl(), {nome:nome, sobrenome: sobrenome, email: email, senha: senha,
                data_nascimento: dataNascimento, sexo: sexo, cidade: cidade, celular: celular, telefone: telefone,
                facebook: facebookLink}, {'Content-Type': 'application/json'})

                .success(function (data) {
                    $log.log(data);
                })
                .error(function (err) {
                    $log.log(err);
                })
        }
    };
}]);

app.factory('UrlService', ['$log', function ($log) {

    return {
        updateUrl: function () {
            var localUrl = 'cadastrar/usuario';
            return localUrl;
        }
    }
}]);
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

    var verifyUserAge = function (birthday) {

        /*Método verifica se idade de usuário é maior que 18.*/

        var ageDifferenceMs = Date.now() - birthday.getTime();
        // miliseconds from epoch
        var ageDate = new Date(ageDifferenceMs);
        return (Math.abs(ageDate.getUTCFullYear() - 1970) >= 18) ? true : false;

    };

    var verifyPasswordsMatch = function () {

        /*Método que verifica se ambas as senhas são iguais.*/
        return $scope.confirmar_senha.localeCompare($scope.senha) == 0;
    };


    $scope.cadastrarUsuario = function () {

        if (verifyFieldsNull()) {

            $scope.statusNull = true;
            $scope.mesageNull = "Por favor, preencha os campos em branco.";
        }

        if (verifyUserAge($scope.data_nascimento)) {

            $scope.statusIdade = true;
            $scope.messageIdade = "Você deve ter mais de 18 anos para cadastrar-se!";
        }

        if (verifyPasswordsMatch()) {

            $scope.statusSenha = true;
            $scope.messageSenha = "As senhas devem ser iguais!";
        }

        if (!verifyFieldsNull() && verifyUserAge() && verifyPasswordsMatch()) {

            $scope.statusIdade = false;
            $scope.statusNull = false;
            $scope.statusSenha = false;

           //chamar post aqui.
        }
    }

}]);

app.factory('CadastroService', ['$http', '$log', 'UrlService', function ($http, $log, UrlService) {

    return {

        cadastrarUsuario: function (email, data_nascimento, senha) {

            $http.post(UrlService.cadastrarUrl(),
                {email: email, data_nascimetno: data_nascimento, senha: senha},
                {headers: {'Content-Type': 'application/json'}})
                .success(function (data) {
                    $log.log(data);
                })
                .error(function (err) {
                    $log.log(err);
                })
        }
    }
}]);

app.factory('UrlService', ['$log', function ($log) {

    return {
        cadastrarUrl: function () {
            var localUrl = 'cadastrar/usuario';
            return localUrl;
        }
    }
}]);
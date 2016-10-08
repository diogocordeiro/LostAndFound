/**
 * Created by Wagner de Lima on 04/10/16.
 */

var app = angular.module('login', ["datetime"]);

app.controller('CadastroController', ['$scope', '$http', '$log', 'CadastroService',
    function ($scope, $http, $log, CadastroService) {

        $scope.email = '';
        $scope.data_nascimento = '';
        $scope.senha = '';
        $scope.confirmar_senha = '';


        $scope.test = function () {
            console.log($scope.data_nascimento);
        };
        function isEmpty(str) {
            return (!str || 0 === str.length);
        }

        $scope.verifyFieldsNull = function () {

            /*Método retorna true se allgum dos campos de cadastro for vazio,*/
            return $scope.email == null || $scope.data_nascimento == null ||
                $scope.senha == null || $scope.confirmar_senha == null;
        };

        $scope.verifyFieldsUndefined = function () {

            /*Método retorna true se allgum dos campos de cadastro for vazio,*/
            return $scope.email == undefined || $scope.data_nascimento == undefined ||
                $scope.senha == undefined || $scope.confirmar_senha == undefined;
        };

        $scope.verifyFieldsEmpty = function () {

            /*Método retorna true se allgum dos campos de cadastro for vazio,*/
            return isEmpty($scope.email) || isEmpty($scope.data_nascimento ) ||
                isEmpty($scope.senha ) || isEmpty($scope.confirmar_senha);
        };

        $scope.verifyDateStructure = function () {
            var data = $scope.data_nascimento;
            if (data.length == 2){
                data = data + '/';
                document.forms[0].data.value = data;
                return true;
            }
            if (data.length == 5){
                data = data + '/';
                document.forms[0].data.value = data;
                return true;
            }
        };

        $scope.verifyUserAge = function (birthday) {

            /*Método verifica se idade de usuário é maior que 18.*/

            var ageDifferenceMs = Date.now() - birthday.getTime();
            // miliseconds from epoch
            var ageDate = new Date(ageDifferenceMs);
            return (Math.abs(ageDate.getUTCFullYear() - 1970) >= 18) ? true : false;
        };

        $scope.verifyPasswordsMatch = function () {

            /*Método que verifica se ambas as senhas são iguais.*/
            return $scope.confirmar_senha.localeCompare($scope.senha) == 0;
        };


        $scope.cadastrarUsuario = function () {

            /*Cadastra usuário caso dados de formulário não estejam inválidos.*/
            if ($scope.verifyFieldsNull() || $scope.verifyFieldsUndefined() || $scope.verifyFieldsEmpty()) {

                $scope.statusNull = true;
                $scope.mesageNull = "Por favor, preencha os campos em branco.";
            }

            if ($scope.verifyUserAge($scope.data_nascimento)) {

                $scope.statusIdade = true;
                $scope.messageIdade = "Você deve ter mais de 18 anos para cadastrar-se!";
            }

            if ($scope.verifyPasswordsMatch()) {

                $scope.statusSenha = true;
                $scope.messageSenha = "As senhas devem ser iguais!";
            }

            if (!$scope.verifyFieldsNull() && $scope.verifyFieldsUndefined() &&
                $scope.verifyFieldsEmpty() && $scope.verifyUserAge() && $scope.verifyPasswordsMatch()) {

                $scope.statusIdade = false;
                $scope.statusNull = false;
                $scope.statusSenha = false;

                CadastroService.cadastrarUsuario($scope.email, $scope.data_nascimento, $scope.senha);
                $log.log("Submitted.");
            }
            $log.log("Submitted.");
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
            var localUrl = '../../../backend/usuario.php?tipo=novo';
            return localUrl;
        }
    }
}]);
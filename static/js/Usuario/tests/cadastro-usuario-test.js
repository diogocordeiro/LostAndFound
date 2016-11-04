/**
 * Created by Wagner de Lima on 04/10/16.
 */


describe('cadastro', function () {

    beforeEach(module('login'));

    var $controller;

    beforeEach(inject(function(_$controller_){
        $controller = _$controller_;
    }));

    describe('Passwords', function () {
        it('Passwords must match.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.senha = '';
            $scope.confirmar_senha = '';
            expect($scope.verifyPasswordsMatch()).toBeTruthy();
        });

        it('Passwords must not match.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.senha = '';
            $scope.confirmar_senha = 'aba';
            expect($scope.verifyPasswordsMatch()).toBeFalsy();
        });

        it('Passwords must not match.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.senha = 'aba';
            $scope.confirmar_senha = '';
            expect($scope.verifyPasswordsMatch()).toBeFalsy();
        });

        it('Passwords must not match.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.senha = 'Hausd8874%ls';
            $scope.confirmar_senha = 'Lppaosuue';
            expect($scope.verifyPasswordsMatch()).toBeFalsy();
        });

        it('Passwords must not be null.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.senha = null;
            $scope.confirmar_senha = null;
            expect($scope.verifyFieldsNull()).toBeTruthy();
        });

    });

    describe('Email', function () {

        it('Email should be null.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.email = null;
            expect($scope.verifyFieldsNull()).toBeTruthy();
        });

        it('Email should be empty.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.email = '';
            expect($scope.verifyFieldsEmpty()).toBeTruthy();
        });

        it('Email should not be null.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.email = 'waglds@gmail.com';
            expect($scope.verifyFieldsNull()).toBeFalsy();
        });

        it('Email should not be empty.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.email = 'waglds@gmail.com';
            expect($scope.verifyFieldsEmpty()).toBeTruthy();
        });
    });

    describe('Birthday', function () {

        it('Birthday should be null.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.data_nascimento = null;
            expect($scope.verifyFieldsNull()).toBeTruthy();
        });

        it('Birthday should be empty.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.data_nascimento = '';
            expect($scope.verifyFieldsEmpty()).toBeTruthy();
        });

        it('Birthday should not be null.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.data_nascimento = 'Thu Oct 13 2016 00:00:00 GMT-0300 (BRT)';
            expect($scope.verifyFieldsNull()).toBeFalsy();
        });

        it('Birthday should not be empty.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.data_nascimento = 'Thu Oct 13 2016 00:00:00 GMT-0300 (BRT)';
            expect($scope.verifyFieldsEmpty()).toBeTruthy();
        });

        it('Birthday should not be greater than 18.', function () {
            var $scope = {};
            var controller = $controller('CadastroController', { $scope: $scope });
            $scope.data_nascimento = 'Wed Jan 01 1992 17:32:19 GMT-0300 (BRT)';
            expect($scope.verifyUserAge($scope.data_nascimento)).toBeFalsy();
        });

    });
});
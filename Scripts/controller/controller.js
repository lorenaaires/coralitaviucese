var myApp = angular.module('my-app', ['angular-storage', 'angular.filter','ngAnimate', 'ngSanitize', 'ui.bootstrap']);

angular.module('my-app').service('globalService', function (store) {
    if (store.get('userConnected') == undefined) store.set('userConnected', '');
    this.setUser = function (u) {
        store.set('userConnected', u);
    }
    this.getUser = function () {
        return store.get('userConnected');
    }
});
angular.module('my-app').controller('MyController', MyController);

function MyController($log, $scope, $filter, globalService, store, $compile, $location, $window, $anchorScroll, $http) {

    //$scope.arrayPages = ['HOME', 'LA STORIA', 'REPERTORIO', 'CONCERTI', 'CONTATTI', 'FOTO', 'AUDIO', 'VIDEO'];
    $scope.arrayPages = ['HOME', 'LA STORIA', 'REPERTORIO', 'CONCERTI', 'CONTATTI', 'FOTO'];
    $scope.fotoCoro = [
        { url: 'img/big/gruppo2017-big.jpg', descrizione: '2017' },
        { url: 'img/big/gruppo2016-big.jpg', descrizione: '2016' },
        { url: 'img/big/gruppo2015-big.jpg', descrizione: '2015' },
        { url: 'img/big/gruppo2014-big.jpg', descrizione: '2014' }
        ]

    $scope.tipologiaSelected = 'Canti Popolari e di montagna';

    $scope.changePage = function (pagina) {
        $scope.pageSelected = pagina;

    }
    $scope.connectedUser = globalService.getUser();
    console.log($scope.connectedUser);
    $scope.changePage("HOME");
    $scope.brani = [];
    $scope.user = {
        username: '',
        password: '',

    }

    $scope.showModalLogin = function () {
        $('#modalLogin').modal('show');
    }
    $scope.login = function () {
        $.ajax({
            url: "api/Values/Login.php",
            type: "POST",
            dataType: 'json', // add json datatype to get json
            data: ({
                username: $scope.tempUser.nickname,
                password: $scope.tempUser.password
            }),
            success: function (data) {
                $scope.connectedUser = data[0];
                $scope.$apply();
                globalService.setUser($scope.connectedUser);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                console.log(jqXHR.responseText);
            }
        });

    }
    $scope.checkSession = function () {
        $.ajax({
            url: "api/Values/CheckSession.php",
            type: "POST",
            dataType: 'json', // add json datatype to get json
            data: ({
                auth_key: $scope.connectedUser.auth_key,
                username: $scope.connectedUser.nickname
            }),

            success: function (data) {
                //data = JSON.parse(data);
                console.log(data);
                if (data.length > 0 && data[0]!=false) {
                    $scope.connectedUser = data[0];
                } else {
                    $scope.connectedUser = null;
                }
                $scope.$apply();

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                console.log(jqXHR.responseText);
            }
        });

    }
    $scope.checkSession();
    $scope.logout = function () {
        $.ajax({
            url: "api/Values/Logout.php",
            type: "POST",
            dataType: 'json', // add json datatype to get json
            data: ({
                username: $scope.connectedUser.nickname
            }),
            success: function (data) {
                $scope.connectedUser = null;
                $scope.$apply();
                globalService.setUser(null);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                console.log(jqXHR.responseText);
            }
        });
    }
}

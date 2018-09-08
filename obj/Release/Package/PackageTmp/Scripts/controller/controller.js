var myApp = angular.module('my-app', ['angular-storage', 'angular.filter']);

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
    $scope.fotoCoro = [{ url: '../img/big/gruppo2016-big.jpg', descrizione: '2016' },
        { url: '../img/big/gruppo2015-big.jpg', descrizione: '2015' },
        { url: '../img/big/gruppo2014-big.jpg', descrizione: '2014' }]

    $scope.tipologiaSelected = 'Canti Popolari e di montagna';
    $scope.connectedUser = globalService.getUser();
    $scope.changePage = function (pagina) {
        $scope.pageSelected = pagina;
        if (pagina == "REPERTORIO") {
            $scope.getBrani();
        }
    }
    //$scope.connectedUser = null;
    $scope.changePage("HOME");
    $scope.brani = [];
    $scope.user = {
        username: '',
        password: '',

    }
    $scope.getBrani = function () {
        $http({
            method: "POST",
            url: "api/Values/Brani",
            params: {
                //id: 1
            },
            headers: { "Content-Type": "application/x-www-form-urlencoded" }
        }).then(function mySuccess(response) {
            $scope.brani = response.data;
            $scope.tipologiaSelected = $scope.brani[0].Gruppo_id.toString();
        }, function myError(response) {
            $scope.myWelcome = response.statusText;
        });
    }
    $scope.getBrani();

    $scope.showModalLogin = function () {
        $('#modalLogin').modal('show');
    }
    $scope.checkLogin = function () {
        $http({
            method: "POST",
            url: "api/Values/Login",
            params: {
                username: $scope.user.username,
                password: $scope.user.password
            },
            headers: { "Content-Type": "application/x-www-form-urlencoded" }
        }).then(function mySuccess(response) {
            console.log(response);
            if (response.data) {
                $scope.connectedUser = response.data;

                globalService.setUser($scope.connectedUser);
            }
        }, function myError(response) {
            console.log(response);
        });
    }
    //$rootScope.$on('user-connected', function (ev, args) {
    //    console.log(args);
    //    $scope.connectedUser = args;
    //});
}

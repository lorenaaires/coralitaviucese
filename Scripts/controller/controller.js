var myApp = angular.module('my-app', ['angular-storage', 'angular.filter', 'ngAnimate', 'ngSanitize', 'ui.bootstrap', 'ngFilters']);

angular.module('my-app').service('globalService', function(store) {
    if (store.get('userConnected') == undefined) store.set('userConnected', '');
    this.setUser = function(u) {
        store.set('userConnected', u);
    }
    this.getUser = function() {
        return store.get('userConnected');
    }
});
angular.module('my-app').controller('MyController', MyController);

function MyController($log, $scope, $filter, globalService, store, $compile, $location, $window, $anchorScroll, $http) {
    let userTemp = JSON.parse(localStorage.getItem('userConnected'));
    if(userTemp === ''){
        localStorage.removeItem('userConnected');
    }
    $scope.connectedUser = JSON.parse(localStorage.getItem('userConnected'));
    
    //$scope.arrayPages = ['HOME', 'LA STORIA', 'REPERTORIO', 'CONCERTI', 'CONTATTI', 'FOTO', 'AUDIO', 'VIDEO'];
    $scope.arrayPages = ['HOME', 'LA STORIA', 'REPERTORIO', 'CONCERTI', 'CONTATTI', 'MEDIA'];
    $scope.fotoCoro = [
        { url: 'img/big/gruppo2017-big.jpg', descrizione: '2017' },
        { url: 'img/big/gruppo2016-big.jpg', descrizione: '2016' },
        { url: 'img/big/gruppo2015-big.jpg', descrizione: '2015' },
        { url: 'img/big/gruppo2014-big.jpg', descrizione: '2014' }
    ]

    $scope.tipologiaSelected = 'Canti Popolari e di montagna';

    $scope.changePage = function(pagina) {
        $scope.pageSelected = pagina;
        localStorage.setItem('page', pagina);
        $('html').removeClass('nav-open');
        $toggle = $('.navbar-toggler');
        $toggle.removeClass('toggled');

    }

    if (localStorage.getItem('page')) {
        $scope.changePage(localStorage.getItem('page'));
    } else {
        $scope.changePage("HOME");
    }
    $scope.brani = [];
    $scope.user = {
        username: '',
        password: '',

    }

    $scope.showModalLogin = function() {
        $('#modalLogin').modal('show');
    }
    $scope.login = function() {
        $.ajax({
            url: "api/Values/Login.php",
            type: "POST",
            dataType: 'json', // add json datatype to get json
            data: ({
                username: $scope.tempUser.nickname,
                password: $scope.tempUser.password
            }),
            success: function(data) {
                if (data) {
                    $scope.connectedUser = data[0];
                    $scope.$apply();
                    localStorage.setItem('userConnected', JSON.stringify($scope.connectedUser));
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                console.log(jqXHR.responseText);
            }
        });

    }
    $scope.logout = function() {
        if ($scope.connectedUser && $scope.connectedUser != '' && $scope.connectedUser.nickname) {
            $.ajax({
                url: "api/Values/Logout.php",
                type: "POST",
                dataType: 'json', // add json datatype to get json
                data: ({
                    username: $scope.connectedUser.nickname
                }),
                success: function(data) {
                    $scope.connectedUser = null;
                    $scope.$apply();
                    localStorage.removeItem('userConnected');
                    // globalService.setUser(null);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $scope.connectedUser = null;
                    localStorage.removeItem('userConnected');
                    console.log(textStatus, errorThrown);
                    console.log(jqXHR.responseText);
                }
            });
        } else {
            $scope.connectedUser = null;
            localStorage.removeItem('userConnected');
        }
    }
}

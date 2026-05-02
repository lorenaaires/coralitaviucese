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
    $scope.tempUser = {
        nickname: '',
        password: ''
    };
    $scope.curricula = [];
    $scope.mediaPhotos = [];
    $scope.mediaAudio = [];
    
    //$scope.arrayPages = ['HOME', 'LA STORIA', 'REPERTORIO', 'CONCERTI', 'CONTATTI', 'FOTO', 'AUDIO', 'VIDEO'];
    $scope.arrayPages = ['HOME', 'LA STORIA', 'REPERTORIO', 'CONCERTI', 'CONTATTI', 'MEDIA'];

    $scope.tipologiaSelected = 'Canti Popolari e di montagna';

    $scope.changePage = function(pagina) {
        if (pagina === 'MANAGE' && (!$scope.connectedUser || !$scope.connectedUser.nickname)) {
            $scope.pageSelected = 'HOME';
            localStorage.setItem('page', 'HOME');
            $('#modalLogin').modal('show');
            return;
        }
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
    $scope.loadCurricula = function() {
        $.ajax({
            url: "api/Values/Curricula.php",
            type: "POST",
            dataType: 'json',
            success: function(data) {
                $scope.curricula = data || [];
                $scope.$apply();
            }
        });
    }
    $scope.loadMediaPhotos = function() {
        $.ajax({
            url: "api/Values/MediaPhotos.php",
            type: "POST",
            dataType: 'json',
            success: function(data) {
                $scope.mediaPhotos = data || [];
                $scope.fotoCoro = $scope.mediaPhotos;
                $scope.$apply();
            }
        });
    }
    $scope.loadMediaAudio = function() {
        $.ajax({
            url: "api/Values/MediaAudio.php",
            type: "POST",
            dataType: 'json',
            success: function(data) {
                $scope.mediaAudio = data || [];
                $scope.$apply();
            }
        });
    }
    $scope.loadCurricula();
    $scope.loadMediaPhotos();
    $scope.loadMediaAudio();
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
                if (data && data.length > 0) {
                    $scope.$apply(function() {
                        $scope.connectedUser = data[0];
                        localStorage.setItem('userConnected', JSON.stringify($scope.connectedUser));
                        $scope.tempUser = {
                            nickname: '',
                            password: ''
                        };
                        $scope.changePage('MANAGE');
                    });
                } else {
                    localStorage.removeItem('userConnected');
                    $scope.connectedUser = null;
                    $scope.tempUser.password = '';
                    $scope.$apply();
                    alert('Credenziali non valide');
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
                    if ($scope.pageSelected === 'MANAGE') {
                        $scope.changePage('HOME');
                    }
                    // globalService.setUser(null);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $scope.connectedUser = null;
                    localStorage.removeItem('userConnected');
                    if ($scope.pageSelected === 'MANAGE') {
                        $scope.changePage('HOME');
                    }
                    console.log(textStatus, errorThrown);
                    console.log(jqXHR.responseText);
                }
            });
        } else {
            $scope.connectedUser = null;
            localStorage.removeItem('userConnected');
            if ($scope.pageSelected === 'MANAGE') {
                $scope.changePage('HOME');
            }
        }
    }
}

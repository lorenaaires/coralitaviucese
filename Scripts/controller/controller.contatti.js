﻿(function () {
    angular.module('my-app').controller('myControllerContatti', myControllerContatti);

    function myControllerContatti($log, $scope, $filter, $timeout, $compile, $location, $window, $anchorScroll, $http, $rootScope) {
        $scope.greeting = 'Hola!';
        console.log($scope.greeting);

        $scope.concerti = [];
        $scope.connectedUser = null;
        $scope.getContatti = function () {
            /*$http({
                method: "POST",
                url: "api/Values/Contatti",
                params: {
                    
                },
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            }).then(function mySuccess(response) {
                $scope.infoCoro = response.data[0];
                console.log($scope.infoCoro);
            }, function myError(response) {
                $scope.myWelcome = response.statusText;
            });*/
            $.ajax({
                url:"api/Values/InfoSito.php",
                type:"POST",
                /*dataType:'json', // add json datatype to get json
                data: ({anno: "home"}),
                params:{
                    anno:"home"
                },*/
                success:function(data){
                    $scope.infoCoro = data[0];
                    $scope.$apply();

                },
                 error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                       console.log(jqXHR.responseText);
                },   
                dataType:"json"
            });
        }
        $scope.getContatti();
        $rootScope.$on('user-connected', function (ev, args) {
            console.log(args);
            $scope.connectedUser = args;
        });
    }
})();
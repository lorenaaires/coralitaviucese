﻿(function () {
    angular.module('my-app').controller('myControllerConcerti', myControllerConcerti);

    function myControllerConcerti($log, $scope, $filter, $timeout, $compile, $location, $window, $anchorScroll, $http, $rootScope) {
        $scope.greeting = 'Hola!';
        console.log($scope.greeting);

        $scope.concerti = [];
        $scope.connectedUser = null;
        $scope.yearSelected = (new Date()).getFullYear().toString();
        $scope.years = [];
        for (var i = $scope.yearSelected; i >= 1999; i--) {
            $scope.years.push(i);
        }
       
         $scope.getConcerti = function () {
           
            $.ajax({
                url:"api/Values/Concerti.php",
                type:"POST",
                dataType:'json', // add json datatype to get json
                data: ({anno: $scope.yearSelected}),
               /*params: {
                    anno: $scope.yearSelected
                },*/
                success:function(data){
                    $scope.concerti = data;
                    console.log($scope.concerti);
                    for(var i=0;i<$scope.concerti.length;i++){
                         $scope.concerti[i].data_inizio = new Date($scope.concerti[i].data_inizio);
                    }
                    $scope.$apply();

                },
                 error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                       console.log(jqXHR.responseText);
                },   
                dataType:"json"
            });
        }
        $scope.getConcerti();
    }
})();
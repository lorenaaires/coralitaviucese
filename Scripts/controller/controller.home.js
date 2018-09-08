(function () {
    angular.module('my-app').controller('myControllerHome', myControllerHome);

    function myControllerHome($log, $scope, $filter, $timeout, $compile, $location, $window, $anchorScroll, $http, $rootScope) {
        $scope.greeting = 'Hola!';
        console.log($scope.greeting,"home");

        $scope.concerti = [];
        $scope.connectedUser = null;
        $scope.getConcerti = function () {
           
            $.ajax({
                url:"api/Values/Concerti.php",
                type:"POST",
                dataType:'json', // add json datatype to get json
                data: ({anno: "home"}),
                /*params:{
                    anno:"home"
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
                }
            });
        }
        $scope.getConcerti();
        $rootScope.$on('user-connected', function (ev, args) {
            console.log(args);
            $scope.connectedUser = args;
        });
    }
})();
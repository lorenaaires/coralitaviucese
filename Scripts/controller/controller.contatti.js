(function () {
    angular.module('my-app').controller('myControllerContatti', myControllerContatti);

    function myControllerContatti($log, $scope, $filter, $timeout, $compile, $location, $window, $anchorScroll, $http, $rootScope) {
       
        $scope.concerti = [];
        $scope.connectedUser = null;
        $scope.getContatti = function () {
           
            $.ajax({
                url:"api/Values/InfoSito.php",
                type:"POST",
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
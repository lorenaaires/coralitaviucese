(function () {
    angular.module('my-app').controller('myControllerRepertorio', myControllerRepertorio);

    function myControllerRepertorio($log, $scope, $filter, $timeout, $compile, $location, $window, $anchorScroll, $http, $rootScope) {
        $scope.greeting = 'Hola!';
        console.log($scope.greeting);
        $scope.tipologie=[];
        $scope.getTipologie = function () {
          $.ajax({
                url:"api/Values/TipologieBrano.php",
                type:"POST",
                
                success:function(data){
                    $scope.tipologie = data;
                    $scope.$apply();

                },
                 error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                       console.log(jqXHR.responseText);
                },   
                dataType:"json"
            });
     
        }
        $scope.getTipologie();

       $scope.getBrani = function () {
          $.ajax({
                url:"api/Values/Brani.php",
                type:"POST",
                
                success:function(data){
                    $scope.brani = data;
                    if($scope.brani.length>0)
                        $scope.tipologiaSelected = $scope.brani[0].Gruppo_id.toString();
                    $scope.$apply();

                },
                 error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                       console.log(jqXHR.responseText);
                },   
                dataType:"json"
            });
     
        }
        $scope.getBrani();
    }
})();
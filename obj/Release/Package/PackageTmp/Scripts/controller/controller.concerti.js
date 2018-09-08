(function () {
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
            $http({
                method: "POST",
                url: "api/Values/Concerti",
                params: {
                    anno: $scope.yearSelected
                },
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            }).then(function mySuccess(response) {
                $scope.concerti = response.data;
            }, function myError(response) {
                $scope.myWelcome = response.statusText;
            });
        }
        $scope.getConcerti();
        
    }
})();
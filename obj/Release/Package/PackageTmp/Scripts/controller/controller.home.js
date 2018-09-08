(function () {
    angular.module('my-app').controller('myControllerHome', myControllerHome);

    function myControllerHome($log, $scope, $filter, $timeout, $compile, $location, $window, $anchorScroll, $http, $rootScope) {
        $scope.greeting = 'Hola!';
        console.log($scope.greeting);

        $scope.concerti = [];
        $scope.connectedUser = null;
        $scope.getConcerti = function () {
            $http({
                method: "POST",
                url: "api/Values/Concerti",
                params: {
                    anno: "home"
                },
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            }).then(function mySuccess(response) {
                $scope.concerti = response.data;
            }, function myError(response) {
                $scope.myWelcome = response.statusText;
            });
        }
        $scope.getConcerti();
        $rootScope.$on('user-connected', function (ev, args) {
            console.log(args);
            $scope.connectedUser = args;
        });
    }
})();
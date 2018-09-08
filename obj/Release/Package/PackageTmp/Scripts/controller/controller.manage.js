(function () {
    angular.module('my-app').controller('myControllerManage', myControllerManage);

    function myControllerManage($log, $scope, $filter, $timeout, $compile, $location, $window, $anchorScroll, $http, $rootScope, globalService) {
        
        $scope.connectedUser = globalService.getUser();
        $scope.concerti = [];
        $scope.hideContatti = true;
        $scope.hideRepertorio = true;
        $scope.hideConcerti = true;

        $scope.tipologiaSelected = 'Canti Popolari e di montagna';
        $scope.getUserConnected = function () {
            $scope.connectedUser = globalService.getUser();
        }
        $scope.getContatti = function () {
            $http({
                method: "POST",
                url: "api/Values/Contatti",
                params: {

                },
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            }).then(function mySuccess(response) {
                $scope.infoCoro = response.data[0];

            }, function myError(response) {
                $scope.myWelcome = response.statusText;
            });
        }
        $scope.getTipologie = function () {
            $scope.tipologie = [];
            var idTipologie = [];
            angular.forEach($scope.brani, function (value, key) {
                if ($scope.tipologie.length == 0) {
                    $scope.tipologie.push(value.tipologia);
                    idTipologie.push(value.tipologia.id_gruppo_repert);
                } else {
                    if (idTipologie.indexOf(value.tipologia.id_gruppo_repert) < 0) {
                        $scope.tipologie.push(value.tipologia);
                        idTipologie.push(value.tipologia.id_gruppo_repert);
                    }
                }
            });
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
                $scope.getTipologie();
                $scope.tipologiaSelected = $scope.brani[0].Gruppo_id.toString();
            }, function myError(response) {
                $scope.myWelcome = response.statusText;
            });
        }
        $scope.changeTipologia = function (tipologia) {
            $scope.tipologiaSelected = tipologia;
        }

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

        $scope.salvaConcerto = function (concerto) {
            console.log(concerto);
            $http.post("/api/Values/SaveConcerto", $scope.fd, {
                params: {
                    concerto: concerto
                },
                headers: { 'Content-Type': undefined },
            }).then(function mySuccess(response) {
                $scope.concerti = response.data;
                $scope.getConcerti();
            }, function myError(response) {
                $scope.myWelcome = response.statusText;
            });

                           
        }
        $scope.getConcerti();
        $scope.modificaConcerto = function (concerto) {
            $scope.selectedConcerto = concerto;
            //$scope.selectedConcerto.data_inizio = (new Date($scope.selectedConcerto.data_inizio)).toLocaleDateString();
            $('#modalModConcerto').modal('show');
        }

        $('.date-picker').each(function () {
            $(this).datepicker({
                templates: {
                    leftArrow: '<i class="now-ui-icons arrows-1_minimal-left"></i>',
                    rightArrow: '<i class="now-ui-icons arrows-1_minimal-right"></i>'
                }
            }).on('show', function () {
                $('.datepicker').addClass('open');

                datepicker_color = $(this).data('datepicker-color');
                if (datepicker_color.length != 0) {
                    $('.datepicker').addClass('datepicker-' + datepicker_color + '');
                }
            }).on('hide', function () {
                $('.datepicker').removeClass('open');
            });
        });
        $scope.fd = new FormData();

        $scope.getTheDoc = function (files) {
            $scope.fd = new FormData();
            //Take the first selected file
            $scope.fd.append("file", files[0]);
        }
        $scope.newConcerto = {
            data_inizio: new Date(),
            data_fine: new Date(),
            quandoDescrizione: '',
            luogo_uscita: '',
            dettagli_uscita: '',
            indirizzoFileVolantini: ''
        };
        $scope.initEmptyConcerto = function () {
            $scope.newConcerto = {
                data_inizio: new Date(),
                data_fine: new Date(),
                quandoDescrizione: '',
                luogo_uscita: '',
                dettagli_uscita: '',
                indirizzoFileVolantini: ''
            };
        }
        $scope.modalAddConcerto = function () {
            $scope.initEmptyConcerto();
            $('#modalAddConcerto').modal('show');
        }
    }

})();
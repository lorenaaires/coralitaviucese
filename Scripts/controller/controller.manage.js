(function () {
  angular.module('my-app').controller('myControllerManage', myControllerManage);

  function myControllerManage($log, $scope, $filter, $timeout, $compile, $location, $window, $anchorScroll, $http, $rootScope, globalService) {

    $scope.connectedUser = globalService.getUser();
    $scope.concerti = [];
    $scope.hideContatti = true;
    $scope.hideRepertorio = true;
    $scope.hideConcerti = true;

    $scope.tipologiaSelected = 'Canti Popolari e di montagna';

    $scope.dateOptions = {
      startingDay: 1
    };
    $scope.open1 = function () {
      $scope.popup1.opened = true;
    };
    $scope.open2 = function () {
      $scope.popup2.opened = true;
    };


    $scope.format = 'dd/mm/yyyy';

    $scope.getUserConnected = function () {
      $scope.connectedUser = globalService.getUser();
    }
    $scope.getContatti = function () {

      $.ajax({
        url: "api/Values/InfoSito.php",
        type: "POST",
        /*dataType:'json', // add json datatype to get json
        data: ({anno: "home"}),
        params:{
            anno:"home"
          },*/
        success: function (data) {
          $scope.infoCoro = data[0];
          $scope.$apply();

        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
          console.log(jqXHR.responseText);
        },
        dataType: "json"
      });
    }
    $scope.getTipologie = function () {
      $.ajax({
        url: "api/Values/TipologieBrano.php",
        type: "POST",
        success: function (data) {
          $scope.tipologie = data;
          $scope.$apply();

        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
          console.log(jqXHR.responseText);
        },
        dataType: "json"
      });
    }
    $scope.getTipologie();
    $scope.getBrani = function () {
      $.ajax({
        url: "api/Values/Brani.php",
        type: "POST",

        success: function (data) {
          $scope.brani = data;
          $scope.tipologiaSelected = $scope.brani[0].Gruppo_id.toString();
          $scope.$apply();

        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
          console.log(jqXHR.responseText);
        },
        dataType: "json"
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

      $.ajax({
        url: "api/Values/Concerti.php",
        type: "POST",
        dataType: 'json', // add json datatype to get json
        data: ({ anno: $scope.yearSelected }),
        /*params: {
             anno: $scope.yearSelected
           },*/
        success: function (data) {
          $scope.concerti = data;
          for (var i = 0; i < $scope.concerti.length; i++) {
            $scope.concerti[i].data_inizio = new Date($scope.concerti[i].data_inizio);
          }
          
          $scope.$apply();

        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
          console.log(jqXHR.responseText);
        },
        dataType: "json"
      });
    }

    $scope.salvaConcerto = function (concerto) {
      
      concerto.data_inizio = new Date(concerto.data_inizio);
      concerto.data_fine = new Date(concerto.data_fine);

      concerto.data_inizio = concerto.data_inizio.getUTCFullYear() + '-' +
        ('00' + (concerto.data_inizio.getUTCMonth() + 1)).slice(-2) + '-' +
        ('00' + concerto.data_inizio.getUTCDate()).slice(-2) + ' ' +
        ('00' + concerto.data_inizio.getUTCHours()).slice(-2) + ':' +
        ('00' + concerto.data_inizio.getUTCMinutes()).slice(-2) + ':' +
        ('00' + concerto.data_inizio.getUTCSeconds()).slice(-2);

      concerto.data_fine = concerto.data_fine.getUTCFullYear() + '-' +
        ('00' + (concerto.data_fine.getUTCMonth() + 1)).slice(-2) + '-' +
        ('00' + concerto.data_fine.getUTCDate()).slice(-2) + ' ' +
        ('00' + concerto.data_fine.getUTCHours()).slice(-2) + ':' +
        ('00' + concerto.data_fine.getUTCMinutes()).slice(-2) + ':' +
        ('00' + concerto.data_fine.getUTCSeconds()).slice(-2);

      $.ajax({
        url: "api/Values/SaveConcerto.php",
        type: "POST",
        contentType: 'multipart/form-data; boundary=MultipartBoundry',
        cache: false,
        processData: false,
        data: ({
          //concerto: concerto,
          locandina: $scope.fd
        }),

        success: function (data) {
          $scope.getConcerti();
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
          console.log(jqXHR.responseText);
        },
        dataType: "json"
      });


    }
    $scope.getConcerti();
    $scope.modificaConcerto = function (concerto) {
      $scope.selectedConcerto = concerto;
      $scope.selectedConcerto.data_inizio = new Date($scope.selectedConcerto.data_inizio);
      $('#modalModConcerto').modal('show');
    }
    $scope.salvaBrani = function () {
      $.ajax({
        url: "api/Values/TipologieBrano.php",
        type: "POST",
        params: {
          brani: $scope.brani
        },
        success: function (data) {
          
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
          console.log(jqXHR.responseText);
        },
        dataType: "json"
      });
    }

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
    $scope.changedDateStart = function (newDateStart) {
      $scope.selectedConcerto.data_inizio = newDateStart;
      $scope.$apply();
    }


  }

})();
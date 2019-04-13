(function () {
  angular.module('my-app').controller('myControllerManage', myControllerManage);

  function myControllerManage($log, $scope, $filter, $timeout,
    $compile, $location, $window, $anchorScroll, $http,
    $rootScope, globalService) {

    $scope.connectedUser = JSON.parse(localStorage.getItem('userConnected'));
    $scope.concerti = [];
    $scope.hideContatti = true;
    $scope.hideRepertorio = true;
    $scope.hideConcerti = true;

    $scope.tipologiaSelected = 'Canti Popolari e di montagna';
    $('input[name="dates"]').daterangepicker({
      locale: {
        format: 'DD/MM/YYYY'
      }
    },
      function (start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        $scope.newConcerto.data_inizio = start.format('YYYY-MM-DD');
        $scope.newConcerto.data_fine = end.format('YYYY-MM-DD');
      });


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
    $scope.getConcerti = function (yearSelected) {
      if (!yearSelected) {
        if ($scope.yearSelected) {
          yearSelected = $scope.yearSelected;
        } else {
          yearSelected = (new Date()).getFullYear().toString();
        }
      }
      $.ajax({
        url: "api/Values/Concerti.php",
        type: "POST",
        dataType: 'json', // add json datatype to get json
        data: ({ anno: yearSelected }),
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
      debugger
      let count = 0;
      $scope.fd.forEach(function (data) { count++ });
      console.log(count);
      if (count > 0) {
        jQuery.ajax({
          url: 'api/Values/Upload.php',
          data: $scope.fd,
          cache: false,
          contentType: false,
          processData: false,
          method: 'POST',
          type: 'POST', // For jQuery < 1.9
          success: function (data) {
            concerto.indirizzoFileVolantini = '/Doc_Volantini/' + data;
            $scope.updateConcerto(concerto);
            //alert(data);
            $scope.getConcerti();
            console.log(data);
          }
        });
      } else {
        $scope.updateConcerto(concerto);
        $scope.getConcerti();
      }


    }
    $scope.updateConcerto = function (concerto) {
      $.post("api/Values/SaveConcerto.php", {
        concerto: concerto
      },
        function (response, status) {
          $scope.getConcerti();
          console.log(response, status);
        }, 'json');

    }
    $scope.getConcerti();
    $scope.modificaConcerto = function (concerto) {
      $scope.selectedConcerto = concerto;
      $scope.selectedConcerto.data_inizio = new Date($scope.selectedConcerto.data_inizio);
      $scope.selectedConcerto.data_fine = new Date($scope.selectedConcerto.data_fine);
      $('input[name="dates"]').daterangepicker({
        locale: {
          format: 'DD/MM/YYYY'
        },
        startDate: $scope.selectedConcerto.data_inizio,
        endDate: $scope.selectedConcerto.data_fine,
      },
        function (start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
          $scope.selectedConcerto.data_inizio = start.format('YYYY-MM-DD');
          $scope.selectedConcerto.data_fine = end.format('YYYY-MM-DD');
        });
      $('#modalModConcerto').modal({
        backdrop: 'static',
        keyboard: false
      });
    }
    $scope.salvaBrani = function () {
      $.post("api/Values/SaveBrani.php", {
        brani: $scope.brani
      },
        function (response, status) {
          $scope.getBrani();
          if (response == 1) {
            alert("Salvataggio avvenuto con successo");
          }
          console.log(response, status);
        }, 'json');
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
      $('#modalAddConcerto').modal({
        backdrop: 'static',
        keyboard: false
    });
    }
    $scope.changedDateStart = function (newDateStart) {
      $scope.selectedConcerto.data_inizio = newDateStart;
      $scope.$apply();
    }
    $scope.savingConttatti = false;
    $scope.salvaContatti = function () {
      $scope.savingConttatti = true;
      $.post("api/Values/SaveContatti.php", {
        infoCoro: $scope.infoCoro
      },
        function (response, status) {
          $scope.savingConttatti = false;
          $scope.getContatti();
          if (response == 1) {
            alert("Salvataggio avvenuto con successo");
          }
          console.log(response, status);
        }, 'json');
    }
    $scope.confirmDeleteConcerto = function (concerto) {
      $scope.selectedConcerto = concerto;
      $('#modalConfirmDeleteConcerto').modal('show');
    }
    $scope.deleteConcerto = function (concerto) {
      $.post("api/Values/DeleteConcerto.php", {
        concerto: concerto
      },
        function (response, status) {
          $scope.getConcerti();
          if (response == 1) {
            alert("Salvataggio avvenuto con successo");
          }
          console.log(response, status);
        }, 'json');
    }
  }

})();
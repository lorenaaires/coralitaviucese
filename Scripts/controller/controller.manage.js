(function () {
  angular.module('my-app').controller('myControllerManage', myControllerManage);

  function myControllerManage($log, $scope, $filter, $timeout,
    $compile, $location, $window, $anchorScroll, $http,
    $rootScope, globalService) {

    if (!$scope.connectedUser || !$scope.connectedUser.nickname) {
      $scope.connectedUser = JSON.parse(localStorage.getItem('userConnected'));
    }
    $scope.concerti = [];
    $scope.curricula = [];
    $scope.mediaPhotos = [];
    $scope.mediaAudio = [];
    $scope.linkCd = { title: 'CD Specchio', url: '' };
    $scope.hideContatti = true;
    $scope.hideRepertorio = true;
    $scope.hideConcerti = true;
    $scope.assetUploads = {
      cv: new FormData(),
      photo: new FormData(),
      audio: new FormData()
    };
    $scope.newCurriculum = { title: '' };
    $scope.newPhoto = { descrizione: '' };
    $scope.newAudio = { title: '' };
    $scope.tabSelected = $scope.manageTabSelected || 'contatti';

    $scope.selectManageTab = function (tab) {
      $scope.tabSelected = tab;
      if ($scope.setManageTab) {
        $scope.setManageTab(tab);
      }
    }

    $scope.initManageTab = function () {
      $scope.tabSelected = $scope.manageTabSelected || 'contatti';
    }

    $scope.tipologiaSelected = null;
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
          if ($scope.tipologie.length > 0 && !$scope.tipologiaSelected) {
            $scope.tipologiaSelected = $scope.tipologie[0].id_gruppo_repertorio;
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
    $scope.getTipologie();
    $scope.getBrani = function () {
      $.ajax({
        url: "api/Values/Brani.php",
        type: "POST",

        success: function (data) {
          $scope.brani = data;
          if (!$scope.tipologiaSelected && $scope.tipologie && $scope.tipologie.length > 0) {
            $scope.tipologiaSelected = $scope.tipologie[0].id_gruppo_repertorio;
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
    $scope.addBranoEmpty = function(){
      $scope.brani.push({
        Gruppo_id:$scope.tipologiaSelected,
        Titolo:"",
        Armonizzazione:""
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
          dataType: 'json',
          type: 'POST', // For jQuery < 1.9
          success: function (data) {
            if (!data || !data.success || !data.fileName) {
              alert(data && data.message ? data.message : 'Upload non riuscito');
              return;
            }

            concerto.indirizzoFileVolantini = 'Doc_Volantini/' + data.fileName;
            $scope.fd = new FormData();
            $scope.updateConcerto(concerto);
            if (data.message) {
              alert(data.message);
            }
            $scope.getConcerti();
            console.log(data);
          },
          error: function (jqXHR, textStatus, errorThrown) {
            alert('Upload non riuscito');
            console.log(textStatus, errorThrown);
            console.log(jqXHR.responseText);
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
    $scope.getCurricula = function () {
      $.ajax({
        url: "api/Values/Curricula.php",
        type: "POST",
        dataType: "json",
        success: function (data) {
          $scope.curricula = data || [];
          $scope.$apply();
        }
      });
    }
    $scope.getMediaPhotos = function () {
      $.ajax({
        url: "api/Values/MediaPhotos.php",
        type: "POST",
        dataType: "json",
        success: function (data) {
          $scope.mediaPhotos = data || [];
          $scope.$apply();
        }
      });
    }
    $scope.getMediaAudio = function () {
      $.ajax({
        url: "api/Values/MediaAudio.php",
        type: "POST",
        dataType: "json",
        success: function (data) {
          $scope.mediaAudio = data || [];
          $scope.$apply();
        }
      });
    }
    $scope.getLinkCd = function () {
      $.ajax({
        url: "api/Values/LinkCd.php",
        type: "POST",
        dataType: "json",
        success: function (data) {
          $scope.linkCd = data || { title: 'CD Specchio', url: '' };
          $scope.$apply();
        }
      });
    }
    $scope.getCurricula();
    $scope.getMediaPhotos();
    $scope.getMediaAudio();
    $scope.getLinkCd();
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
    $scope.setManagedFile = function (files, collection) {
      $scope.assetUploads[collection] = new FormData();
      if (files && files[0]) {
        $scope.assetUploads[collection].append("file", files[0]);
        $scope.assetUploads[collection].append("collection", collection);
      }
    }
    $scope.saveCurricula = function () {
      $.post("api/Values/SaveCurricula.php", {
        items: $scope.curricula
      }, function (response) {
        if (response == 1) {
          $scope.getCurricula();
          if ($scope.loadCurricula) {
            $scope.loadCurricula();
          }
          alert("Curriculum salvati con successo");
        }
      }, 'json');
    }
    $scope.saveMediaPhotos = function () {
      $.post("api/Values/SaveMediaPhotos.php", {
        items: $scope.mediaPhotos
      }, function (response) {
        if (response == 1) {
          $scope.getMediaPhotos();
          if ($scope.loadMediaPhotos) {
            $scope.loadMediaPhotos();
          }
          alert("Foto salvate con successo");
        }
      }, 'json');
    }
    $scope.saveMediaAudio = function () {
      $.post("api/Values/SaveMediaAudio.php", {
        items: $scope.mediaAudio
      }, function (response) {
        if (response == 1) {
          $scope.getMediaAudio();
          if ($scope.loadMediaAudio) {
            $scope.loadMediaAudio();
          }
          alert("Audio salvati con successo");
        }
      }, 'json');
    }
    $scope.saveLinkCd = function () {
      $.post("api/Values/SaveLinkCd.php", {
        linkCd: $scope.linkCd
      }, function (response) {
        if (response == 1) {
          $scope.getLinkCd();
          if ($scope.loadRedirectPages) {
            $scope.loadRedirectPages();
          }
          alert("Link CD salvato con successo");
        } else {
          alert("Inserisci un link esterno valido, completo di http:// o https://");
        }
      }, 'json');
    }
    $scope.uploadManagedAsset = function (collection, callback) {
      var formData = $scope.assetUploads[collection];
      var hasFile = false;
      formData.forEach(function () {
        hasFile = true;
      });

      if (!hasFile) {
        alert('Seleziona un file da caricare');
        return;
      }

      $.ajax({
        url: 'api/Values/UploadManagedFile.php',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
          if (!data || !data.success || !data.path) {
            alert(data && data.message ? data.message : 'Upload non riuscito');
            return;
          }

          $scope.assetUploads[collection] = new FormData();
          callback(data.path, data.message);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert('Upload non riuscito');
          console.log(textStatus, errorThrown);
          console.log(jqXHR.responseText);
        }
      });
    }
    $scope.addCurriculum = function () {
      if (!$scope.newCurriculum.title) {
        alert('Inserisci il titolo del curriculum');
        return;
      }

      $scope.uploadManagedAsset('cv', function (path, message) {
        $scope.curricula.push({
          title: $scope.newCurriculum.title,
          path: path
        });
        $scope.newCurriculum = { title: '' };
        $scope.$apply(function () {
          $scope.saveCurricula();
        });
        if (message) {
          alert(message);
        }
      });
    }
    $scope.addMediaPhoto = function () {
      $scope.uploadManagedAsset('photo', function (path, message) {
        $scope.mediaPhotos.unshift({
          descrizione: $scope.newPhoto.descrizione || '',
          url: path
        });
        $scope.newPhoto = { descrizione: '' };
        $scope.$apply(function () {
          $scope.saveMediaPhotos();
        });
        if (message) {
          alert(message);
        }
      });
    }
    $scope.addMediaAudio = function () {
      if (!$scope.newAudio.title) {
        alert('Inserisci il titolo dell\'audio');
        return;
      }

      $scope.uploadManagedAsset('audio', function (path, message) {
        $scope.mediaAudio.unshift({
          title: $scope.newAudio.title,
          path: path
        });
        $scope.newAudio = { title: '' };
        $scope.$apply(function () {
          $scope.saveMediaAudio();
        });
        if (message) {
          alert(message);
        }
      });
    }
    $scope.removeCurriculum = function (index) {
      $scope.curricula.splice(index, 1);
    }
    $scope.removeMediaPhoto = function (index) {
      $scope.mediaPhotos.splice(index, 1);
    }
    $scope.removeMediaAudio = function (index) {
      $scope.mediaAudio.splice(index, 1);
    }

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

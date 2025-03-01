<div data-ng-controller="myControllerManage">
    <div data-ng-hide="connectedUser==''">

        <div class="container" style="margin-top: 90px;" ng-init="tabSelected='contatti'">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="col-md-12 pb-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item cursor">
                                <a class="nav-link" ng-click="tabSelected='contatti'" ng-class="{'active':tabSelected=='contatti'}">Contatti</a>
                            </li>
                            <li class="nav-item cursor">
                                <a class="nav-link" ng-click="tabSelected='brani'" ng-class="{'active':tabSelected=='brani'}">Brani</a>
                            </li>
                            <li class="nav-item cursor">
                                <a class="nav-link" ng-click="tabSelected='concerti'" ng-class="{'active':tabSelected=='concerti'}">Concerti</a>
                            </li>
                        </ul>
                    </div>
                    <div class="box box-info" ng-show="tabSelected=='contatti'">
                        <div class="box-header with-border">
                            <h3 class="box-title">Contatti</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group" data-ng-init="getContatti()">

                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="col-md-5 text-primary bold col-md-3 text-left">Indirizzo:</span>
                                        <span class="col-md-7 pull-right">
                                            <input type="text" class="input form-control" data-ng-model="infoCoro.indirizzoCoro" />
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="col-md-5 text-primary bold col-md-3 text-left">C.F.:</span>
                                        <span class="col-md-7 pull-right">
                                            <input type="text" class="input form-control" data-ng-model="infoCoro.codiceFiscaleCoro" />
                                        </span>
                                        <!--<span class="text-primary bold col-md-3 text-left">C.F.</span> <span class="col-md-9 text-right">{{infoCoro.codiceFiscaleCoro}}</span>-->
                                    </li>
                                    <li class="list-group-item">
                                        <span class="col-md-5 text-primary bold col-md-3 text-left">Telefono:</span>
                                        <span class="col-md-7 pull-right">
                                            <input type="text" class="input form-control" data-ng-model="infoCoro.telefonoPresidente" />
                                        </span>
                                        <!--<span class="text-primary bold col-md-3 text-left">Telefono:</span> <span class="col-md-9 text-right">{{infoCoro.telefonoPresidente}}</span>-->
                                    </li>
                                    <li class="list-group-item">
                                        <span class="col-md-5 text-primary bold col-md-3 text-left">Presidente (nome cognome):
                                            <br>Email:</span>
                                        <span class="col-md-7 pull-right">
                                            <input type="text" class="input form-control" data-ng-model="infoCoro.nomePresidente" />
                                            <input type="text" class="input form-control" data-ng-model="infoCoro.mailPresidente" />
                                        </span>
                                        <!--<span class="text-primary bold col-md-3 text-left">Presidente: </span><span class="col-md-9 text-right">{{infoCoro.nomePresidente}} <label class="text-primary cursor">{{infoCoro.emailPresidente}}</label></span>-->
                                    </li>
                                    <li class="list-group-item">
                                        <span class="col-md-5 text-primary bold col-md-3 text-left">
                                            Direttore (nome cognome):
                                            <br>
                                            Email:
                                        </span>
                                        <span class="col-md-7 pull-right">
                                            <input type="text" class="input form-control" data-ng-model="infoCoro.nomeDirettore" />
                                            <input type="text" class="input form-control" data-ng-model="infoCoro.mailDirettore" />
                                        </span>
                                        <!--<span class="text-primary bold col-md-3 text-left">Direttore:</span><span class="col-md-9 text-right">{{infoCoro.nomeDirettore}} <label class="text-primary cursor">{{infoCoro.emailPresidente}}</label></span>-->
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <button ng-if="!savingContatti" type="button" class="btn btn-primary" data-widget="remove" data-ng-click="salvaContatti()">SALVA</button>
                            <span ng-if="savingContatti"><i class="fa fa-spin fa-spinner"></i>Salvataggio in corso...</span>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <div class="box box-info" ng-show="tabSelected=='brani'">
                        <div class="box-header with-border">
                            <h3 class="box-title">Repertorio</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group" data-ng-init="getBrani()">
                                <h4>Tipologia</h4>
                                <ul class="list-group">
                                    <li class="list-group-item cursor " data-ng-repeat="tipo in tipologie" data-ng-click="changeTipologia(tipo.id_gruppo_repertorio)" data-ng-class="{'bg-selected':tipologiaSelected==tipo.id_gruppo_repertorio}">
                                        <span class="col-md-2">
                                            <i class="fa " data-ng-class="{'fa-check-square-o':tipologiaSelected==tipo.id_gruppo_repertorio,'fa-square-o':tipologiaSelected!=tipo.id_gruppo_repertorio}"></i>
                                        </span>
                                        <span class="col-md-10">
                                            <input type="text" class="input form-control" style="background-color:#fff;" data-ng-model="tipo.descrizione_gruppo" />
                                        </span>

                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-plus"></i> &nbsp; Aggiungi tipologia
                                    </li>
                                </ul>

                                <button type="button" class="btn btn-primary" data-widget="remove" data-ng-click="salvaTipologia()">SALVA TIPOLOGIE</button>
                                <h4>Brani</h4>
                                <ul class="list-group">
                                    <li class="list-group-item cursor" data-ng-repeat="brano in brani|filter:{Gruppo_id:tipologiaSelected}">
                                        <input type="text" class="input form-control" data-ng-model="brano.Titolo" />
                                    </li>
                                    <li class="list-group-item" ng-click="addBranoEmpty()">
                                        <i class="fa fa-plus"></i> &nbsp; Aggiungi Brano
                                    </li>
                                </ul>

                                <button type="button" class="btn btn-primary" data-widget="remove" data-ng-click="salvaBrani()">SALVA BRANI</button>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">

                            <!--<button type="button" class="btn btn-primary" data-widget="remove" data-ng-click="salvaContatti()">SALVA</button>-->
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <div class="box box-info" ng-show="tabSelected=='concerti'">
                        <div class="box-header with-border">
                            <h3 class="box-title">Concerti</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group" data-ng-init="getConcerti()">
                                <div class="col-md-12" style="margin:20px 0">

                                    <div class="col-md-6 pull-right"><button type="button" class="btn btn-primary" data-ng-click="modalAddConcerto()">Aggiungi Concerto</button></div>
                                    <div class="col-md-6">
                                        <select class="form-control" data-ng-model="yearSelected" data-ng-change="getConcerti(yearSelected)">
                                            <option data-ng-repeat="anno in years" value="{{anno}}">
                                                {{anno}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-group col-md-12" data-ng-init="getConcerti()">
                                        <li class="list-group-item" data-ng-repeat="concerto in this.concerti|orderBy:'-data_inizio'">
                                            <span class="col-md-2">{{concerto.luogo_uscita}}</span>
                                            <span class="col-md-2">{{concerto.data_inizio | date:'dd-MM-yyyy'}} {{concerto.quandoDescrizione}}</span>
                                            <span class="col-md-5">{{concerto.dettagli_uscita}}</span>
                                            <a class="col-md-1" ng-href="{{concerto.indirizzoFileVolantini}}"><i class="fa fa-download"></i></a>
                                            <i class="col-md-1 fa fa-pencil cursor" data-ng-click="modificaConcerto(concerto)"></i>
                                            <i class="col-md-1 fa fa-trash cursor" data-ng-click="confirmDeleteConcerto(concerto)"></i>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalModConcerto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modifica concerto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Luogo</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" data-ng-model="selectedConcerto.luogo_uscita" placeholder="Luogo Uscita" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Data</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="dates" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Quando</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" data-ng-model="selectedConcerto.quandoDescrizione" placeholder="Orario concerto" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Dettagli</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" placeholder="Here can be your nice text" data-ng-model="selectedConcerto.dettagli_uscita" rows="5"></textarea>
                                    <!--<input type="text" class="form-control" data-ng-model="selectedConcerto.dettagli_uscita" placeholder="username" />-->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Locandina</label>
                                <div class="col-md-8">
                                    <input type="file" id="file2" name="file" onchange="angular.element(this).scope().getTheDoc(this.files)" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-ng-click="salvaConcerto(selectedConcerto)">Salva</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddConcerto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Aggiungi concerto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="api/Values/SaveConcerto.php" id="form_saveEvent" method="post" enctype="multipart/form-data" id="addConcertoButton">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Luogo</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" data-ng-model="newConcerto.luogo_uscita" placeholder="Luogo concerto" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Data</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="dates" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Quando</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" data-ng-model="newConcerto.quandoDescrizione" placeholder="Orario concerto" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Dettagli</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" placeholder="Dettagli uscita" data-ng-model="newConcerto.dettagli_uscita" rows="5"></textarea>
                                        <!--<input type="text" class="form-control" data-ng-model="newConcerto.dettagli_uscita" placeholder="username" />-->
                                    </div>
                                </div>
                                <!--<div class="form-group row">
                                    <label class="control-label col-md-4">Locandina</label>
                                    <div class="col-md-8">
                                        <input type="file" id="file3" name="file" multiple="multiple" onchange="angular.element(this).scope().getTheDoc(this.files)" class="form-control"/>
                                    </div>
                                </div>-->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-ng-click="salvaConcerto(newConcerto)">Salva</button>
                    <!--<button type="button"  class="btn btn-primary" data-dismiss="modal" >Salva</button>-->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalConfirmDeleteConcerto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Rimuovi concerto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            Confermi di voler cancellare il concerto?
                            <table class="table table-bordered">
                                <tr>
                                    <td>{{selectedConcerto.luogo_uscita}}</td>
                                    <td>{{selectedConcerto.data_inizio | date:'dd-MM-yyyy'}} {{selectedConcerto.quandoDescrizione}}</td>
                                    <td>{{selectedConcerto.dettagli_uscita}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-ng-click="deleteConcerto(selectedConcerto)">Confermo</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.datepicker').datepicker();
    $('#addConcertoButton').submit(function() {
        var form = $(this);
        $.ajax({
            url: form.attr("action"),
            type: form.attr("method"),
            xhrFields: {
                withCredentials: true
            },
            data: form.serialize()
        }).done(function() {
            showCurrentLocation();
            alert('Event created successfully..');
            location.reload();

        }).fail(function() {
            alert("fail!");
        });
        event.preventDefault();
    });
</script>

<style>
    .uib-year .btn-default {
        background-color: #ffa500a3;
        font-size: 10px
    }

    .uib-month .btn-default {
        background-color: #ffa500a3;
        font-size: 10px
    }

    .uib-day .btn-default {
        background-color: #ffa500a3;
        font-size: 10px
    }

    .uib-day .btn-default:hover {
        background-color: white;
        color: black;
        font-size: 10px
    }

    .uib-datepicker .uib-title {
        width: 100%;
        background-color: orange;
    }
</style>
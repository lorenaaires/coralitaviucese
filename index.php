<!DOCTYPE html>
<html lang="en" ng-app="my-app">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../css/now-ui-kit-v1.0.1/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Coralità Viucese</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="css/now-ui-kit-v1.0.1/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/now-ui-kit-v1.0.1/assets/css/now-ui-kit.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project 
    <link href="css/now-ui-kit-v1.0.1/assets/css/demo.css" rel="stylesheet" />-->

    <script src="Scripts/angular.min.js"></script>
    <script src="Scripts/angular-route.js"></script>
    <script src="Scripts/angular-resource.min.js"></script>
    <script src="Scripts/angular-storage.min.js"></script>
    <script src="Scripts/angular-animate.js"></script>
    <script src="Scripts/angular-sanitize.js"></script>
    <script src="Scripts/ui-bootstrap-tpls-2.5.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.8/angular-filter.min.js"></script>
    <script src="Scripts/angular-filter.js"></script>
    <script src="Scripts/controller/controller.js"></script>
    <script src="Scripts/controller/controller.concerti.js"></script>
    <script src="Scripts/controller/controller.contatti.js"></script>
    <script src="Scripts/controller/controller.home.js"></script>
    <script src="Scripts/controller/controller.manage.js"></script>
    <script src="Scripts/controller/controller.repertorio.js"></script>
    <script src="css/now-ui-kit-v1.0.1/assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./Scripts/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="./Scripts/daterangepicker/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="./Scripts/daterangepicker/daterangepicker.css" />
</head>

<body class="landing-page" data-ng-controller="MyController">
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-md bg-primary fixed-top navbar-transparent" color-on-scroll="500">
        <div class="container">
            <a class="navbar-brand cursor" style="color:white" data-ng-hide="connectedUser==null" data-ng-click="changePage('MANAGE')">
                <p><i class="fa fa-user-circle cursor"></i> <span class="cursor">&nbsp;&nbsp; &nbsp;
                        Benvenuto {{connectedUser.nickname}}</span></p>
            </a>
            <a class="navbar-brand cursor" style="color:white" data-ng-hide="connectedUser==null" data-ng-click="logout()">
                <span>
                    Logout <i class="fa fa-arrow-right"></i>
                </span>
            </a>
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="css/now-ui-kit-v1.0.1/assets/img/blurred-image-1.jpg">

                <ul class="navbar-nav" data-ng-init="changePage('HOME')">

                    <li class="nav-item " data-ng-repeat="pagina in arrayPages" data-ng-click="changePage(pagina)" data-ng-class="{'active':pageSelected==pagina}">
                        <a class="nav-link" href="#">{{pagina}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/Coralit%C3%A0-Viucese-109583518079/" target="_blank" data-original-title="Metti mi piace su Facebook">
                            <i class="fa fa-facebook-square"></i>
                            <p class="hidden-lg-up">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.youtube.com/user/CoralitaViucese" target="_blank" data-original-title="Seguici su youtube">
                            <i class="fa fa-youtube-square"></i>
                            <p class="hidden-lg-up">Youtube</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header page-header-small" data-ng-if="pageSelected!='MANAGE'">
            <div class="page-header-image" data-parallax="true" style="background-image: url('img/newPhoto/mini_magick20240826-24825-1xtwoby.jpg');">
            </div>
            <div class="container">
                <div class="content-center">
                    <!--<h1 class="title">Coralità Viucese</h1>-->
                </div>
            </div>
        </div>
        <div class="page-header page-header-small" data-ng-if="pageSelected=='MANAGE'" style="height: 80px;">
            <div class="page-header-image" data-parallax="true" style="background-color:#2a3b90">
            </div>
        </div>

        <div data-ng-if="pageSelected=='HOME'" ng-include="'Pages/home.html'"></div>
        <div data-ng-controller="MyController" data-ng-if="pageSelected=='LA STORIA'" ng-include="'Pages/storia.html'"></div>
        <div data-ng-if="pageSelected=='REPERTORIO'" ng-include="'Pages/repertorio.html'"></div>
        <div data-ng-if="pageSelected=='CONCERTI'" ng-include="'Pages/concerti.html'"></div>
        <div data-ng-if="pageSelected=='CONTATTI'" ng-include="'Pages/contatti.html'"></div>
        <div data-ng-controller="MyController" data-ng-if="pageSelected=='MEDIA'" ng-include="'Pages/foto.html'"></div>
        <div data-ng-controller="MyController" data-ng-if="pageSelected=='MANAGE'" ng-include="'Pages/manageContent.php'"></div>

        <footer class="footer footer-default">
            <span class="lock-hidden pull-left cursor" data-toggle="modal" data-target="#modalLogin">
                <i class="fa fa-lock cursor"></i></span>
            <div class="container">
                <div class="copyright">
                    &copy;

                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    Coralità Viucese

                </div>
            </div>
        </footer>
    </div>

    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label col-md-4">Username</label>
                                <div class="col-md-8">
                                    <input type="text" name="username" class="form-control" data-ng-model="tempUser.nickname" placeholder="username" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4">Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="password" class="form-control" data-ng-model="tempUser.password" placeholder="password" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-ng-click="login()">Login</button>
                </div>
            </div>
        </div>
</body>
<!--   Core JS Files   -->
<script src="css/now-ui-kit-v1.0.1/assets/js/core/tether.min.js" type="text/javascript"></script>
<script src="css/now-ui-kit-v1.0.1/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="css/now-ui-kit-v1.0.1/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="css/now-ui-kit-v1.0.1/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="css/now-ui-kit-v1.0.1/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="css/now-ui-kit-v1.0.1/assets/js/now-ui-kit.js" type="text/javascript"></script>
<script src="Scripts/angular-locale_it.js" type="text/javascript"></script>




</html>
<style>
    .lock-hidden {
        color: #f2f2f2;
        font-size: 20px;
        margin-left: 20px;
    }

    .lock-hidden :hover {
        color: #8c8c8c;
    }
</style>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Meals - Fitness tracker</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->createUrl("../css/fitnessmockup.css") ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body data-spy="scroll" data-target="#navpills1" ng-app="app" ng-controller="index">
        <header>
            <div id="top-nav">
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Fitness tracker</a>
                        </div>
                        
<!--                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <fb:login-button scope="public_profile,email" onlogin="checkLoginStatus();">
                                    </fb:login-button>
                                </li>
                            </ul>
                        </div>-->
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </header>
        
        <?php echo $content; ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.66.0-2013.10.09/jquery.blockUI.min.js"></script>

        <script type="text/javascript">
//            var basePath = '<?php echo Yii::app()->createUrl("/") ?>';
//            var user = null;
//            var access_token = null;
//            var $layoutScope = null;
            var app = angular.module('app', []).controller('index', function($scope) {
                $layoutScope = $scope;
            });
            
            function checkLoginStatus(){
                FB.getLoginStatus(function (response) {
                    if (response.status === 'connected') {
                        window.location.href = '<?php echo Yii::app()->createUrl("/")?>';
                    }
                });
            }

            window.fbAsyncInit = function() {
                FB.init({
                    appId : '1586199278268967',
                    xfbml : true,
                    version : 'v2.2'
                });
                checkLoginStatus();
            };
            ( function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                        return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
    </body>
</html>



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
                            <a class="navbar-brand" href="summary.php">Fitness tracker</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li id="summary-navb" <?php if ($this->active_tab == 0): ?> class="active" <?php endif ?>>
                                    <a href="<?php echo Yii::app()->createUrl("/") ?>">Summary</a>
                                </li>
                                <li id="meals-navb" <?php if ($this->active_tab == 1): ?> class="active" <?php endif ?>>
                                    <a href="<?php echo Yii::app()->createUrl("/meals") ?>">Meals</a>
                                </li>
                                <li id="exercises-navb" <?php if ($this->active_tab == 2): ?> class="active" <?php endif ?>>
                                    <a href="<?php echo Yii::app()->createUrl("/exercises") ?>">Exercises</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img ng-src="{{picture_src}}" style="width: 40px; height: 40px; margin: -10px 1px" class="img-rounded"> Welcome {{fb.first_name}}<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="#">Profile</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="cover.php">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
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

        <script type="text/javascript">
            var basePath = '<?php echo Yii::app()->createUrl("/") ?>';
            var user = null;
            var access_token = null;
            var $layoutScope = null;
            var app = angular.module('app', []).controller('index', function($scope) {
                $layoutScope = $scope;
            });
            
            function loadTemplate(){
                FB.getLoginStatus(function (response) {
                    if (response.status === 'connected') {
                        access_token = response.authResponse.accessToken;
                        FB.api('/me', function (response) {
                            user = response;
                            $layoutScope.fb = response;
                            $layoutScope.picture_src = 'http://graph.facebook.com/'+user.id+'/picture'
                            $layoutScope.$apply(function(){
                                loadPage();
                            });
                            console.log(response);
                        });
                    } else {
                        window.location.href = '<?php echo Yii::app()->createUrl("/login")?>';
                    }
                });
            }

            window.fbAsyncInit = function() {
                FB.init({
                    appId : '1586199278268967',
                    xfbml : true,
                    version : 'v2.2'
                });
                loadTemplate();
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

        <script src="<?php echo Yii::app()->createUrl("../js/$this->uniqueid.js") ?>"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
    </body>
</html>

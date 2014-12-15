var $pageScope = null;
var $pageHttp = null; 

app.controller('site', function ($scope, $http) {
    $pageScope = $scope;
    $pageHttp = $http;
    $.blockUI({ 
        css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        }});
});

function loadPage() {
    $pageHttp.get(basePath + '/site/getUserInfo/'+user.id+'?access_token='+access_token).success(function (data) {
        if(!data.new_user){
            $pageScope.user = data.user;
            $pageScope.user.id = user.id;
            $pageScope.user.first_name = user.first_name;
            $pageScope.user.last_name = user.last_name;
            $pageScope.meals = data.meals;
            $pageScope.exercises = data.exercises;
            $pageScope.cur_cal_intake = data.cur_cal_intake;
            $pageScope.cur_cal_spent = data.cur_cal_spent;
            $pageScope.avg_per_meal = parseInt(data.avg_per_meal);
            $pageScope.avg_consumed = parseInt(data.avg_consumed);
            $pageScope.avg_spent = parseInt(data.avg_spent);
            
            var width = ($pageScope.cur_cal_intake / $pageScope.user.cal_limit * 100);
            if (width < 75) {
                $pageScope.classMeal = "progress-bar-success";
            } else if (width >= 75 && width < 90) {
                $pageScope.classMeal = "progress-bar-warning";
            } else {
                $pageScope.classMeal = "progress-bar-danger";
            }
            width = ($pageScope.cur_cal_spent / $pageScope.user.exc_goal * 100);
            if (width < 10) {
                $pageScope.classExercise = "progress-bar-danger";
            } else if (width >= 10 && width < 50) {
                $pageScope.classExercise = "progress-bar-warning";
            } else {
                $pageScope.classExercise = "progress-bar-success";
            }
            
            $pageScope.bmi = function (){
                var n = parseInt($pageScope.user.weight)/(parseInt($pageScope.user.height)*parseInt($pageScope.user.height))*703;
                return n.toFixed(4);
            };
            $pageScope.height = function (){
                var feets = Math.floor(parseInt($pageScope.user.height)/12);
                var inches = parseInt($pageScope.user.height) - feets*12;
                return feets+'\' '+inches+"\"";
            };
        }else{
            window.location.href = basePath + '/profile/';
        }
        $.unblockUI();
    });
}



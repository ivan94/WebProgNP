var $pageScope = null;
var $pageHttp = null; 

app.controller('exercises', function ($scope, $http) {
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
    $pageHttp.get(basePath + '/exercises/getUserInfo/'+user.id+'?access_token='+access_token).success(function (data) {
        console.log(data);
        if(!data.new_user){
            $pageScope.cur_calories = data.cur_calories;
            $pageScope.exc_goal = data.exc_goal;
            $pageScope.exercises = data.exercises;
            var width = ($pageScope.cur_calories / $pageScope.exc_goal * 100);
            if (width < 10) {
                $pageScope.class = "progress-bar-danger";
            } else if (width >= 10 && width < 50) {
                $pageScope.class = "progress-bar-warning";
            } else {
                $pageScope.class = "progress-bar-success";
            }
            
            $pageScope.update_exercise = {
                time: "",
                exercise: "",
                calories: ""
            };
            $pageScope.save = function (){
                var pkg = {};
                angular.copy($pageScope.update_exercise,pkg);
                pkg.exercise_id = pkg.id;
                pkg.id = user.id;
                pkg.access_token = access_token;
                pkg.time = $("#datetimepicker1 input").val();
                $.post(basePath + '/exercises/save/', pkg, function (data){
                    $pageScope.response = data;
                    if(data.status == 'success'){
                        hideForm();
                        loadPage();
                    }
                    $pageScope.$apply();
                    $("button, a").prop("disabled",false);
                },'json');
                $("button, a").prop("disabled",true);
            }
//
            $pageScope.edit = function (row){
                $pageScope.update_exercise = angular.copy(row);
                showForm();
            }
            $pageScope.delete = function(row){
                $pageScope.deleteExercise = row;
                $("#deleteModal").modal();
            }
            $pageScope.confirmDeletion = function(exercise){
                $.post(basePath + '/exercises/delete/', {exercise_id:exercise.id, id:user.id, access_token: access_token}, function(data){
                    $pageScope.response = data;
                    if(data.status == 'success'){
                        loadPage();
                    }
                }, 'json');
            }
            $.unblockUI();
        }else{
            window.location.href = basePath + '/profile/';
        }
    });

    $("#cancelExerciseButton").click(function () {
        event.preventDefault();
        hideForm();
    });
    $("#newExerciseButton").click(function () {
        event.preventDefault();
        showForm();
    });
    $('#datetimepicker1').datetimepicker();
    
    function showForm(){
        event.preventDefault();
        $("#newExerciseFormHolder").show(300);
        $("#newExerciseButton").hide();
    }
    function hideForm(){
        $("#newExerciseFormHolder").hide(300, function () {
            $("#newExerciseButton").show();
        });
    }
}



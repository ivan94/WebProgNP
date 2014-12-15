var $pageScope = null;
var $pageHttp = null; 

app.controller('meals', function ($scope, $http) {
    $pageScope = $scope;
    $pageHttp = $http;
    $pageScope.loaded = false;
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
    $pageHttp.get(basePath + '/meals/getUserInfo/'+user.id+'?access_token='+access_token).success(function (data) {
        console.log(data);
        if(!data.new_user){
            $pageScope.cur_calories = data.cur_calories;
            $pageScope.max_calories = data.max_calories;
            $pageScope.meals = data.meals;
            $pageScope.friends = user_friends;
            var width = ($pageScope.cur_calories / $pageScope.max_calories * 100);
            if (width < 75) {
                $pageScope.class = "progress-bar-success";
            } else if (width >= 75 && width < 90) {
                $pageScope.class = "progress-bar-warning";
            } else {
                $pageScope.class = "progress-bar-danger";
            }
            $pageScope.save = function (){
                var pkg = {};
                angular.copy($pageScope.update_food,pkg);
                pkg.meal_id = pkg.id;
                pkg.id = user.id;
                pkg.access_token = access_token;
                pkg.date = $("#datetimepicker1 input").val();
                $.post(basePath + '/meals/save/', pkg, function (data){
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

            $pageScope.edit = function (row){
                $pageScope.update_food = angular.copy(row);
                for(i = 0; i<$pageScope.meal_types.length; i++){
                    if($pageScope.meal_types[i].id == row.meal_type){
                        $pageScope.update_food.meal_type = $pageScope.meal_types[i];
                    }
                }
                showForm();
            }
            $pageScope.delete = function(row){
                $pageScope.deleteFood = row;
                $("#deleteModal").modal();
            }
            $pageScope.confirmDeletion = function(food){
                $.post(basePath + '/meals/delete/', {meal_id:food.id, id:user.id, access_token: access_token}, function(data){
                    $pageScope.response = data;
                    if(data.status == 'success'){
                        loadPage();
                    }
                }, 'json');
            }
            $.unblockUI();
            $pageScope.loaded = true;
        }else{
            window.location.href = basePath + '/profile/';
        }
    });
    $pageHttp.get(basePath + '/meals/getMealTypes').success(function (data) {
        $pageScope.meal_types = data;
        $pageScope.update_food = {
            date: "",
            names: "",
            calories: ""
        };
        $pageScope.update_food.meal_type = data[0];
        //$("#mealTypeSelector").chosen()
    });

    $("#cancelMealButton").click(function () {
        event.preventDefault();
        hideForm();
    });
    $("#newMealButton").click(function () {
        event.preventDefault();
        showForm();
    });
    $('#datetimepicker1').datetimepicker();
    
    function showForm(){
        event.preventDefault();
        $("#newMealFormHolder").show(300);
        $("#newMealButton").hide();
    }
    function hideForm(){
        $("#newMealFormHolder").hide(300, function () {
            $("#newMealButton").show();
        });
    }
}



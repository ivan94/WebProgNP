var $pageScope = null;
var $pageHttp = null;
app.controller('meals', function ($scope, $http) {
    $pageScope = $scope;
    $pageHttp = $http;
});

function loadPage() {
    $pageHttp.get(basePath + '/meals/getUserInfo/'+user.id+'?access_token='+access_token).success(function (data) {
        console.log(data);
        $pageScope.id = data.id;
        $pageScope.cur_calories = data.cur_calories;
        $pageScope.max_calories = data.max_calories;
        $pageScope.meals = data.meals;
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
            $.post(basePath + '/meals/saveMeal/', pkg, function (data){
                $pageScope.resp = data;
                hideForm();
                $pageScope.$apply();
            });
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
    });
    $pageHttp.get(basePath + '/meals/getMealTypes').success(function (data) {
        $pageScope.meal_types = data;
        $pageScope.update_food = {};
        $pageScope.update_food.meal_type = data[0];
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
        $("#newMealFormHolder").slideDown(500);
        $("#newMealButton").hide();
    }
    function hideForm(){
        $("#newMealFormHolder").slideUp(500, function () {
            $("#newMealButton").show();
        });
    }
}



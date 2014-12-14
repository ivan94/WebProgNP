var $pageScope = null;
var $pageHttp = null;

app.controller('profile', function ($scope, $http) {
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
    $pageHttp.get(basePath + '/profile/getUserInfo/'+user.id+'?access_token='+access_token).success(function (data) {
        if(data.new_user){
            $pageScope.user = {height: {}};
        }else{
            $pageScope.user = data.user;
            var height = {};
            height.feets = Math.floor(data.user.height/12.0);
            height.inches = data.user.height - height.feets*12;
            $pageScope.user.height = height;
        }
        $pageScope.user.bmi = function () {
            return lbsToKg($pageScope.user.weight) / (feetInchToMeter($pageScope.user.height.feets, $pageScope.user.height.inches) * feetInchToMeter($pageScope.user.height.feets, $pageScope.user.height.inches));
        }
        $pageScope.user.bmr = function () {
            if ($pageScope.user.gender == 'm') {
                return Math.round(10 * lbsToKg($pageScope.user.weight) + 6.25 * 100 * feetInchToMeter($pageScope.user.height.feets, $pageScope.user.height.inches) - 5 * $pageScope.user.age + 5);
            } else {
                return Math.round(10 * lbsToKg($pageScope.user.weight) + 6.25 * 100 * feetInchToMeter($pageScope.user.height.feets, $pageScope.user.height.inches) - 5 * $pageScope.user.age - 161);
            }
        }
        $pageScope.user.tdee = function () {
            return Math.round($pageScope.user.activity_level * $pageScope.user.bmr());
        }
        $pageScope.user.dci = function () {
            if ($pageScope.user.diet_goal == 1) {
                return Math.round($pageScope.user.tdee() * 0.8);
            } else if ($pageScope.user.diet_goal == 2) {
                return $pageScope.user.tdee();
            } else {
                return Math.round($pageScope.user.tdee() * 1.2);
            }
        }
        $pageScope.save = function (){
            var pkg = {};
            angular.copy($pageScope.user,pkg);
            pkg.new_user = pkg.id == null?1:0;
            pkg.height = $pageScope.user.height.feets*12+$pageScope.user.height.inches;
            pkg.id = user.id;
            pkg.access_token = access_token;
            pkg.cal_limit = $pageScope.user.dci();
            $.post(basePath + '/profile/save/', pkg, function (data){
                $pageScope.response = data;
                if(data.status == 'success'){
                    loadPage();
                }
                $pageScope.$apply();
            },'json');
        }
        $.unblockUI();
    });
}

function lbsToKg(lbs) {
    return lbs / 2.2;
}
function feetInchToMeter(feets, inches) {
    inches += 12 * feets;
    return (2.54 * inches) / 100.0;
}



<div class="container" ng-app="app" ng-controller='index'>
	<div class="page-header">
		<h1>Meals</h1>
	</div>
	<h2>Daily limit
	<br>
	<small>How much of your daily limit you already completed</small></h2>
	<div class="progress">
		<div class="progress-bar {{class}}" role="progressbar" ng-style="{ width: (cur_calories / max_calories * 100) + '%' }">
			{{cur_calories}} cal (of {{max_calories}})
		</div>
	</div>

	<a id="newMealButton" class="btn btn-success" href="?action=create"> <i class="glyphicon glyphicon-plus"></i> Add </a>

	<div id="newMealFormHolder" style="display: none;">

	</div>

	<h2>Recent activity
	<br>
	<small>Your activity history in a week</small></h2>
	<div ng-repeat='meal in meals'>
		<h4>{{meal.type}}</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Date</th>
					<th>Foods</th>
					<th>Total calories</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="row in meal.foods">
					<input type="hidden" name="id" value="{{row.id}}" />
					<td>{{row.date}}</td>
					<td>{{row.names}}</td>
					<td>{{row.calories}}</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	var app = angular.module('app', []).controller('index', function($scope, $http) {
		$http.get('?format=json&userId=').success(function(data) {
			$scope.id = data.id;
			$scope.cur_calories = data.cur_calories;
			$scope.max_calories = data.max_calories;
			$scope.meals = data.meals;
			var width = ($scope.cur_calories / $scope.max_calories * 100)
			if (width < 75) {
				$scope.class = "progress-bar-success";
			} else if (width >= 75 && width < 90) {
				$scope.class = "progress-bar-warning";
			} else {
				$scope.class = "progress-bar-danger";
			}
		});

		$('body').on('click', '.edit_meal', function(event) {

		});
	}); 
</script>

<script type="text/javascript">
	$("#newMealButton").click(function() {
		event.preventDefault();
		$("#newMealFormHolder").load("", {
			action : "create",
			format : "plain"
		}, function() {
			$(this).slideDown(500);
			$("#newMealButton").hide();
		});
	}); 
</script>
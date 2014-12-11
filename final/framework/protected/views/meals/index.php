<div class="container" ng-controller='meals'>
    <div class="page-header">
        <h1>Meals</h1>
    </div>
    <h2>Daily limit
        <br>
        <small>How much of your daily limit you already completed</small>
    </h2>
    <div class="progress">
        <div class="progress-bar {{class}}" role="progressbar" ng-style="{ width: (cur_calories / max_calories * 100) + '%' }">
            {{cur_calories}} cal (of {{max_calories}})
        </div>
    </div>

    <a id="newMealButton" class="btn btn-success" href="?action=create"> <i class="glyphicon glyphicon-plus"></i> Add </a>

    <div id="newMealFormHolder" style="display: none;">
        <form class="form-inline">
            <input type="hidden" name="id" ng-model="update_food.id">
            <div class="form-group">
                <label class="sr-only" for="exerciseSelect">Exercise</label>
                <select ng-model="update_food.meal_type" ng-options="type.name for type in meal_types" class="form-control" name="meal_type">
                </select>
            </div>
            <div class="form-group">
                <label class="sr-only" for="foodInput">Food</label>
                <input type="text" class="form-control" id="foodInput" placeholder="Food" ng-model="update_food.names">
            </div>
            <div class="form-group">
                <label class="sr-only" for="caloriesInput">Calories</label>
                <input type="text" class="form-control" id="caloriesInput" placeholder="Calories" ng-model="update_food.calories">
            </div>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" ng-model="update_food.date"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success" ng-click="save()">Enter</button>
                <button id="cancelMealButton" class="btn btn-danger"></i> Cancel </button>
            </div>
            <br>
        </form>
    </div>
    <br>
    <pre>{{resp}}</pre>
    <h2>Recent activity
        <br>
        <small>Your activity history in the last 3 days</small>
    </h2>
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
                    <td>
                        <a ng-click="edit(row)" title="Edit" class="btn btn-default btn-sm toggle-modal">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

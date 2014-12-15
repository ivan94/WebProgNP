<div class="container" ng-controller="site" ng-show="loaded" >
    <div class="row">
        <div class="col-sm-9">
            <div class="page-header" style="margin-top: 20px">
                <h1>Summary</h1>
            </div>
            <div>
                <h2>Daily consume limit
                    <br>
                    <small>How much of your daily calories you consumed today</small></h2>
                <div class="progress">
                    <div class="progress-bar progress-bar {{classMeal}}" role="progressbar" ng-style="{ width: (cur_cal_intake / user.cal_limit * 100) + '%' }">
                        {{cur_cal_intake}} cal (of {{user.cal_limit}})
                    </div>
                </div>
            </div>
            <div>
                <h2>Daily exercise goal
                    <br>
                    <small>How much of your daily exercise goal you already completed</small></h2>
                <div class="progress">
                    <div class="progress-bar progress-bar-success {{classExercise}}" role="progressbar" ng-style="{ width: (cur_cal_spent / user.exc_goal * 100) + '%' }">
                        {{cur_cal_spent}} cal (of {{user.exc_goal}})
                    </div>
                </div>
            </div>

            <h2>Daily averages</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default" style="text-align: center">
                        <div class="panel-heading">
                            <h3 class="panel-title">Calories consumed</h3>
                        </div>
                        <div class="panel-body">
                            <h1>{{avg_consumed}} cal</h1>
                            <p>
                                Consumed on your meals
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default" style="text-align: center">
                        <div class="panel-heading">
                            <h3 class="panel-title">Calories spent</h3>
                        </div>
                        <div class="panel-body">
                            <h1>{{avg_spent}} cal</h1>
                            <p>
                                Spent with exercises
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default" style="text-align: center">
                        <div class="panel-heading">
                            <h3 class="panel-title">Consumed per meal</h3>
                        </div>
                        <div class="panel-body">
                            <h1>{{avg_per_meal}} cal</h1>
                            <p>
                                Consumed per meal
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active">
                        <a href="#meals" role="tab" data-toggle="tab">Meals</a>
                    </li>
                    <li>
                        <a href="#exercises" role="tab" data-toggle="tab">Exercises</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="meals">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Date</th>
                                    <th style="width: 18%">Meal</th>
                                    <th>Foods</th>
                                    <th style="width: 15%">Total calories</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="meal in meals">
                                    <td>{{meal.time}}</td>
                                    <td>{{meal.meal_type}}</td>
                                    <td>{{meal.food}}</td>
                                    <td>{{meal.calories}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade in" id="exercises">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Date</th>
                                    <th>Exercise</th>
                                    <th style="width: 15%">Calories spent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="exercise in exercises">
                                    <td>{{exercise.time}}</td>
                                    <td>{{exercise.exercise}}</td>
                                    <td>{{exercise.calories}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body" style="padding: 4px">
                    <img ng-src="http://graph.facebook.com/{{user.id}}/picture?height=340&width=340" style="width: 100%;" class="img-rounded">
                </div>
                <div class="panel-footer" style="padding: 4px">
                    <h3>Welcome {{user.first_name}}</h3>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Your profile:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 45%"><strong>Age</strong></td>
                            <td>{{user.age}}</td>
                        </tr>
                        <tr>
                            <td><strong>Height</strong></td>
                            <td>{{height()}}</td>
                        </tr>
                        <tr>
                            <td><strong>Weight</strong></td>
                            <td>{{user.weight}} lbs</td>
                        </tr>
                        <tr>
                            <td><strong>BMI</strong></td>
                            <td>{{bmi()}}</td>
                        </tr>
                        <tr>
                            <td><strong>Daily calorie limit</strong></td>
                            <td>{{user.cal_limit}} cal</td>
                        </tr>
                        <tr>
                            <td><strong>Daily exercise goal</strong></td>
                            <td>{{user.exc_goal}} cal</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


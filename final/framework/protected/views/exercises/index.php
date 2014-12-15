<div class="container" ng-controller='exercises' ng-show="loaded" >
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete {{deleteExercise.exercise}} from {{deleteExercise.time}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="confirmDeletion(deleteExercise)">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-header" style="margin-top: 20px">
        <h1>Exercies</h1>
    </div>
    <h2>Daily Goal
        <br>
        <small>How much of your daily goal you already burned today</small>
    </h2>
    <div class="progress">
        <div class="progress-bar {{class}}" role="progressbar" ng-style="{ width: (cur_calories / exc_goal * 100) + '%' }">
            {{cur_calories}} cal (of {{exc_goal}})
        </div>
    </div>
    
    <a id="newExerciseButton" class="btn btn-success" href="?action=create"> <i class="glyphicon glyphicon-plus"></i> Add </a>
    <br>
    <div id="newExerciseFormHolder" style="display: none;" class="panel panel-default">
        <div class="panel-body">
            <form class="form-inline">
                <div class="alert alert-danger" ng-show="response.status == 'fail'">
                    <ul>
                        <li ng-repeat="(field, error) in response.errors">{{error[0]}}</li>
                    </ul>
                </div>
                <input type="hidden" name="id" ng-model="update_exercise.id">
                <h2 ng-show="update_exercise.id == null">New exercise</h2>
                <h2 ng-show="update_exercise.id != null">Edit exercise</h2>
                <p>Please, enter your exercise information</p>
                <div class="form-group" ng-class="response.errors.exercise != null?'has-error':''">
                    <label class="sr-only" for="exerciseInput">Exercise</label>
                    <input type="text" class="form-control" id="exerciseInput" placeholder="Exercise" ng-model="update_exercise.exercise">
                </div>
                <div class="form-group" ng-class="response.errors.calories != null?'has-error':''">
                    <label class="sr-only" for="caloriesInput">Calories</label>
                    <input type="text" class="form-control" id="caloriesInput" placeholder="Calories" ng-model="update_exercise.calories">
                </div>
                <div class="form-group" ng-class="response.errors.time != null?'has-error':''">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" ng-model="update_exercise.time" placeholder="Time"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group pull-right">
                    <button id="submitExerciseButton" type="submit" class="btn btn-success" ng-click="save()">Enter</button>
                    <button id="cancelExerciseButton" class="btn btn-danger"></i> Cancel </button>
                </div>
                <br>
            </form>
        </div>
    </div>
    
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Recent activity
                <br>
                <small>Your last 20 exercises. <a href="<?php echo Yii::app()->createUrl("/") ?>">See all</a></small></h2>
        </div>
        <div class="panel-body">
            <div class="alert alert-success" ng-show="response.status == 'success'">
                <button type="button" class="close" ng-click="response = null"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                {{response.message}}
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Exercises</th>
                        <th>Calories spent</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="row in exercises">
                        <input type="hidden" name="id" value="{{row.id}}" />
                        <td style="width: 20%">{{row.time}}</td>
                        <td>{{row.exercise}}</td>
                        <td style="width: 20%">{{row.calories}} cal</td>
                        <td style="width: 10%">
                            <div class="btn-group" role="group" aria-label="...">
                                <button ng-click="edit(row)" title="Edit" class="btn btn-default btn-sm toggle-modal">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </button>
                                <button ng-click="delete(row)" title="Edit" class="btn btn-default btn-sm toggle-modal">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

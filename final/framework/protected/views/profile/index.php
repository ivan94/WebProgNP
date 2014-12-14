<div class="container" ng-controller="profile">
    <h1>Your profile<br><small>Please, enter or update your body information.</small></h1>
    <div class="alert alert-success" ng-show="response.status == 'success'">
        <button type="button" class="close" ng-click="response = null"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        {{response.message}}
    </div>
    <div class="alert alert-danger" ng-show="response.status == 'fail'">
        <ul>
            <li ng-repeat="(field, error) in response.errors">{{error[0]}}</li>
        </ul>
    </div>
    <div class="col-md-6">
        <form>
            <div class="form-group">
                <label for="genderSelect">Gender</label>
                <select id="genderSelect" class="form-control" ng-model="user.gender">
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ageInput">Age</label>
                <input id="ageInput" type="number" class="form-control" placeholder="Enter your age" ng-model="user.age">
            </div>
            <div class="form-group">
                <label for="heightInput">Height</label>
                <input id="heightInput" type="number" class="form-control" placeholder="Feets" ng-model="user.height.feets">
                <input type="number" class="form-control" placeholder="Inches" ng-model="user.height.inches">
            </div>
            <div class="form-group">
                <label for="weigthInput">Weight</label>
                <input id="weigthInput" type="number" class="form-control" placeholder="Lbs" ng-model="user.weight">
            </div>
            <div class="form-group">
                <label for="bmiInput">Body Mass Index</label>
                <input id="bmiInput" type="number" class="form-control" placeholder="BMI" value="{{user.bmi()}}" disabled="true">
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form>
            <div class="form-group">
                <label for="bmrInput">Basal Metabolic Rate</label>
                <input id="bmrInput" type="number" class="form-control" placeholder="BMR" value="{{user.bmr()}}" disabled="true">
            </div>
            <div class="form-group">
                <label for="dgoalSelect">Diet goal</label>
                <select id="dgoalSelect" class="form-control" ng-model="user.diet_goal">
                    <option value="1">Lose Weight</option>
                    <option value="2">Maintain my Weight</option>
                    <option value="3">Gain Weight</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alevelSelect">Activity level</label>
                <select id="alevelSelect" class="form-control" ng-model="user.activity_level">
                    <option value="1.2">Sedentary (little or no exercise)</option>
                    <option value="1.375">Lightly Active (light exercise/sports 1-3 days/wk)</option>
                    <option value="1.550">Moderately Active (moderate exercise/sports 3-5 days/wk)</option>
                    <option value="1.725">Very Active (hard exercise/sports 6-7 days/wk)</option>
                    <option value="1.9">Extra Active (physical job or 2X day training)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tdeeInput">Total Daily Energy Expenditure</label>
                <input id="tdeeInput" type="number" class="form-control" placeholder="TDEE" value="{{user.tdee()}}" disabled="true">
            </div>
            <div class="form-group">
                <label for="dciInput">Recommended Daily Calorie Intake</label>
                <input id="dciInput" type="number" class="form-control" placeholder="DCI" value="{{user.dci()}}" disabled="true">
            </div>
            <div class="form-group">
                <label for="dciInput">Calorie burn goal</label>
                <input id="dciInput" type="number" class="form-control" placeholder="Exercise goal" ng-model="user.exc_goal">
            </div>
            <button type="submit" class="btn btn-success pull-right" ng-click="save()">Save changes</button>
        </form>
    </div>
</div>


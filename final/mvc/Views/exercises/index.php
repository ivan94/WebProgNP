<div class="container">
	<div class="tab-content">
		<div class="col-lg-3">
			<div id="navpills1" class="visible-lg-block" data-spy="affix" data-offset-top="52">
				<ul class="nav nav-pills nav-stacked">
					<li class="active">
						<a href="#dailygoal">Daily goal</a>
					</li>
					<li>
						<a href="#new">New exercise</a>
					</li>
					<li>
						<a href="#walk">Walking</a>
					</li>
					<li>
						<a href="#run">Running</a>
					</li>
					<li>
						<a href="#cycle">Cycling</a>
					</li>
					<li>
						<a href="#swim">Swimming</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-lg-9">
			<div class="page-header">
				<h1>Exercises</h1>
			</div>
			<h2 id="dailygoal">Daily goal
			<br>
			<small>How much of your daily goal you already completed</small></h2>
			<div class="progress">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="303" aria-valuemin="0" aria-valuemax="410" style="width: 0%;">
					303 cal (of 410)
				</div>
			</div>
			<h2 id="new">Enter a new exercise information
			<br>
			<small> Enter the information about the activity </small></h2>
			<div id="formAlert" class="alert alert-danger collapse in">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">x</span><span class="sr-only">Close</span>
				</button>
				<h4>Oh no!</h4>
				<p>
					Looks like this is only a mockup screen, so the form will not work properly!
				</p>
				<p>
					<button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#formAlert">
						Understood
					</button>
				</p>
			</div>
			<form id="newExerciseForm" class="form-inline">
				<div class="form-group">
					<label class="sr-only" for="exerciseSelect">Exercise</label>
					<select class="form-control" id="exerciseSelect">
						<option>Walking</option>
						<option>Running</option>
						<option>Cycling</option>
						<option>Swimming</option>
					</select>
				</div>
				<div class="form-group">
					<label class="sr-only" for="timeInput">Time</label>
					<input type="time" class="form-control" id="timeInput" placeholder="hh:mm" data-toggle="tooltip" data-placement="top" title="Time spent on the exercise">
				</div>
				<div class="form-group">
					<label class="sr-only" for="distanceInput">Distance</label>
					<input type="text" class="form-control" id="distanceInput" placeholder="Distance" data-toggle="tooltip" data-placement="top" title="Distance in miles">
				</div>
				<div class="form-group">
					<label class="sr-only" for="caloriesInput">Calories</label>
					<input type="text" class="form-control" id="caloriesInput" placeholder="Calories" data-toggle="tooltip" data-placement="top" title="Calories spent on the exercise">
				</div>

				<button type="submit" class="btn btn-default pull-right">
					Enter
				</button>
				<p class="help-block">
					Enter at least one of the fields. The system will estimate the other ones
				</p>
			</form>

			<h2 id="recent">Recent activity
			<br>
			<small>Your activity history in a week</small></h2>
			<h4 id="walk">Walking</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Date</th>
						<th>Time spent</th>
						<th>Distance</th>
						<th>Calories burned</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
				</tbody>
			</table>
			<h4 id="run">Running</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Date</th>
						<th>Time spent</th>
						<th>Distance</th>
						<th>Calories burned</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
				</tbody>
			</table>
			<h4 id="cycle">Cycling</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Date</th>
						<th>Time spent</th>
						<th>Distance</th>
						<th>Calories burned</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
				</tbody>
			</table>
			<h4 id="swim">Swiming</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Date</th>
						<th>Time spent</th>
						<th>Distance</th>
						<th>Calories burned</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
					<tr>
						<td>Today - 8:30PM</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 6:30PM</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
					<tr>
						<td>09/06/14 - 7:22PM</td>
						<td>00:45</td>
						<td>2.1 miles</td>
						<td>172 cal</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
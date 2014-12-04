<div class="container">
	<div class="page-header">
		<h1>Summary</h1>
	</div>
	<p>
		Hello Ivan, here is a summary of your meals and exercises
	</p>
	<div class="row">
		<div class="col-md-6">
			<h2>Daily consume limit
			<br>
			<small>How much of your daily calories you consumed today</small></h2>
			<div class="progress">
				<div class="progress-bar progress-bar" role="progressbar" aria-valuenow="1600" aria-valuemin="0" aria-valuemax="2000" style="width: 0%;">
					1600 cal (of 2000)
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h2>Daily exercise goal
			<br>
			<small>How much of your daily exercise goal you already completed</small></h2>
			<div class="progress">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="303" aria-valuemin="0" aria-valuemax="410" style="width: 0%;">
					303 cal (of 410)
				</div>
			</div>
		</div>
	</div>
	<h2>Daily averages</h2>
	<div class="row averages">
		<div class="col-md-3">
			<div class="panel panel-default" style="text-align: center">
				<div class="panel-heading">
					<h3 class="panel-title">Calories consumed</h3>
				</div>
				<div class="panel-body">
					<h1>1760 cal</h1>
					<p>
						Consumed on your meals
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default" style="text-align: center">
				<div class="panel-heading">
					<h3 class="panel-title">Calories spent</h3>
				</div>
				<div class="panel-body">
					<h1>515 cal</h1>
					<p>
						Spent with exercises
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default" style="text-align: center">
				<div class="panel-heading">
					<h3 class="panel-title">Consumed per meal</h3>
				</div>
				<div class="panel-body">
					<h1>679 cal</h1>
					<p>
						Consumed per meal
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default" style="text-align: center">
				<div class="panel-heading">
					<h3 class="panel-title">Time on exercises</h3>
				</div>
				<div class="panel-body">
					<h1>1:12</h1>
					<p>
						Hours spent with exercises
					</p>
				</div>
			</div>
		</div>
	</div>

	<h2>Daily tracker</h2>
	<p>
		Select a date to see the meals and exercies of that date
	</p>
	<form class="form-inline">
		<div class="form-group">
			<label class="sr-only" for="dateTracker">Date to track</label>
			<input id="dateTracker" type="date" class="form-control" placeholder="mm/dd/yy" style="width: 300px" />
		</div>
	</form>

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
			<h3>Meals</h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Date</th>
						<th>Meal</th>
						<th>Foods</th>
						<th>Total calories</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Today - 8:30PM</td>
						<td>Dinner</td>
						<td>Cheese Burguer, French Fries</td>
						<td>637 cal</td>
					</tr>
					<tr>
						<td>09/08/14 - 1:30PM</td>
						<td>Lunch</td>
						<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
						<td>518 cal</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="tab-pane fade" id="exercises">
			<h3>Exercises</h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Date</th>
						<th>Exercise</th>
						<th>Time spent</th>
						<th>Distance</th>
						<th>Calories burned</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Today - 8:30PM</td>
						<td>Swimming</td>
						<td>00:30</td>
						<td>1.3 miles</td>
						<td>100 cal</td>
					</tr>
					<tr>
						<td>Today - 6:30AM</td>
						<td>Running</td>
						<td>01:13</td>
						<td>3 miles</td>
						<td>209 cal</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
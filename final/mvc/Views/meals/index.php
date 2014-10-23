<div class="container">
	<div class="page-header">
		<h1>Meals</h1>
	</div>
	<h2>Daily limit
	<br>
	<small>How much of your daily limit you already completed</small></h2>
	<div class="progress">
		<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="1800" aria-valuemin="0" aria-valuemax="2000" style="width: 90%;">
			1800 cal (of 2000)
		</div>
	</div>
	<h2>New meal</h2>
	<form class="form-inline">
		<div class="form-group">
			<label class="sr-only" for="exerciseSelect">Exercise</label>
			<select class="form-control" id="exerciseSelect">
				<option>Breakfast</option>
				<option>Lunch</option>
				<option>Dinner</option>
				<option>Snacks</option>
			</select>
		</div>
		<div class="form-group">
			<label class="sr-only" for="foodInput">Food</label>
			<input type="text" class="form-control" id="foodInput" placeholder="Food">
		</div>
		<div class="form-group">
			<label class="sr-only" for="quantityInput">Quantity</label>
			<input type="text" class="form-control" id="quantityInput" placeholder="Quantity">
		</div>
		<div class="form-group">
			<label class="sr-only" for="caloriesInput">Calories</label>
			<input type="text" class="form-control" id="caloriesInput" placeholder="Calories">
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox">
				Save meal </label>
		</div>

		<button type="submit" class="btn btn-default pull-right" id="submitNewMeal">
			Enter
		</button>
		<br>
	</form>
	<button class="btn btn-default" id="addFields">
		+
	</button>
	<h2>Saved meals</h2>
	<form class="form-inline">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Meal</th>
					<th>Food</th>
					<th>Calories</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Dinner</td>
					<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
					<td>518 cal</td>
					<td>
					<input type="radio" name="optionsMeal" id="optionsMeal1" value="0">
					</td>
				</tr>
				<tr>
					<td>Dinner</td>
					<td>Cheese Burguer, French Fries</td>
					<td>637 cal</td>
					<td>
					<input type="radio" name="optionsMeal" id="optionsMeal2" value="1">
					</td>
				</tr>
			</tbody>
		</table>
		<button type="submit" class="btn btn-default">
			Enter
		</button>
	</form>

	<h2>Recent activity
	<br>
	<small>Your activity history in a week</small></h2>
	<h4>Breakfast</h4>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Foods</th>
				<th>Total calories</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
		</tbody>
	</table>
	<h4>Lunch</h4>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Foods</th>
				<th>Total calories</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
		</tbody>
	</table>
	<h4>Dinner</h4>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Foods</th>
				<th>Total calories</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
		</tbody>
	</table>
	<h4>Snacks</h4>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Date</th>
				<th>Foods</th>
				<th>Total calories</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
			<tr>
				<td>Today - 8:30PM</td>
				<td>Cheese Burguer, French Fries</td>
				<td>637 cal</td>
			</tr>
			<tr>
				<td>09/08/14 - 6:30PM</td>
				<td>Rice, Beans, Chicken, Mashed Potatoes, Broccoli</td>
				<td>518 cal</td>
			</tr>
		</tbody>
	</table>
</div>
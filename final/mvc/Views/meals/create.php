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
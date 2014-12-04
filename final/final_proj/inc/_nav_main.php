<nav class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="summary.php">Fitness tracker</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li id="summary-navb" <?php if ($active_tab == 0): ?> class="active" <?php endif ?>>
					<a href="summary.php">Summary</a>
				</li>
				<li id="meals-navb" <?php if ($active_tab == 1): ?> class="active" <?php endif ?>>
					<a href="meals.php">Meals</a>
				</li>
				<li id="exercises-navb" <?php if ($active_tab == 2): ?> class="active" <?php endif ?>>
					<a href="exercises.php">Exercises</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome Ivan <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="#">Profile</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="cover.php">Logout</a>
						</li>
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
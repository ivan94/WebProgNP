<nav class="navbar navbar-inverse no-margin" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="cover.php">Fitness tracker</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#" data-toggle="modal" data-target="#myModal">Log-in</a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Log in</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form class="form-horizontal">
						<div class="form-group">
							<label for="loginEmailInput" class="col-sm-2 control-label">E-mail</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="loginEmailInput" placeholder="your@email.com" />
							</div>
						</div>
						<div class="form-group">
							<label for="loginPassInput" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="loginPassInput" />
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<a class="btn btn-primary" href="summary.php"> Login </a>
			</div>
		</div>
	</div>
</div>
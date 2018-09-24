<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Stock Trading Management System</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<form method="POST" action="/login">
								{!! csrf_field() !!}

								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">ManagerID</label>
									<input type="Managerid" class="form-control" id="managerid" placeholder="Manager ID" name="managerid" minlength="5" maxlength="20" required>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="password"  placeholder="Password" name="password" minlength="6" maxlength="20" required>
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								@if (!empty($errors))
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">{{$errors}}</a></span>
								</div>
								@endif
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay" img src="img/login-bg.jpg"></div>
						<div class="content text">
							<h1 class="heading">Stock Trading Management System</h1>
							<p>Developed by GROUP.5</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>

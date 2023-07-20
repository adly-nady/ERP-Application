@if (Auth::check())    
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function () {
		window.location='/egyption_swiss#';
	});
</script>

@else
<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Egyptian Swiss</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="./public/vendors/images/deskapp-logo.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./public/vendors/images/deskapp-logo.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./public/vendors/images/deskapp-logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./public/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="./public/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="./public/vendors/styles/style.css">
	<style>
		.logo_text{
			font-size: -webkit-xxx-large;
			color: #990505;
			font-family: fantasy;
			font-kerning: auto;
			font-style: italic;
		}
	</style>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<img src="public/src/images/ERP_Nova_System2.png" style="height:70px;" alt="" class="light-logo">
			</div>
		</div>
	</div>
	<div class="flex-wrap login-wrap d-flex align-items-center justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="public/vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="bg-white login-box box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To <span style="color: #990505"> ERB Nova System </span> </h2>
						</div>
						<form method="post" action="{{ route('enter_page') }}">
                            @csrf
							@if(session()->get('error_login_') == 'false')
							<div class="input-group custom">
								<input type="text" 
								class="form-control form-control-lg email"
								name="email"
								style="border:1px solid red;"
								placeholder="User name">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							@else
							<div class="input-group custom">
								<input type="text" 
								class="form-control form-control-lg email"
								name="email"
								placeholder="User name">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							@endif
							
							@if(session()->get('error_login_') == 'false')
							<div class="input-group custom">
								<input type="password" style="border:1px solid red;" class="form-control form-control-lg pass" name="pass" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							@else
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg pass" name="pass" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							@endif
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="mb-0 input-group">

											<input type="submit" class="btn btn-primary btn-lg btn-block login_btn" value="Sign In">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@endif
<!--
{{--

	@if (Auth::guard('users')->check()||Auth::guard('admins')->check()||Auth::guard('top_admins')->check())
	<script>window.location='/egyptian_swiss/welcome';</script>
					<img src="public/src/images/Screenshot 2021-05-30 113404.png" style="height:100%;background-color:gray" alt="">
	
	@else
    --}}
-->
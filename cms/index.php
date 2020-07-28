<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$title = "Login || " . SITE_TITLE;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php echo $title; ?>
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<!--<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>-->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS; ?>/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS; ?>/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS; ?>/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS; ?>/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS; ?>/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS; ?>/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS; ?>/main.css">
	<!--===============================================================================================-->
	<!-- Font awesom -->
	<script src="https://kit.fontawesome.com/98c3d96e17.js"></script>
	<link rel='shortcut icon' href='<?php echo ADMIN_IMG.'/icon/lg.ico'; ?>' type='image/x-icon' />
</head>

<body>
	<?php
	if (isset($_SESSION, $_SESSION['Token']) && !empty($_SESSION['Token'])) {
		redirect(ADMIN_RENDER . '/redirect/redirect.php');
	}
	if (isset($_COOKIE, $_COOKIE['_ua']) && !empty($_COOKIE['_ua'])) {
		redirect(ADMIN_RENDER . '/redirect/redirect.php');
	} 
	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo ADMIN_IMG.'/icon/lg.png' ?>" width="70%" style="margin-left:5%;">
				</div>
				<form class="login100-form validate-form" action="<?php echo ADMIN_RENDER .'/login/login.php'?>" method='post'>
					<!--class="login100-form validate-form"-->
					<span class="login100-form-title form-group">
						Login
					</span>
					<?php flash(); ?>
					<div class="form-group">
						<select name="Role" id="Role" class="input100" aria-hidden="true">
							<option value="SuperAdmin">Super Admin</option>
							<option value="Admin">Admin</option>
							<option value="Assistant">Assistant</option>
						</select>

					</div>
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<input class="input100" type="text" name="Username" placeholder="User Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-tie" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="Passwd" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="text-center p-t-12">
						<label class="checkbox">
							<input type="checkbox" name="remember"><i></i> Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center p-t-12">
						<span class="txt1">
							Go
						</span>
						<a class="txt2" href="<?php echo SITE_URL;?>">
							Back ?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>



	<!--===============================================================================================-->
	<script src="<?php echo ADMIN_JS; ?>/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo ADMIN_JS; ?>/popper.min.js"></script>
	<script src="<?php echo ADMIN_JS; ?>/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo ADMIN_JS; ?>/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo ADMIN_JS; ?>/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo ADMIN_JS; ?>/main1.js"></script>
	<script>
		setTimeout(function() {
			$('.alert').slideUp();
		}, 4000);
	</script>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
	<?php include('include/head.php'); ?>
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="vendors/images/car.png" alt="login" class="login-img">
			<h2 class="text-center mb-15">O2 Car Automotive</h2>
			<form method="POST" action="login.php">
				<div class="input-group custom input-group-lg">
					<input type="text" class="form-control" placeholder="Username" name="user">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" class="form-control" placeholder="**********" name="pass">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="input-group">
							<!--
								use code for form submit
								<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Sign In">
							-->
							<input class="btn btn-outline-primary btn-lg btn-block" type="submit" value="Log in" name="login"> 
          <?php
              if(isset($_REQUEST["pesan"])){
              echo "<br>".$_REQUEST["pesan"];
              }
              ?>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php include('include/script.php'); ?>
</body>
</html>
<?php 
	$title = "Main page";
	require('includes/head.php');
?>
<?php
	include('includes/nav.php');
?>

	<div class="container">
		<form action="./index.php" method="POST">
			<div class="container">
			<form class="form-horizontal" role="form">
				<h2>Sign In:</h2>
				<div class="form-group">
					<label for="userName" class="col-sm-3 control-label">
						Логин
					</label>
						
					<div class="col-sm-9">
						<input type="text" id="userName" name="userName" placeholder="Username" class="form-control" value="<?php if(isset($userName)) { echo $userName;}?>" autofocus>
						<span class="help-block">Ваш логин, например: login123, Hiricein23r3.</span>
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">
						Пароль
					</label>
					<div class="col-sm-9">
						<input type="password" id="password" name="password" placeholder="Password" class="form-control">
						<span class="help-block">Ваш пароль, например: rW0fdHP46, SASAgh6t45.</span>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" id"finishButton" name"finishButton" class="btn btn-primary btn-block">Sign In</button>
					</div>
				</div>
				
			</form>
		</div>
		</form>
		<section>
			<article>
				<a href="./reg.php"><button class="btn btn-info">Registration</button></a>
			</article>
		</section>
	</div>
<?php
	include('includes/footer.php');
?>
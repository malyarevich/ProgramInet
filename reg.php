<?php 
	$title = "Registration on the site!";
	require('./includes/head.php');
	
	function isset_var($var_name) {
		if(	NULL !== (filter_input (INPUT_POST, $var_name)) ) {
			return filter_input (INPUT_POST, $var_name);
		}
		return null;
	}
	$firstName = isset_var('firstName');
	$lastName = isset_var('lastName');
	$userName = isset_var('userName');
	$email = isset_var('email');
	$password = isset_var('password');
	$birthDate = isset_var('birthDate');
	$avatar = isset_var('avatar');
	$country = isset_var('country');
	$another_country = isset_var('anotherCountry');
	$genderRadio = isset_var('genderRadio');
	
	
	$avatar_url = "/uploads/avatar.png";
	if(	isset($firstName) && isset($lastName) && isset($userName) && isset($email) && isset($password) && isset($genderRadio) ){
		$allright = true;
		$login = 'root';
		$pass = '';
		
		$connection = new PDO("mysql:host=localhost;dbname=malyar", $login, $pass);

		if(!isset($another_country)) {
			$another_country = 'NULL';
		} else {
			$another_country = '\'' . $another_country . '\'';
		}
		
		$values = 'NULL' . ', \'' . $firstName . '\', \'' . $lastName . '\', \'' . $userName . '\', \'' . $password . '\', \'' . $birthDate . '\', \'' . $avatar_url . '\', \'' . $country . '\', \'' . $another_country . '\', \'' . $genderRadio . '\'';
		$affectedRows = $connection->exec('INSERT INTO users VALUES (' .  $values . ')');
		echo $affectedRows;
		foreach($connection->query('SELECT * FROM users') as $row) {
			echo '<p> ' . $row['id'] . ' ' . $row['name'] . ' ' . $row['lastname'];
		}
		$connection = null;
	}
?>
<script>
	console.log(<?php?>);
</script>

<?php 
	$title = "Registration page";
	require('includes/head.php');
?>
<?php
	include('includes/nav.php');
?>


	<form action="./reg.php" method="POST">
<div class="container">
			<form class="form-horizontal" role="form">
				<h2>Sign Up:</h2>
				<div class="form-group">
					<label for="firstName" class="col-sm-3 control-label">
						Имя					
						<span class="red_star">*</span>
					</label>
					<div class="col-sm-9">
						<input type="text" id="firstName" name="firstName" placeholder="First-name" class="form-control" value="<?php if(isset($firstName)) { echo $firstName;} ?>" autofocus>
						<span class="help-block">Ваше имя, например: Иван, Анна.</span>
					</div>
					<label for="lastName" class="col-sm-3 control-label">
						Фамилия
						<span class="red_star">*</span>
					</label>
					<div class="col-sm-9">
						<input type="text" id="lastName" name="lastName" placeholder="Last-name" class="form-control" value="<?php if(isset($lastName)) { echo $lastName;}?>" autofocus>
						<span class="help-block">Ваша фамилия, например: Шевченко, Маляревич.</span>
					</div>
					<label for="userName" class="col-sm-3 control-label">
						Логин
						<span class="red_star">*</span>
					</label>
						
					<div class="col-sm-9">
						<input type="text" id="userName" name="userName" placeholder="Username" class="form-control" value="<?php if(isset($userName)) { echo $userName;}?>" autofocus>
						<span class="help-block">Ваш логин, например: login123, Hiricein23r3.</span>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">
						Email
						<span class="red_star">*</span>
					</label>
					<div class="col-sm-9">
						<input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php if(isset($email)) { echo $email;}?>">
						<span class="help-block">Ваш Email, например: mymail@mail.com, box@mail.ru</span>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 control-label">
						Пароль
						<span class="red_star">*</span>
					</label>
					<div class="col-sm-9">
						<input type="password" id="password" name="password" placeholder="Password" class="form-control">
						<span class="help-block">Ваш пароль, например: rW0fdHP46, SASAgh6t45.</span>
					</div>
				</div>
				<div class="form-group">
					<label for="repassword" class="col-sm-3 control-label">
						Повторите пароль
						<span class="red_star">*</span>
					</label>
					<div class="col-sm-9">
						<input type="password" id="repassword" name="repassword" placeholder="Re-Password" class="form-control">
						<span class="help-block">Повторите же пароль.</span>
					</div>
				</div>
				<div class="form-group">
					<label for="birthDate" class="col-sm-3 control-label">
						Дата рождения
					</label>
					<div class="col-sm-9">
						<input type="date" id="birthDate" name="birthDate" class="form-control" value="<?php if(isset($birthDate)) { echo $birthDate;} ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="avatar" class="col-sm-3 control-label">
						Аватар
					</label>
					<div class="col-sm-9">
						<input type="file" id="avatar" name="avatar" class="form-control" value="<?php if(isset($avatar)) { echo $avatar;} ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="country" class="col-sm-3 control-label">Страна</label>
					<div class="col-sm-9">
						<select id="country" name="country" class="form-control">
							<option <?php if( $country == 'empty') { echo 'selected'; }?> value="empty"></option>
							<option <?php if( $country == 'ukr') { echo 'selected'; }?> value="ukr">Украина</option>
							<option <?php if( $country == 'rus') { echo 'selected'; }?> value="rus">Россия</option>
							<option <?php if( $country == 'brus') { echo 'selected'; }?> value="brus">Белорусь</option>
							<option <?php if( $country == 'pl') { echo 'selected'; }?> value="pl">Польша</option>
							<option <?php if( $country == 'fr') { echo 'selected'; }?> value="fr">Франция</option>
							<option <?php if( $country == 'uk') { echo 'selected'; }?> value="uk">Великобритания</option>
							<option <?php if( $country == 'ger') { echo 'selected'; }?> value="ger">Германия</option>
							<option <?php if( $country == 'lt') { echo 'selected'; }?> value="lt">Латвия</option>
							<option <?php if( $country == 'flagAnotherCountry') { echo 'selected'; }?> value="flagAnotherCountry">Другая страна</option>
						</select>
						<span class="help-block">При выборе "Другая страна" у появиться новое поле ввода в котором необходимо будет ввести свою страну вручную.</span>						
						<input type="text" id="anotherCountry" id="anotherCountry" placeholder="Another-Country" class="form-control" autofocus <?php if( $country !== 'flagAnotherCountry') { echo 'style="display: none"';}?>>
					</div>
				</div> <!-- /.form-group -->
				<div class="form-group">
					<label class="control-label col-sm-3">
						Пол
						<span class="red_star">*</span>
					</label>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="genderRadio" id="femaleRadio" value="Female" <?php if( $genderRadio == 'Female') { echo 'checked';}?> >Женщина
								</label>
							</div>
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="genderRadio" id="maleRadio" value="Male" <?php if( $genderRadio == 'Male') { echo 'checked';}?> >Мужчина
								</label>
							</div>
							<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="genderRadio" id="uncknownRadio" value="Unknown" <?php if( $genderRadio !== 'Male' && $genderRadio !== 'Female') { echo 'checked';}?> >Неопределен
								</label>
							</div>
						</div>
					</div>
				</div> <!-- /.form-group -->
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<div class="checkbox">
							<label>
								
						<span class="red_star">*</span><input type="checkbox" id"rightAccept" name"rightAccept">Я ознакомлен(а) в внутриними правилами. <a href="#">Внутриние правила.</a>
							</label>
						</div>
					</div>
				</div> <!-- /.form-group -->
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" id"finishButton" name"finishButton" class="btn btn-primary btn-block">Регистрация</button>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- ./container -->
	</form>
</body>
</html>
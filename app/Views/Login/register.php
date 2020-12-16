<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
	<div class="bg-light text-dark" style="width:28%; margin: 180px auto; padding: 35px; box-sizing: border-box; text-align: center; border-radius: 3px; border: solid black 1px;">
		<div style="font-size: 25px;  font-family: Arial;">Register</div>
		<br>
		<?= form_open(base_url()."/login/registerAccount") ?>
			<div class="form-group">
				<input type="text" class="form-control" name="username" placeholder="Username" style="margin-top: width: 80%;" required="">
			</div>
			<div class="form-group">
				<input type="password" id="password" class="form-control" name="password" placeholder="Password" style="margin-top: width: 80%;">
			</div>
			<div class="form-group">
				<input type="password" id="confirm-password" class="form-control" name="confirm password" placeholder="Confirm Password" style="margin-top: width: 80%;" required="">
			</div>
			
			<button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 3px;" required="">Register Now</button>
		</form>
		<div style="margin-top: 30px;">Already have an account? <a href="<?= base_url()."/login/index" ?>">Sign in</a></div>
	</div>
	<script>
		$("button[type=submit]").on("click", function(event) {
			if ($("#password").val() != $("#confirm-password").val()) {
				event.preventDefault();
				alert("password tidak sama!");
			}
			console.log($("#password").val() != $("#confirm-password").val())
		})
	</script>
</body>
</html>
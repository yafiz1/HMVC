<div class="bg-light text-dark" style="width:28%; margin: 180px auto; padding: 35px; box-sizing: border-box; text-align: center; border-radius: 3px; border: solid black 1px;">
	<div style="font-size: 25px;  font-family: Arial;">Register</div>
	<br>
	<?= form_open("Login/registerAccount") ?>
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
	<div style="margin-top: 30px;">Already have an account? <a href="<?= site_url("Login/index")?>">Sign in</a></div>
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
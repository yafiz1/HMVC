<div class="bg-light text-dark" style="width:28%; margin: 180px auto; padding: 35px; box-sizing: border-box; text-align: center; border-radius: 3px; border: solid black 1px;">
	<div style="font-size: 25px;  font-family: Arial;">Login</div>
	<br>
	<?= form_open("Login/auth") ?>
		<div class="form-group">
			<input type="text" class="form-control" name="username" placeholder="Username" style="margin-top: width: 80%;">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="Password" style="margin-top: width: 80%;">
		</div>
		
		<button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 3px;">Sign in</button>
	</form>
	<div style="margin-top: 30px;"><a href="<?= site_url("Login/registerView") ?>">Don't have an account? Register</a></div>
	
</div>
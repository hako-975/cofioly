<div class="container pt-3">
	<div class="row justify-content-center">
		<div style="border: 5px dashed;" class="col-lg-4 pt-2 bg-white text-center border-dark rounded px-4 py-4 mx-3">
			<form method="post">
				<img src="<?= base_url(); ?>assets/img/img_properties/logo-cofioly.png" alt="logo" class="img-fluid" width="100">
				<h5 class="my-2 text-dark">Login to <span class="cofioly-font">Cofioly</span></h5>
				<div class="form-group text-left">
					<label class="text-dark" for="username"><i class="fas fa-fw fa-user"></i> Username or Email</label>
					<input value="<?= set_value('username'); ?>" type="text" name="username" class="form-control rounded-pill" required>
				</div>
				<div class="form-group text-left">
			    	<label class="text-dark" for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
					<div class="input-group" id="show_hide_password">
						<input class="form-control rounded-left-pill" required id="password" type="password"  name="password">
					  	<div class="input-group-append">
							<a class="box-shadow-2 btn btn-dark border text-white rounded-right-pill"><i id="icon_eye" class="fas fa-fw fa-eye-slash" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="form-group">
		    		<p id="text" style="display: none;" class="alert alert-danger mt-2 p-1"><small>Caps lock is ON.</small></p>
				</div>
				<div class="form-group text-left">
					<input type="checkbox" name="remember" id="remember">
					<label for="remember" class="text-dark">Remember Me</label>
				</div>
				<div class="form-group">
					<button type="submit" name="btnLogin" class="btn btn-outline-dark form-control rounded-pill cofioly-font">Login</button>
				</div>
				<hr class="bg-dark">
				<div class="form-group text-center">
					<a class="text-decoration-none" href="<?= base_url(); ?>auth/forgotPassword">Forgot Password?</a>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="container pt-3">
	<div class="row justify-content-center">
		<div style="border: 5px dashed;" class="col-lg-6 pt-2 bg-white border-primary rounded px-4 py-4 mx-3">
			<form method="post" action="<?= base_url(); ?>auth/changePassword">
				<div class="form-group">
					<h5 class="text-primary"><i class="fas fa-fw fa-sync"></i>  Change Password for <?= $this->session->userdata('reset_email'); ?></h5>
				</div>
				<div class="form-group">
			    	<label class="text-primary" for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
					<div class="input-group" id="show_hide_password">
						<input class="form-control rounded-left-pill" required id="password" type="password"  name="password">
					  	<div class="input-group-append">
							<a class="box-shadow-2 btn btn-primary border text-white rounded-right-pill"><i id="icon_eye1" class="fas fa-fw fa-eye-slash" aria-hidden="true"></i></a>
						</div>
					</div>
					<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
		    		<p id="text" style="display: none;" class="alert alert-danger mt-2 p-1"><small>Caps lock is ON.</small></p>
				</div>
				<div class="form-group">
			    	<label class="text-primary" for="password_verify"><i class="fas fa-fw fa-lock"></i> Password Verify</label>
					<div class="input-group" id="show_hide_password_verify">
						<input class="form-control rounded-left-pill" required id="password_verify" type="password"  name="password_verify">
					  	<div class="input-group-append">
							<a class="box-shadow-2 btn btn-primary border text-white rounded-right-pill"><i id="icon_eye2" class="fas fa-fw fa-eye-slash" aria-hidden="true"></i></a>
						</div>
					</div>
					<?= form_error('password_verify', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
		    		<p id="text2" style="display: none;" class="alert alert-danger mt-2 p-1"><small>Caps lock is ON.</small></p>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-outline-primary rounded-pill"><i class="fas fa-fw fa-paper-plane"></i> Change Password</button>
				</div>
			</form>
		</div>
	</div>
</div>


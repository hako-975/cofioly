<div class="container pt-3">
	<div class="row justify-content-center">
		<div style="border: 5px dashed;" class="col-lg-6 pt-2 bg-white border-dark rounded px-4 py-4 mx-3">
			<form method="post" action="<?= base_url(); ?>auth/forgotPassword">
				<div class="form-group">
					<h5 class="text-dark"><i class="fas fa-fw fa-lock"></i> Forgot Password</h5>
				</div>
				<div class="form-group">
					<label class="text-dark" for="email"><i class="fas fa-fw fa-envelope"></i> Email</label>
					<input required type="email" value="<?= set_value('email'); ?>" class="form-control rounded-pill" id="email" name="email">
					<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-outline-dark rounded-pill"><i class="fas fa-fw fa-paper-plane"></i> Reset Password</button>
				</div>
			    <hr class="bg-dark">
			    <div class="form-group text-center">
					<a class="text-decoration-none" href="<?= base_url(); ?>auth/index">Login</a>
				</div>
			</form>
		</div>
	</div>
</div>
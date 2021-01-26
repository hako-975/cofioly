<style>
  #content {
    filter: blur(3px);
    -webkit-filter: blur(3px);
  }

</style>
<script src="<?= base_url('assets/vendor/jquery/jquery-3.4.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <a href="<?= base_url('main'); ?>" class="text-decoration-none">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-header text-center mx-auto">
        <img src="<?= base_url('assets/img/img_properties/logo-cofioly.png'); ?>" alt="logo" class="img-fluid" width="100">
      </div>
      <form method="post" action="<?= base_url('auth/index?link=' . $this->uri->segment(1)); ?>">
        <div class="modal-body">
          <div class="form-group text-left">
            <label class="text-primary" for="username"><i class="fas fa-fw fa-user"></i> Username or Email</label>
            <input type="text" value="<?= set_value('username'); ?>" name="username" class="form-control rounded-pill" required>
          </div>
          <div class="form-group text-left">
  		    	<label class="text-primary" for="password"><i class="fas fa-fw fa-lock"></i> Password</label>
    				<div class="input-group" id="show_hide_password">
    					<input class="form-control rounded-left-pill" required id="password" type="password" name="password">
    				  	<div class="input-group-append">
    						<a class="btn btn-primary border text-white rounded-right-pill"><i id="icon_eye" class="fas fa-fw fa-eye-slash pt-1" aria-hidden="true"></i></a>
    					</div>
    				</div>
    			</div>
    			<div class="form-group text-left">
    		    <p id="text" style="display: none;" class="alert alert-danger mt-2 p-1"><small>Caps lock is ON.</small></p>
    			</div>
          <div class="form-group text-left">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember" class="text-primary">Remember Me</label>
          </div>
          <div class="form-group">
            <button type="submit" name="btnLogin" class="btn btn-outline-primary form-control rounded-pill cofioly-font">Login</button>
          </div>
        </div>
        <div class="modal-footer text-center mx-auto">
          <div class="form-group text-center mx-auto">
            <a class="text-decoration-none" href="<?= base_url('auth/forgotPassword'); ?>">Forgot Password?</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
  $('#loginModal').modal({
    "show": true,
    "backdrop" : false
  });
  $('#topbar_main').hide();
  $('#footbar_main').hide();
</script>
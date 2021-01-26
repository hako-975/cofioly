<script>
	function fadeOut(el){
	  el.style.opacity = 1;

	  (function fade() {
	    if ((el.style.opacity -= .1) < 0) {
	      el.style.display = "none";
	    } else {
	      requestAnimationFrame(fade);
	    }
	  })();
	}

	function fadeIn(el, display){
	  el.style.opacity = 0;
	  el.style.display = display || "block";

	  (function fade() {
	    var val = parseFloat(el.style.opacity);
	    if (!((val += .1) > 1)) {
	      el.style.opacity = val;
	      requestAnimationFrame(fade);
	    }
	  })();
	}

	document.onreadystatechange = function () {
		var state = document.readyState
		if (state == 'interactive') {
			document.getElementById("main_content").style.display = "none";
		} else if (state == 'complete') {
			document.getElementById('interactive');
			var loader = document.getElementById('loader-wrapper');
			var main_content = document.getElementById('main_content');
			fadeOut(loader);
			fadeIn(main_content);
		}
	}
</script>

<!DOCTYPE html>
<html lang="en" id="page-top">
  <head>
  	<style>
  		#loader-wrapper {
		  width: 100%;
		  height: 100%;
		  position: absolute;
		  top: 0;
		  left: 0;
		  display: flex;
		  justify-content: center;
		  align-items: center;
		}

		.loader {
		  background-image: url(../../../../../../../../../../../../cofioly_web_profile/assets/img/img_properties/gif-cofioly.gif);
		  background-repeat: no-repeat;
		  background-size: cover;
		  min-width: 10rem;
		  min-height: 10rem;
		}
  	</style>
	<!-- call file include js -->
	<?php include 'include-css.php'; ?>
    <title><?= $title; ?></title>
  </head>
  <body>
  	<div id="loader-wrapper">
		<span class="loader"></span>
	</div>
	<div id="main_content">
  		<div class="wrapper">
	  <!-- Sidebar  -->
	  <nav id="sidebar">
	    <div class="sidebar-header">
	    	<a href="<?= base_url('landing'); ?>">
		        <img src="<?= base_url('assets/img/img_navbar_brands/') . $landing['navbar_brand']; ?>" width="90" alt="navbar-brand">
	    	</a>
	    </div>

	    <ul class="list-unstyled components">
	      <p class="my-0 py-0"><?= $landing['nama_brand']; ?></p>
	      <li>
	        <a href="<?= base_url('admin/index'); ?>"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a>
	      </li>
	      <li>
	        <a href="<?= base_url('admin/landing'); ?>"><i class="fas fa-fw fa-globe"></i> Landing</a>
	      </li>
	      <li>
	        <a href="<?= base_url('admin/gallery'); ?>"><i class="fas fa-fw fa-image"></i> Gallery</a>
	      </li>
	      <li>
	        <a href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>
	      </li>
	    </ul>
		
	    <ul class="list-unstyled">
	      <li>
	        <p>Copyright 2020 &copy; By Cofioly. All Right Reserved.</p>
	      </li>
	    </ul>
	  </nav>

	  <!-- Page Content  -->
	  <div id="content">

	    <nav class="navbar navbar-expand-lg navbar-light bg-light">
	      <div class="container-fluid">
	        <button type="button" id="sidebarCollapse" class="btn btn-dark">
	          <i class="fas fa-align-left"></i>
	        </button>

	        <ul class="nav navbar-nav ml-auto my-2">
	          <li class="nav-item active">
	            <a href="" class="btn btn-primary"><i class="fas fa-fw fa-user"></i> <?= $DATA_USER['username']; ?></a>
	          </li>
	        </ul>
	      </div>
	    </nav>
	    
	    <div class="container-fluid">
<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah <?= $landing['nama_brand']; ?> yakin ingin logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Close</button>
        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
  </div>
</div>
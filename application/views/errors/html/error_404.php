<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link rel="stylesheet" href="<?= config_item('base_url'); ?>assets/vendor/fontawesome-5.13.0/css/all.min.css">
<link rel="stylesheet" href="<?= config_item('base_url'); ?>assets/vendor/bootstrap-4.4.1/css/bootstrap.css">
<link rel="stylesheet" href="<?= config_item('base_url'); ?>assets/css/cofioly.css">
<style>

  body {
    min-height: 100vh;
    background-image: url(<?= config_item('base_url'); ?>/assets/img/img_properties/background_not_found.jpg);
    background-size: cover;
    background-repeat: no-repeat;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }


  .container {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -60%);
  }
</style>
</head>
<body>
	<div class="container">
		<div class="row my-2">
			<div style="border-top-right-radius: 120px!important;" class="col-lg-5 mx-4 p-3 rounded-lg border-dark border">
				<h1 class="font-weight-bold">oops!</h1>
				<h2 class="font-weight-bold">Error 404 : Page Not Found</h2>
				<a href="<?= config_item('base_url'); ?>auth" class="btn btn-outline-dark my-3 p-3 px-4 cofioly-font rounded-pill"><i class="fas fa-fw fa-chevron-circle-left"></i> Go Back</a>
			</div>
		</div>
		<div class="row my-2">
			<div style="border-top-right-radius: 0!important; border-top-left-radius: 0!important" class="col-lg-5 mx-4 text-center rounded-pill p-2 border-dark border">
				<a target="_blank" class="mx-1 rounded-circle" href="https://www.facebook.com/Andri975"><i class="fab fa-2x fa-facebook"></i></a>
				<a target="_blank" class="mx-1 rounded-circle" href="https://www.twitter.com/AndriFirmanSap3"><i class="fab fa-2x fa-twitter"></i></a>
				<a target="_blank" class="mx-1 rounded-circle" href="https://www.instagram.com/andri_firman_975"><i class="fab fa-2x fa-instagram"></i></a>
			</div>
		</div>
	</div>

	<script src="<?= config_item('base_url'); ?>assets/vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<script src="<?= config_item('base_url'); ?>assets/vendor/fontawesome-5.13.0/js/all.min.js"></script>

</body>
</html>
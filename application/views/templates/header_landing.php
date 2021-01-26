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
		  background-image: url(http://cofioly.xyz/assets/img/img_properties/gif-cofioly.gif);
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
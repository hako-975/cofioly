	</div>
	
	<div class="flashdata" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	<div class="flashdata-success" data-flashdata="<?= $this->session->flashdata('message-success'); ?>"></div>
	<div class="flashdata-failed" data-flashdata="<?= $this->session->flashdata('message-failed'); ?>"></div>
	
	<a class="scroll-to-top rounded pt-3" href="#page-top">
	  <i class="fas fa-angle-up"></i>
	</a>

	<!-- call file include js -->
	<?php include 'include-js.php'; ?>
  </body>
</html>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url('assets/vendor/jquery/jquery-3.4.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/popper-2.4.0/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/jquery-easing-1.4.1/jquery.easing.min.js'); ?>"></script>

<!-- Plug In JavaScript -->
<script src="<?= base_url('assets/vendor/bootstrap-4.4.1/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/chart-2.9.3/chart.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables-1.10.20/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/fancybox-3.5.7/jquery.fancybox.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/fontawesome-5.13.0/js/all.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/jquery-mcustomscrollbar-3.1.13/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/owlcarousel2-2.3.4/js/owl.carousel.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/sweetalert2-9.10.12/sweetalert2.all.min.js'); ?>"></script>


<!-- Config Plug In JavaScript -->
<script src="<?= base_url('assets/js/datatables-config.js'); ?>"></script>
<script src="<?= base_url('assets/js/fancybox-config.js'); ?>"></script>
<script src="<?= base_url('assets/js/sweetalert2-config.js'); ?>"></script>
<script src="<?= base_url('assets/js/owlcarousel2-config.js'); ?>"></script>


<script src="<?= base_url('assets/js/cofioly.js'); ?>"></script>

<script>
  $('.page-scroll').on('click', function(e) {
    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top - 50
    }, 1200, 'easeInOutExpo');
    e.preventDefault();
  });
</script>

<script>
	$(document).ready(function() {
        $('#divTitle').load(location.href + " #divTitle>*", "");
	    $('#divNamaBrand').load(location.href + " #divNamaBrand>*", "");
        $('#divTextInovatif').load(location.href + " #divTextInovatif>*", "");
        $('#divTextBox1').load(location.href + " #divTextBox1>*", "");
        $('#divTextBox2').load(location.href + " #divTextBox2>*", "");
        $('#divChannelIdYt').load(location.href + " #divChannelIdYt>*", "");
        $('#divFooter').load(location.href + " #divFooter>*", "");
	});
</script>

<script>
	function editTitle() {
	    $("#spanTitle").hide();
	    $("#editTitleButton").hide();
	    $("#title").show();
	    $("#saveTitleButton").show();
	    $("#saveTitleButton").on('click', function() {
	        var title = $("#title").val();
	        var base_url = "<?= base_url(); ?>";
            $.ajax({
                url: base_url + "landing/editTitle",
                type: "post",
                data: {title:title},
                success:function(data) {
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data Title ' + title + ' berhasil diubah!',
                            icon: 'success'
                        });
                    });
                }
            });
	        $("#saveTitleButton").hide();
		    $("#editTitleButton").show();
		    $("#spanTitle").show();
		    $("#title").hide();
			$('#divTitle').load(location.href + " #divTitle>*", "");
	    });
	}

    function editNamaBrand() {
        $("#h1NamaBrand").hide();
        $("#editNamaBrandButton").hide();
        $("#nama_brand").show();
        $("#saveNamaBrandButton").show();
        $("#saveNamaBrandButton").on('click', function() {
            var nama_brand = $("#nama_brand").val();
            var base_url = "<?= base_url(); ?>";
            $.ajax({
                url: base_url + "landing/editNamaBrand",
                type: "post",
                data: {nama_brand:nama_brand},
                success:function(data) {
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data Nama Brand ' + nama_brand + ' berhasil diubah!',
                            icon: 'success'
                        });
                    });
                }
            });
            $("#saveNamaBrandButton").hide();
            $("#editNamaBrandButton").show();
            $("#h1NamaBrand").show();
            $("#nama_brand").hide();
            $('#divNamaBrand').load(location.href + " #divNamaBrand>*", "");
        });
    }

    function editTextInovatif() {
        $("#h3TextInovatif").hide();
        $("#editTextInovatifButton").hide();
        $("#text_inovatif").show();
        $("#saveTextInovatifButton").show();
        $("#saveTextInovatifButton").on('click', function() {
            var text_inovatif = $("#text_inovatif").val();
            var base_url = "<?= base_url(); ?>";
            $.ajax({
                url: base_url + "landing/editTextInovatif",
                type: "post",
                data: {text_inovatif:text_inovatif},
                success:function(data) {
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data Text Inovatif ' + text_inovatif + ' berhasil diubah!',
                            icon: 'success'
                        });
                    });
                }
            });
            $("#saveTextInovatifButton").hide();
            $("#editTextInovatifButton").show();
            $("#h3TextInovatif").show();
            $("#text_inovatif").hide();
            $('#divTextInovatif').load(location.href + " #divTextInovatif>*", "");
        });
    }

    function editTextBox1() {
        $("#paragrafTextBox1").hide();
        $("#editTextBox1Button").hide();
        $("#text_box_1").show();
        $("#saveTextBox1Button").show();
        $("#saveTextBox1Button").on('click', function() {
            var text_box_1 = $("#text_box_1").val();
            var base_url = "<?= base_url(); ?>";
            $.ajax({
                url: base_url + "landing/editTextBox1",
                type: "post",
                data: {text_box_1:text_box_1},
                success:function(data) {
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data Text Box 1 ' + text_box_1 + ' berhasil diubah!',
                            icon: 'success'
                        });
                    });
                }
            });
            $("#saveTextBox1Button").hide();
            $("#editTextBox1Button").show();
            $("#paragrafTextBox1").show();
            $("#text_box_1").hide();
            $('#divTextBox1').load(location.href + " #divTextBox1>*", "");
        });
    }

    function editTextBox2() {
        $("#paragrafTextBox2").hide();
        $("#editTextBox2Button").hide();
        $("#text_box_2").show();
        $("#saveTextBox2Button").show();
        $("#saveTextBox2Button").on('click', function() {
            var text_box_2 = $("#text_box_2").val();
            var base_url = "<?= base_url(); ?>";
            $.ajax({
                url: base_url + "landing/editTextBox2",
                type: "post",
                data: {text_box_2:text_box_2},
                success:function(data) {
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data Text Box 2 ' + text_box_2 + ' berhasil diubah!',
                            icon: 'success'
                        });
                    });
                }
            });
            $("#saveTextBox2Button").hide();
            $("#editTextBox2Button").show();
            $("#paragrafTextBox2").show();
            $("#text_box_2").hide();
            $('#divTextBox2').load(location.href + " #divTextBox2>*", "");
        });
    }

    function editChannelIdYt() {
        $("#h3ChannelIdYt").hide();
        $("#editChannelIdYtButton").hide();
        $("#channel_id_yt").show();
        $("#saveChannelIdYtButton").show();
        $("#saveChannelIdYtButton").on('click', function() {
            var channel_id_yt = $("#channel_id_yt").val();
            var base_url = "<?= base_url(); ?>";
            $.ajax({
                url: base_url + "landing/editChannelIdYt",
                type: "post",
                data: {channel_id_yt:channel_id_yt},
                success:function(data) {
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data YouTube Channel Id ' + channel_id_yt + ' berhasil diubah!',
                            icon: 'success'
                        });
                    });
                }
            });
            $("#saveChannelIdYtButton").hide();
            $("#editChannelIdYtButton").show();
            $("#h3ChannelIdYt").show();
            $("#channel_id_yt").hide();
            $('#divChannelIdYt').load(location.href + " #divChannelIdYt>*", "");
            window.location.reload();
        });
    }

    function editFbLink() {
        $("span#spanFbLink").hide();
        $("button#editFbLinkButton").hide();
        $("input#fb_link").show();
        $("button#saveFbLinkButton").show();
        $("button#saveFbLinkButton").on('click', function() {
            var fb_link = $("input#fb_link").val();
            var base_url = "<?= base_url(); ?>";
            $.ajax({
                url: base_url + "landing/editFbLink",
                type: "post",
                data: {fb_link:fb_link},
                success:function(data) {
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data Facebook Link ' + fb_link + ' berhasil diubah!',
                            icon: 'success'
                        });
                    });
                }
            });
            $("button#saveFbLinkButton").hide();
            $("button#editFbLinkButton").show();
            $("span#spanFbLink").show();
            $("input#fb_link").hide();
            $('div#divFacebook').load(location.href + " div#divFacebook>*", "");
        });
    }

    function editFooter() {
        $("#pFooter").hide();
        $("#editFooterButton").hide();
        $("#footer").show();
        $("#saveFooterButton").show();
        $("#saveFooterButton").on('click', function() {
            var footer = $("#footer").val();
            var base_url = "<?= base_url(); ?>";
            $.ajax({
                url: base_url + "landing/editFooter",
                type: "post",
                data: {footer:footer},
                success:function(data) {
                    $(document).ready(function(){
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Data Footer ' + footer + ' berhasil diubah!',
                            icon: 'success'
                        });
                    });
                }
            });
            $("#saveFooterButton").hide();
            $("#editFooterButton").show();
            $("#pFooter").show();
            $("#footer").hide();
            $('#divFooter').load(location.href + " #divFooter>*", "");
        });
    }
</script>

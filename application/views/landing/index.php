<?php 
  function get_CURL($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result, true);
  }

  // UCPEIoenMUgB77Olv7rtekhg --> cofioly
  // UC-lHJZR3Gqxm24_Vd_AJ5Yw --> pewdiepie

  $channelId = $landing['channel_id_yt'];
  $result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id='.$channelId.'&key=AIzaSyCMHm9kJ2NP90GYW_qJKNkfm5Zn12kF8tQ');
  error_reporting(0);

  $description = $result['items'][0]['snippet']['description'];
  $youtubeProfileLogo = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
  $channelName = $result['items'][0]['snippet']['title'];
  $subscribers = $result['items'][0]['statistics']['subscriberCount'];
  // latest video
  $urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCMHm9kJ2NP90GYW_qJKNkfm5Zn12kF8tQ&channelId='.$channelId.'&maxResults=1&order=date&part=snippet';
  $result = get_CURL($urlLatestVideo);
  $latestVideoId = $result['items'][0]['id']['videoId'];
?>
<style>
		
	.fluid-jumbotron {
    margin-top: 50px;
		background-image: url(<?= base_url(); ?>assets/img/img_jumbotrons/<?= $landing['img_jumbotron']; ?>);
		background-size: cover;
		background-repeat: no-repeat;
	}

	.fluid-jumbotron img {
    width: 25%;
	}

	section {
    min-height: 420px;
	}

	footer {
    min-height: 50px;
    padding-top:12px;
	}

	.text-shadow {
		text-shadow: 2px 2px 2px rgba(0,0,0,0.8);
	}

	a.nav-link:hover {
		color: #E19026;
		text-shadow: .2px .2px .2px rgba(0,0,0,0.8);
	}

	.text-cofioly {
		color: #E19026;
	}

	.bg-cofioly {
		background-color: #E19026;
	}

	.w-400 {
		font-weight: 400;
	}

	.alert-width {
    position: fixed; 
    bottom: 10px; 
    right: 10px; 
    left: 10px; 
    z-index: 9999;
    width: 100%;
	}

	.text-center-left {
	    text-align: center;
	}

	.width-200 {
    width: 200px !important;
	}


	@media(min-width: 992px) {
	    .text-center-left {
	        text-align: left;
	    }
	    .alert-width {
	        position: fixed; 
	        bottom: 10px; 
	        right: 0!important;
	        z-index: 9999;
	        width: 40%;
	    }
	}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-white fixed-top">
	<div class="container">
	  <a class="navbar-brand page-scroll" href="<?= base_url(); ?>"><img src="<?= base_url('assets/img/img_navbar_brands/') . $landing['navbar_brand']; ?>" width="100" alt="logo"></a>
	  <button class="navbar-toggler bg-cofioly" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavDropdown">
	    <ul class="navbar-nav mx-auto">
	      <li class="nav-item">
	        <a style="color: #E19026" class="nav-link page-scroll" href="#page-top"><i class="fas fa-fw fa-home"></i> Home</a>
	      </li>
	      <li class="nav-item">
	        <a style="color: #E19026" class="nav-link page-scroll" href="#about"><i class="fas fa-fw fa-user"></i> About</a>
	      </li>
	      <li class="nav-item">
	        <a style="color: #E19026" class="nav-link page-scroll" href="#social"><i class="fab fa-fw fa-facebook"></i> Social</a>
	      </li>
	      <li class="nav-item">
	        <a style="color: #E19026" class="nav-link page-scroll" href="#gallery"><i class="fas fa-fw fa-image"></i> Gallery</a>
	      </li>
	      <li class="nav-item">
	        <a style="color: #E19026" class="nav-link page-scroll" href="#contact"><i class="fas fa-fw fa-envelope"></i> Contact</a>
	      </li>
	    </ul>
	  </div>
	</div>
</nav>

<div class="fluid-jumbotron py-5">
	<div class="container">
	  <div class="text-white text-shadow text-center">
	    <img src="<?= base_url('assets/img/img_profiles/') . $landing['img_profile']; ?>" class="rounded-circle img-thumbnail">
	    <h1 class="w-400 display-4"><?= $landing['nama_brand']; ?></h1>
	    <h3 class="w-400 lead"><?= $landing['text_inovatif']; ?></h3>
	    <hr style="width: 10%; background-color: #E19026" class="text-center">
	  </div>
	</div>
</div>

<!-- About -->
<section class="my-5 py-5 about" id="about">
    <div class="container">
      <div class="row">
        <div class="col text-center pb-3">
          <h2>About</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5 text-center-left">
          <p>
            <?= $landing['text_box_1']; ?>
          </p>
        </div>
        <div class="col-md-5 text-center-left">
          <p>
            <?= $landing['text_box_2']; ?>
          </p>
        </div>
      </div>
    </div>
</section>

<!-- YouTube -->
<section class="my-5 py-5 social bg-gray" id="social">
    <div class="container">
      <div class="row">
        <div class="col text-center pb-3">
          <h2>Social</h2>
        </div>
      </div>
      <div class="owl-carousel owl-theme">
        <?php if ($channelId !== ''): ?>
        	<div class="row justify-content-center">
	          <div class="col-md-5">
	            <div class="row my-2 text-center-left">
	              <div class="col-md-4 mx-auto">
	                <img style="text-align: center!important; margin: 0 auto;" src="<?= $youtubeProfileLogo; ?>" alt="logo channel" class="social_icon rounded-circle img-thumbnail">
	              </div>
	              <div class="col-md-8">
	                <h4 class="my-2"><?= $channelName; ?></h4>
	                <p><?= number_format($subscribers); ?> Subscribers.</p>
	                <div class="g-ytsubscribe" data-channelid="<?= $channelId; ?>" data-layout="default" data-count="default" data-theme="dark"></div>
	              </div>
	            </div>
	            <!-- <div class="row my-2 text-center-left">
	              <div class="col">
	                <p><?= $description; ?></p>
	              </div>
	            </div> -->
	          </div>
	          <div class="col-md-5">
	            <div class="embed-responsive embed-responsive-16by9">
	              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId; ?>?rel=0" allowfullscreen></iframe>
	            </div>
	          </div>
	        </div>
        <?php endif ?>
        <?php if ($landing['fb_link'] || $landing['ig_link'] !== ''): ?>
          <div class="row justify-content-center">
            <?php if ($landing['fb_link'] !== ''): ?>
              <div class="col-md-5 my-3 text-center mx-auto">
                <a href="<?= $landing['fb_link']; ?>" target="_blank" class="text-decoration-none social_link">
                  <span class="row justify-content-center">
                    <span class="col-lg-6 col-12 text-center mx-auto">
                      <img src="<?= base_url('assets/img/social/fb-icon.png'); ?>" alt="fb" class="social_icon mx-auto">
                    </span>
                    <span class="col-lg-12 col-6 text-center mx-auto">
                      <p class="text-dark text-break mt-3 mb-0">Facebook :</p>
                      <?php 
                        $fb_name = explode('/', $landing['fb_link']);
                        $fb_name = end($fb_name);
                      ?>
                      @<?= $fb_name; ?>
                    </span>
                  </span>
                </a> 
              </div>
            <?php endif ?>
            <?php if ($landing['fb_link'] && $landing['ig_link'] !== ''): ?>
              <div class="col-1 text-center mx-auto">
                <div class="text-center mx-auto rounded-pill" style="height: 100%; width: 25%; background-color: rgba(0,0,0,1)"></div>
              </div>
            <?php endif ?>
            <?php if ($landing['ig_link'] !== ''): ?>
              <div class="col-md-5 my-3 text-center mx-auto">
                <a href="<?= $landing['ig_link']; ?>" target="_blank" class="text-decoration-none social_link">
                  <span class="row justify-content-center">
                    <span class="col-lg-6 col-12 text-center mx-auto">
                      <img src="<?= base_url('assets/img/social/ig-icon.png'); ?>" alt="ig" class="social_icon mx-auto">
                    </span>
                    <span class="col-lg-12 col-6 text-center mx-auto">
                      <p class="text-dark text-break mt-3 mb-0">Instagram :</p>
                      <?php 
                        $ig_name = explode('/', $landing['ig_link']);
                        $ig_name = end($ig_name);
                      ?>
                      @<?= $ig_name; ?>
                    </span>
                  </span>
                </a> 
              </div>
            <?php endif ?>
          </div>
        <?php endif ?>
        <?php if ($landing['twitter_link'] || $landing['whatsapp_number'] !== ''): ?>
          <div class="row justify-content-center">
            <?php if ($landing['twitter_link'] !== ''): ?>
              <div class="col-md-5 my-3 text-center mx-auto">
                <a href="<?= $landing['twitter_link']; ?>" target="_blank" class="text-decoration-none social_link">
                  <span class="row justify-content-center">
                    <span class="col-lg-6 col-12 text-center mx-auto">
                      <img src="<?= base_url('assets/img/social/twitter-icon.png'); ?>" alt="fb" class="social_icon mx-auto">
                    </span>
                    <span class="col-lg-12 col-6 text-center mx-auto">
                      <p class="text-dark text-break mt-3 mb-0">Twitter :</p>
                      <?php 
                        $twitter_name = explode('/', $landing['twitter_link']);
                        $twitter_name = end($twitter_name);
                      ?>
                      @<?= $twitter_name; ?>
                    </span>
                  </span>
                </a> 
              </div>
            <?php endif ?>
            <?php if ($landing['twitter_link'] && $landing['whatsapp_number'] !== ''): ?>
              <div class="col-1 text-center mx-auto">
                <div class="text-center mx-auto rounded-pill" style="height: 100%; width: 25%; background-color: rgba(0,0,0,1)"></div>
              </div>
            <?php endif ?>
            <?php if ($landing['whatsapp_number'] !== ''): ?>
              <div class="col-md-5 my-3 text-center mx-auto">
                <a href="https://api.whatsapp.com/send?phone=<?= $landing['whatsapp_number']; ?>" target="_blank" class="text-decoration-none social_link">
                  <span class="row justify-content-center">
                    <span class="col-lg-6 col-12 text-center mx-auto">
                      <img src="<?= base_url('assets/img/social/whatsapp-icon.png'); ?>" alt="ig" class="social_icon mx-auto">
                    </span>
                    <span class="col-lg-12 col-6 text-center mx-auto">
                      <p class="text-dark text-break mt-3 mb-0">WhatsApp :</p>
                      <?= $landing['whatsapp_number']; ?>
                    </span>
                  </span>
                </a> 
              </div>
            <?php endif ?>
          </div>
        <?php endif ?>
      </div>
    </div>
</section>

<!-- gallery -->
<section class="my-5 py-5 gallery" id="gallery">
    <div class="container">
      <div class="row">
        <div class="col text-center pb-3">
          <h2>Gallery</h2>
        </div>
      </div>
      <div class="row justify-content-center my-2">
        <?php foreach ($gallery as $image): ?>
          <div class="col-lg-3 m-2 border border-dark rounded text-center p-2">
            <a href="<?= base_url('assets/img/img_galleries/') . $image['img_gallery']; ?>" class="enlarge">
              <img src="<?= base_url('assets/img/img_galleries/') . $image['img_gallery']; ?>" alt="<?= $image['img_gallery']; ?>" class="img-fluid width-200">
            </a>
          </div>
        <?php endforeach ?>
      </div>
    </div>
</section>

<!-- Contact -->
<section class="my-5 py-5 contact bg-gray" id="contact">
    <div class="container">
      <div class="row">
        <div class="col text-center pb-3">
          <h2>Contact</h2>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-4">
          <div class="card bg-cofioly text-white mb-4 text-center">
            <div class="card-body">
              <?php 
                $contact_header = explode('>;', $landing['contact_header']);
              ?>
              <h5 class="card-title"><?= trim($contact_header[0]); ?></h5>
              <p class="card-text text-white"><?= trim($contact_header[1]); ?></p>
            </div>
          </div>
          
          <?php 
            $my_location = explode('>;', $landing['my_location']);
          ?>
          <ul class="list-group mb-4">
            <li class="list-group-item"><h4 class="my-1"><?= trim($my_location[0]); ?></h4></li>
            <li class="list-group-item"><?= trim($my_location[1]); ?></li>
            <li class="list-group-item"><?= trim($my_location[2]); ?></li>
            <li class="list-group-item"><?= trim($my_location[3]); ?></li>
          </ul>
        </div>

        <div class="col-lg-6">
          <form method="post" class="bg-white p-4 rounded">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control rounded-pill" id="name" value="<?= set_value('name'); ?>" name="name">
              <?= form_error('name', '<small class="form-text text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control rounded-pill" id="email" value="<?= set_value('email'); ?>" name="email">
              <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="no_whatsapp">No. WhatsApp</label>
              <input type="number" class="form-control rounded-pill" id="no_whatsapp" value="<?= set_value('no_whatsapp'); ?>" name="no_whatsapp">
              <?= form_error('no_whatsapp', '<small class="form-text text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" name="message" rows="3"><?= set_value('message'); ?></textarea>
              <?= form_error('message', '<small class="form-text text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <button name="btnSendMessage" type="submit" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Send Message</button>
            </div>
          </form>

        </div>
      </div>
    </div>
</section>

<!-- footer -->
<footer class="bg-cofioly text-white mt-n5 py-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p class="text-white my-auto"><?= $landing['footer']; ?></p>
        </div>
      </div>
    </div>
</footer>
    




<script src="https://apis.google.com/js/platform.js"></script>



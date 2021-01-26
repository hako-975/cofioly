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
  $channelIdYt = $landing['channel_id_yt'];
  $result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id='.$channelIdYt.'&key=AIzaSyCMHm9kJ2NP90GYW_qJKNkfm5Zn12kF8tQ');
  error_reporting(0);

  $description = $result['items'][0]['snippet']['description'];
  $youtubeProfileLogo = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
  $channelName = $result['items'][0]['snippet']['title'];
  $subscribers = $result['items'][0]['statistics']['subscriberCount'];

  // latest video
  $urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCMHm9kJ2NP90GYW_qJKNkfm5Zn12kF8tQ&channelId='.$channelIdYt.'&maxResults=1&order=date&part=snippet';
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
    text-shadow: 2.5px 2.5px 2.5px rgba(0,0,0,0.8);
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
<div id="divTitle" class="title bg-white p-3" style="position: relative;">
  <button onclick="editTitle()" id="editTitleButton" type="button" class="btn text-light m-2 p-0" style="-webkit-filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.6)); position: absolute; right: 0; top: 0"><i class="fas fa-1x fa-edit"></i></button>
  <button type="button" id="saveTitleButton" class="btn text-light m-2 p-0" style="display: none; -webkit-filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.6)); position: absolute; right: 0; top: 0"><i class="fas fa-1x fa-save"></i></button>
  <span id="spanTitle"><?= $landing['title']; ?></span>
  <input style="display: none;" type="text" id="title" class="form-control" value="<?= $landing['title']; ?>">
</div>
<div class="bg-white pb-5 mb-5">
  <nav class="navbar navbar-expand-lg navbar-dark bg-white sticky-top">
    <div class="container">
      <div id="divNavbarBrand" style="position: relative;" class="border border-dark p-3 rounded">
        <button id="editNavbarBrandButton" data-toggle="modal" data-target="#editNavbarBrandModal" type="button" class="btn text-light m-2 p-0" style="-webkit-filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.6)); position: absolute; right: 0; top: 0"><i class="fas fa-1x fa-edit"></i></button>
        <a class="navbar-brand page-scroll" href="#page-top"><img src="<?= base_url('assets/img/img_navbar_brands/') . $landing['navbar_brand']; ?>" width="100" alt="logo"></a>
      </div>
      <button class="navbar-toggler bg-cofioly" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a style="color: #E19026" class="nav-link page-scroll" href="#page-top"><i class="fas fa-fw fa-home"></i> Beranda</a>
          </li>
          <li class="nav-item">
            <a style="color: #E19026" class="nav-link page-scroll" href="#about"><i class="fas fa-fw fa-user"></i> Tentang</a>
          </li>
          <li class="nav-item">
            <a style="color: #E19026" class="nav-link page-scroll" href="#social"><i class="fab fa-fw fa-facebook"></i> Sosial Media</a>
          </li>
          <li class="nav-item">
            <a style="color: #E19026" class="nav-link page-scroll" href="#gallery"><i class="fas fa-fw fa-image"></i> Galeri</a>
          </li>
          <li class="nav-item">
            <a style="color: #E19026" class="nav-link page-scroll" href="#contact"><i class="fas fa-fw fa-envelope"></i> Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="fluid-jumbotron py-5" style="position: relative; border: 1px black solid;">
    <div class="container">
      <div class="text-white text-shadow text-center">
        <button id="editJumbotronButton" data-toggle="modal" data-target="#editJumbotronModal" type="button" class="btn text-light m-2 p-0" style="-webkit-filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.6)); position: absolute; right: 0; top: 0;"><i class="fas fa-1x fa-edit"></i></button>
        <div id="divImgProfile" class="rounded p-1" style="position: relative; border: 1px black solid; width: 40%; text-align: center; margin: 0 auto;">
          <button id="editProfileButton" data-toggle="modal" data-target="#editProfileModal" type="button" class="btn text-light m-2 p-0 btnEditProfileImg"><i class="fas fa-1x fa-edit"></i></button>
          <img style="width: 75%" src="<?= base_url('assets/img/img_profiles/') . $landing['img_profile']; ?>" class="rounded-circle img-thumbnail">
        </div>
        <div id="divNamaBrand" class="my-2 rounded" style="position: relative; border: 1px black solid;">
          <button onclick="editNamaBrand()" id="editNamaBrandButton" type="button" class="btnEditNamaBrand btn text-light m-2 p-0"><i class="fas fa-1x fa-edit"></i></button>
          <button type="button" id="saveNamaBrandButton" class="btn text-light m-2 p-0 btnSaveNamaBrand" style="display: none;"><i class="fas fa-1x fa-save"></i></button>
          <h1 id="h1NamaBrand" class="w-400 display-4"><?= $landing['nama_brand']; ?></h1>
          <input type="text" id="nama_brand" class="inputNamaBrand form-control" value="<?= $landing['nama_brand']; ?>">
        </div>
        <div id="divTextInovatif" class="my-2 rounded" style="position: relative; border: 1px black solid;">
          <button onclick="editTextInovatif()" id="editTextInovatifButton" type="button" class="btnEditNamaBrand btn text-light m-2 p-0"><i class="fas fa-1x fa-edit"></i></button>
          <button type="button" id="saveTextInovatifButton" class="btn text-light m-2 p-0 btnSaveNamaBrand" style="display: none;"><i class="fas fa-1x fa-save"></i></button>
          <input type="text" id="text_inovatif" class="inputNamaBrand form-control" value="<?= $landing['text_inovatif']; ?>">
          <h3 id="h3TextInovatif" class="w-400 lead"><?= $landing['text_inovatif']; ?></h3>
        </div>
        <hr style="width: 10%; background-color: #E19026" class="text-center">
      </div>
    </div>
  </div>

  <!-- Tentang -->
  <section class="pt-4 about" id="about">
    <div class="container pt-4">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Tentang</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5 text-center-left">
          <div id="divTextBox1" class="border border-dark rounded" style="position: relative">
            <button onclick="editTextBox1()" id="editTextBox1Button" type="button" class="btnEditTextBox btn text-light m-2"><i class="fas fa-1x fa-edit"></i></button>
            <button type="button" id="saveTextBox1Button" class="btnSaveTextBox btn text-light m-2" style="display: none;"><i class="fas fa-1x fa-save"></i></button>
            <textarea style="display: none;" id="text_box_1" class="form-control" rows="10"><?= $landing['text_box_1']; ?></textarea>
            <p id="paragrafTextBox1"><?= $landing['text_box_1']; ?></p>
          </div>
        </div>
        <div class="col-md-5 text-center-left">
          <div id="divTextBox2" class="border border-dark rounded" style="position: relative">
            <button onclick="editTextBox2()" id="editTextBox2Button" type="button" class="btnEditTextBox btn text-light m-2"><i class="fas fa-1x fa-edit"></i></button>
            <button type="button" id="saveTextBox2Button" class="btnSaveTextBox btn text-light m-2" style="display: none;"><i class="fas fa-1x fa-save"></i></button>
            <textarea style="display: none;" id="text_box_2" class="form-control" rows="20"><?= $landing['text_box_2']; ?></textarea>
            <p id="paragrafTextBox2"><?= $landing['text_box_2']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sosial Media -->
  <section id="social" class="social bg-light">
    <div class="container pt-4">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Sosial Media</h2>
        </div>
      </div>
      <div class="owl-carousel owl-theme">
        <div class="row justify-content-center">
          <div class="col-12">
            <div id="divChannelIdYt" class="my-2 rounded" style="position: relative; border: 1px black solid;">
              <button onclick="editChannelIdYt()" id="editChannelIdYtButton" type="button" class="btnEditNamaBrand btn text-light m-2 p-0"><i class="fas fa-1x fa-edit"></i></button>
              <button type="button" id="saveChannelIdYtButton" class="btn text-light m-2 p-0 btnEditNamaBrand" style="display: none;"><i class="fas fa-1x fa-save"></i></button>
              <div class="form-group px-5 mx-auto">
                <label for="channel_id_yt">YouTube Channel Id</label>
                <input type="text" id="channel_id_yt" class="inputNamaBrand form-control" value="<?= $landing['channel_id_yt']; ?>">
                <h3 id="h3ChannelIdYt" class="w-400 lead"><?= $landing['channel_id_yt']; ?></h3>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="row my-2 text-center-left">
              <div class="col-md-4 mx-auto">
                <img style="text-align: center!important; margin: 0 auto;" src="<?= $youtubeProfileLogo; ?>" alt="logo channel" class="social_icon rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h4 class="my-2"><?= $channelName; ?></h4>
                <p><?= number_format($subscribers); ?> Subscribers.</p>
                <div class="g-ytsubscribe" data-channelid="<?= $channelIdYt; ?>" data-layout="default" data-count="default" data-theme="dark"></div>
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
        <div style="position: relative;" class="border border-dark rounded">
          <button id="editSosial MediaButton" data-toggle="modal" data-target="#editSosial MediaButtonModal" type="button" class="btn text-light" style="-webkit-filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.6)); position: absolute; right: 0; top: 0"><i class="fas fa-1x fa-edit"></i></button>
          <div class="row justify-content-center">
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
            <div class="col-1 text-center mx-auto">
              <div class="text-center mx-auto rounded-pill" style="height: 100%; width: 25%; background-color: rgba(0,0,0,1)"></div>
            </div>
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
          </div>
        </div>
        <div style="position: relative;" class="border border-dark rounded">
          <button id="editSosial MediaButton" data-toggle="modal" data-target="#editSosial MediaButtonModal" type="button" class="btn text-light" style="-webkit-filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.6)); position: absolute; right: 0; top: 0"><i class="fas fa-1x fa-edit"></i></button>
          <div class="row justify-content-center">
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
            <div class="col-1 text-center mx-auto">
              <div class="text-center mx-auto rounded-pill" style="height: 100%; width: 25%; background-color: rgba(0,0,0,1)"></div>
            </div>
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
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- gallery -->
  <section class="pt-4 gallery" id="gallery">
    <div class="container pt-4">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Galeri</h2>
        </div>
      </div>
      <div class="row justify-content-center my-2">
        <a href="<?= base_url('admin/gallery'); ?>"><i class="fas fa-fw fa-edit"></i></a>
        <?php foreach ($gallery as $dg): ?>
          <div class="col-lg-3 m-2 border border-dark rounded text-center p-2">
            <a href="<?= base_url('assets/img/img_galleries/') . $dg['img_gallery']; ?>" class="enlarge">
              <img src="<?= base_url('assets/img/img_galleries/') . $dg['img_gallery']; ?>" alt="coffee-shop" class="img-fluid width-200">
            </a>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>

  <!-- Kontak -->
  <section class="pt-4 contact bg-light" id="contact">
    <div class="border border-dark rounded container pt-4" style="position: relative;">
      <button id="editKontakButton" data-toggle="modal" data-target="#editKontakButtonModal" type="button" class="btn text-light" style="-webkit-filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.6)); position: absolute; right: 0; top: 0"><i class="fas fa-1x fa-edit"></i></button>
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Kontak</h2>
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
  <footer class="bg-cofioly text-white py-4">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <div class="border border-dark rounded" id="divFooter" style="position: relative;">
              <button onclick="editFooter()" id="editFooterButton" type="button" class="btnEditNamaBrand btn text-light m-2 p-0"><i class="fas fa-1x fa-edit"></i></button>
              <button type="button" id="saveFooterButton" class="btn text-light m-2 p-0 btnEditNamaBrand" style="display: none;"><i class="fas fa-1x fa-save"></i></button>
              <input type="text" id="footer" style="display: none;" class="form-control" value="<?= $landing['footer']; ?>">
              <p id="pFooter" class="text-white"><?= $landing['footer']; ?></p>
            </div>
          </div>
        </div>
      </div>
  </footer>
</div>

<div class="modal fade" id="editNavbarBrandModal" tabindex="-1" role="dialog" aria-labelledby="editNavbarBrandModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('landing/editNavbarBrand'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editNavbarBrandModalLabel">Ubah Navbar Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <a href="<?= base_url('assets/img/img_navbar_brands/'). $landing['navbar_brand']; ?>" class="enlarge" id="check_enlarge_navbar_brand">
              <img style="height: 150px; width: 100%" src="<?= base_url('assets/img/img_navbar_brands/'). $landing['navbar_brand']; ?>" id="check_navbar_brand" class="img-thumbnail" alt="Navbar Brand">
            </a>
          </div>
          <div><small>Click image to zoom</small></div>
          <div class="custom-file my-3">
            <input type="file" class="custom-file-input" id="img_navbar_brand" name="img_navbar_brand">
            <label for="img_navbar_brand" class="custom-file-label">Choose Navbar Brand Image</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editJumbotronModal" tabindex="-1" role="dialog" aria-labelledby="editJumbotronModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('landing/editJumbotron'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editJumbotronModalLabel">Ubah Jumbotron</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <a href="<?= base_url('assets/img/img_jumbotrons/'). $landing['img_jumbotron']; ?>" class="enlarge" id="check_enlarge_jumbotron">
              <img style="height: 150px; width: 100%" src="<?= base_url('assets/img/img_jumbotrons/'). $landing['img_jumbotron']; ?>" id="check_jumbotron" class="img-thumbnail" alt="Jumbotron">
            </a>
          </div>
          <div><small>Click image to zoom</small></div>
          <div class="custom-file my-3">
            <input type="file" class="custom-file-input" id="img_jumbotron" name="img_jumbotron">
            <label for="img_jumbotron" class="custom-file-label">Choose Jumbotron Image</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('landing/editProfile'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Ubah Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <a href="<?= base_url('assets/img/img_profiles/'). $landing['img_profile']; ?>" class="enlarge rounded-circle" id="check_enlarge_profile">
              <img style="height: 300px; width: 70%" src="<?= base_url('assets/img/img_profiles/'). $landing['img_profile']; ?>" id="check_profile" class="img-thumbnail rounded-circle" alt="profile">
            </a>
          </div>
          <div><small>Click image to zoom</small></div>
          <div class="custom-file my-3">
            <input type="file" class="custom-file-input" id="img_profile" name="img_profile">
            <label for="img_profile" class="custom-file-label">Choose Profile Image</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editSosial MediaButtonModal" tabindex="-1" role="dialog" aria-labelledby="editSosial MediaButtonModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('landing/editSosial Media'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSosial MediaButtonModalLabel">Ubah Sosial Media</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="fb_link"><i class="fab fa-fw fa-facebook"></i> Facebook Link</label>
            <input type="text" id="fb_link" class="form-control" value="<?= $landing['fb_link']; ?>" name="fb_link">
          </div>
          <div class="form-group">
            <label for="ig_link"><i class="fab fa-fw fa-instagram"></i> Instagram Link</label>
            <input type="text" id="ig_link" class="form-control" value="<?= $landing['ig_link']; ?>" name="ig_link">
          </div>
          <div class="form-group">
            <label for="twitter_link"><i class="fab fa-fw fa-twitter"></i> Twitter Link</label>
            <input type="text" id="twitter_link" class="form-control" value="<?= $landing['twitter_link']; ?>" name="twitter_link">
          </div>
          <div class="form-group">
            <label for="whatsapp_number"><i class="fab fa-fw fa-whatsapp"></i> No. Whatsapp</label>
            <input type="text" id="whatsapp_number" class="form-control" value="<?= $landing['whatsapp_number']; ?>" name="whatsapp_number">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="editKontakButtonModal" tabindex="-1" role="dialog" aria-labelledby="editKontakButtonModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('landing/editKontak'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editKontakButtonModalLabel">Ubah Kontak</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="contact_header"><i class="fas fa-fw fa-address-card"></i> Kontak Header</label>
            <textarea rows="5" id="contact_header" class="form-control" name="contact_header"><?= $landing['contact_header']; ?></textarea>
          </div>
          <div class="alert alert-info" role="alert">
            Untuk memisahkan header dengan isi gunakan tanda '>;' tanpa kutip.
          </div>
          <div class="form-group">
            <label for="my_location"><i class="fas fa-fw fa-map-marker-alt"></i> My Location</label>
            <textarea rows="5" id="my_location" class="form-control" name="my_location"><?= $landing['my_location']; ?></textarea>
          </div>
          <div class="alert alert-info" role="alert">
            Jika ingin menggunakan baris baru gunakan tanda '>;' tanpa kutip.
          </div>
          <div class="form-group">
            <label for="to_email"><i class="fas fa-fw fa-envelope"></i> To Email</label>
            <input type="text" id="to_email" class="form-control" value="<?= $landing['to_email']; ?>" name="to_email">
          </div>
          <div class="alert alert-info" role="alert">
            Formulir dikirim ke email.
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>



<script src="https://apis.google.com/js/platform.js"></script>





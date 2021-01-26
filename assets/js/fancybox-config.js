$(document).ready(function() {
  $(".enlarge").fancybox();
});

$('.custom-file-input').on('change', function() {
  let photo = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(photo);
});

function readPhoto(input) {
 if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#check_photo').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function enlargePhoto(a) {
 if (a.files && a.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#check_enlarge_photo').attr('href', e.target.result);
    }

    reader.readAsDataURL(a.files[0]);
  }
}

$("#photo").change(function(){
   readPhoto(this);
});

$("#photo").change(function(){
   enlargePhoto(this);
});


// -------------- Navbar Brand ----------------

function readNavbarBrand(input) {
 if (input.files && input.files[0]) {
    var reader2 = new FileReader();

    reader2.onload = function (e) {
      $('#check_navbar_brand').attr('src', e.target.result);
    }

    reader2.readAsDataURL(input.files[0]);
  }
}

function enlargeNavbarBrand(a) {
 if (a.files && a.files[0]) {
    var reader3 = new FileReader();

    reader3.onload = function (e) {
      $('#check_enlarge_banner_photo').attr('href', e.target.result);
    }

    reader3.readAsDataURL(a.files[0]);
  }
}

$("#img_navbar_brand").change(function(){
   readNavbarBrand(this);
});

$("#img_navbar_brand").change(function(){
   enlargeNavbarBrand(this);
});


// -------------- Jumbotron ----------------

function readJumbotron(input) {
 if (input.files && input.files[0]) {
    var reader4 = new FileReader();

    reader4.onload = function (e) {
      $('#check_jumbotron').attr('src', e.target.result);
    }

    reader4.readAsDataURL(input.files[0]);
  }
}

function enlargeJumbotron(a) {
 if (a.files && a.files[0]) {
    var reader5 = new FileReader();

    reader5.onload = function (e) {
      $('#check_enlarge_jumbotron').attr('href', e.target.result);
    }

    reader5.readAsDataURL(a.files[0]);
  }
}

$("#img_jumbotron").change(function(){
   readJumbotron(this);
});

$("#img_jumbotron").change(function(){
   enlargeJumbotron(this);
});

// -------------- Profile ----------------

function readProfile(input) {
 if (input.files && input.files[0]) {
    var reader6 = new FileReader();

    reader6.onload = function (e) {
      $('#check_profile').attr('src', e.target.result);
    }

    reader6.readAsDataURL(input.files[0]);
  }
}

function enlargeProfile(a) {
 if (a.files && a.files[0]) {
    var reader7 = new FileReader();

    reader7.onload = function (e) {
      $('#check_enlarge_profile').attr('href', e.target.result);
    }

    reader7.readAsDataURL(a.files[0]);
  }
}

$("#img_profile").change(function(){
   readProfile(this);
});

$("#img_profile").change(function(){
   enlargeProfile(this);
});

//  ---- add img gallery ---- 
function readAddImgGallery(input) {
 if (input.files && input.files[0]) {
    var reader8 = new FileReader();

    reader8.onload = function (e) {
      $('#check_add_img_gallery').attr('src', e.target.result);
    }

    reader8.readAsDataURL(input.files[0]);
  }
}


function enlargeAddImgGallery(a) {
 if (a.files && a.files[0]) {
    var reader9 = new FileReader();

    reader9.onload = function (e) {
      $('#check_enlarge_add_img_gallery').attr('href', e.target.result);
    }

    reader9.readAsDataURL(a.files[0]);
  }
}

$("#img_gallery").change(function(){
   readAddImgGallery(this);
});

$("#img_gallery").change(function(){
   enlargeAddImgGallery(this);
});

// ---------------same----------------
function readAddImgGallery(input) {
 if (input.files && input.files[0]) {
    var reader8 = new FileReader();

    reader8.onload = function (e) {
      $('.check_add_img_gallery').attr('src', e.target.result);
    }

    reader8.readAsDataURL(input.files[0]);
  }
}


function enlargeAddImgGallery(a) {
 if (a.files && a.files[0]) {
    var reader9 = new FileReader();

    reader9.onload = function (e) {
      $('.check_enlarge_add_img_gallery').attr('href', e.target.result);
    }

    reader9.readAsDataURL(a.files[0]);
  }
}

$(".img_gallery").change(function(){
   readAddImgGallery(this);
});

$(".img_gallery").change(function(){
   enlargeAddImgGallery(this);
});

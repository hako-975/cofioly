// Get the input field
var input = document.getElementById("password");

// Get the warning text
var text = document.getElementById("text");


// When the user presses any key on the keyboard, run the function
input.addEventListener("keyup", function(event) {

  // If "caps lock" is pressed, display the warning text
  if (event.getModifierState("CapsLock")) {
    text.style.display = "block";
  } else {
    text.style.display = "none"
  }
});


$(document).ready(function() {
  $("#show_hide_password a").on('click', function(event) {
      event.preventDefault();
      if($('#show_hide_password input').attr("type") == "text"){
          $('#show_hide_password input').attr('type', 'password');
          $('#icon_eye').addClass("fa-eye-slash");
          $('#icon_eye').removeClass("fa-eye");
      }else if($('#show_hide_password input').attr("type") == "password"){
          $('#show_hide_password input').attr('type', 'text');
          $('#icon_eye').removeClass("fa-eye-slash");
          $('#icon_eye').addClass("fa-eye");
      }
  });
});


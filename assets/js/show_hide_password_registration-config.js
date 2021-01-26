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
          $('#icon_eye1').addClass( "fa-eye-slash" );
          $('#icon_eye1').removeClass( "fa-eye" );
      }else if($('#show_hide_password input').attr("type") == "password"){
          $('#show_hide_password input').attr('type', 'text');
          $('#icon_eye1').removeClass( "fa-eye-slash" );
          $('#icon_eye1').addClass( "fa-eye" );
      }
  });
});


var input2 = document.getElementById("password_verify");
var text2 = document.getElementById("text2");
// When the user presses any key on the keyboard, run the function
input2.addEventListener("keyup", function(event2) {

  // If "caps lock" is pressed, display the warning text
  if (event2.getModifierState("CapsLock")) {
    text2.style.display = "block";
  } else {
    text2.style.display = "none"
  }
});

$(document).ready(function() {
  $("#show_hide_password_verify a").on('click', function(event) {
      event.preventDefault();
      if($('#show_hide_password_verify input').attr("type") == "text"){
          $('#show_hide_password_verify input').attr('type', 'password');
          $('#icon_eye2').addClass( "fa-eye-slash" );
          $('#icon_eye2').removeClass( "fa-eye" );
      }else if($('#show_hide_password_verify input').attr("type") == "password"){
          $('#show_hide_password_verify input').attr('type', 'text');
          $('#icon_eye2').removeClass( "fa-eye-slash" );
          $('#icon_eye2').addClass( "fa-eye" );
      }
  });
});
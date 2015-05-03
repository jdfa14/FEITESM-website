
function start(){
    gapi.load('auth2', function() {
    auth2 = gapi.auth2.init({
      client_id: '835887866066-fu7u5crj9gtpk5d7doe785qqlpnob0ob.apps.googleusercontent.com',
    });
  });
}

function signIn(){
  $('#signinButton').click(function() {
    // signInCallback defined in step 6.
    auth2.grantOfflineAccess({'http://localhost/feitesm-website/index.html': 'postmessage'}).then(signInCallback);
  });
}

function signInCallback(authResult) {
  if (authResult['code']) {

    // Hide the sign-in button now that the user is authorized, for example:
    $('#signinButton').attr('style', 'display: none');

    // Send the code to the server
    $.ajax({
      type: 'POST',
      url: 'http://localhost/kaka.php',
      contentType: 'application/octet-stream; charset=utf-8',
      success: function(result) {
        // Handle or verify the server response.
      },
      processData: false,
      data: authResult['code']
    });
  } else {
    // There was an error.
  }
}
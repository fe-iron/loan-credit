const config = {
  apiKey: "AIzaSyBo8-sCXefSEqgxJrLxlStMhivuyOday8w",
  authDomain: "eazycreditsolution-248d9.firebaseapp.com",
  projectId: "eazycreditsolution-248d9",
  storageBucket: "eazycreditsolution-248d9.appspot.com",
  messagingSenderId: "918145364668",
  appId: "1:918145364668:web:128e1731b0c402ba3616b9",
  measurementId: "G-PH9QZKYFQ7"
};

//console.log('Anurag');
firebase.initializeApp(config)

window.onload = function () {
  render()
  document.getElementById('verificationCode').style.display = 'none'
  
}
function render() {
  window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
    'recaptcha-container',
    {
      size: 'invisible',
      callback: (response) => {
        // reCAPTCHA solved, allow signInWithPhoneNumber.
        onSignInSubmit()
      },
    }
  )
}

function send_otp() {
  var number = document.getElementById('mob').value;

  number = '+91' + number;

  if (number.length < 13 || number.length > 13) {
    alert(" Don't include +91 or 0, Mobile Number should be 10 digits long!");
  } else {
    document.getElementById('verificationCode').style.display = 'block';
    document.getElementById('verify').style.display = 'block';
    document.getElementById('get-otp').style.display = 'none';
    
    firebase 
      .auth()
      .signInWithPhoneNumber(number, recaptchaVerifier)
      .then((confirmationResult) => {
        // SMS sent. Prompt user to type the code from the message, then sign the
        // user in with confirmationResult.confirm(code).
        window.confirmationResult = confirmationResult
        codeResult = confirmationResult
        // console.log(codeResult);
        alert('message sent check your phone!')
      })
      .catch((error) => {
        // Error; SMS not sent
        // ...
        document.getElementById('msg').innerHTML =
          'Enter only 10 digit Number without +91'
        console.log(error);
      })
  }
}

function codeVerify() {
  var otp = document.getElementById('verificationCode').value
  codeResult
    .confirm(otp)
    .then((result) => {
      // User signed in successfully.
      const user = result.user;
      
    })
    .catch((error) => {
      // User couldn't sign in (bad verification code?)
      // ...
      document.getElementById('msg').innerHTML =
        'Something went wrong! Try again'
    })
}
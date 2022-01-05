<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sliding Login & Signup Forms - HTML, CSS & Javascript</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../../../public/css/signin-signup.css">
  </head>
  <body>
    <div class="form-container sign-in-form">
      <div class="form-box sign-in-box">
        <h2>Login</h2>
        <form action="">
          <div class="field">
            <i class="uil uil-at"></i>
            <input type="email" placeholder="Email ID" required>
          </div>
          <div class="field">
            <i class="uil uil-lock-alt"></i>
            <input type="password" placeholder="Password" id="input-pass" required>
            <div class="btn-eye">
              <i class="uil uil-eye-slash"></i>
            </div>
          </div>
          <div class="forgot-link">
            <a href="#">Forgot password?</a>
          </div>
          
          <input type="submit" value="Login" class="submit-btn">
        </form>

        <div class="login-options">
          <p class="text-option">Or, login with...</p>
          <div class="others-option">
            <a href=""><img src="../../../public/img/facebook.png" alt=""></a>
            <a href=""><img src="../../../public/img/apple.png" alt=""></a>
            <a href=""><img src="../../../public/img/google.png" alt=""></a>
          </div>
        </div>
      </div>
      <div class="img-box sign-in-imgBox">
        <div class="sliding-link">
          <p>Don't have an account?</p>
          <span class="sign-up-btn">Sign up</span>
        </div>
        <img src="../../../public/img/signin-img.png" alt="">
      </div>
    </div>


    <div class="form-container sign-up-form">
      <div class="img-box sign-up-imgBox">
        <div class="sliding-link">
          <p>Already member?</p>
          <span class="sign-in-btn">Sign in</span>
        </div>
        <img src="../../../public/img/signup-img.png" alt="">
      </div>
      <div class="form-box sign-up-box">
        <h2>Sign Up</h2>
        <form action="">
          <div class="login-options">
            <div class="others-option">
              <a href=""><img src="../../../public/img/facebook.png" alt=""></a>
              <a href=""><img src="../../../public/img/apple.png" alt=""></a>
              <a href=""><img src="../../../public/img/google.png" alt=""></a>
            </div>
            <p class="text-option">Or, sign up with email...</p>
          </div>
          <div class="field">
            <i class="uil uil-at"></i>
            <input type="email" placeholder="Email ID" required>
          </div>
          <div class="field">
            <i class="uil uil-english-to-chinese"></i>
            <input type="text" placeholder="Full name" required>
          </div>
          <div class="field">
            <i class="uil uil-lock-alt"></i>
            <input type="password" placeholder="Password" id="input-pass" required>
            <div class="btn-eye">
              <i class="uil uil-eye-slash"></i>
            </div>
          </div>
          <div class="field">
            <i class="uil uil-lock-access"></i>
            <input type="password" placeholder="Confirm password" id="input-pass" required>
            <div class="btn-eye">
              <i class="uil uil-eye-slash"></i>
            </div>
          </div>
          <div class="forgot-link">
            <a href="#">Forgot password?</a>
          </div>
          
          <input type="submit" value="Sign up" class="submit-btn">
        </form>
      </div>
    </div>
  </body>
  <script>
    const inputPass = document.querySelector('#input-pass');
    const btnEye = document.querySelector('.btn-eye');
    const fieldsInput = document.querySelectorAll('input');
    const signUpBtn = document.querySelector('.sign-up-btn');
    const signInBtn = document.querySelector('.sign-in-btn');
    const formSignUp = document.querySelector('.sign-up-form');
    const formSignIn = document.querySelector('.sign-in-form');


    signUpBtn.onclick = function() {
      formSignIn.classList.remove('show')
      formSignIn.classList.add('hide')
      formSignUp.classList.add('show')
    }
    signInBtn.onclick = function() {
      formSignIn.classList.remove('hide')
      formSignUp.classList.remove('show')
      formSignIn.classList.add('show')
    }
    
    btnEye.onclick = function() {
      if(inputPass.type === 'password') {
        inputPass.type = 'text';
        btnEye.innerHTML = '<i class="uil uil-eye"></i>'
      } else{
        inputPass.type = 'password';
        btnEye.innerHTML = '<i class="uil uil-eye-slash"></i>'
      }
    }

    fieldsInput.forEach(c => c.addEventListener('focus', function() {
      c.parentNode.classList.add('active');
    }))

    fieldsInput.forEach(c => c.addEventListener('blur', function() {
      c.parentNode.classList.remove('active');
    }))
  </script>
</html>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sliding Login & Signup Forms - HTML, CSS & Javascript</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../../../public/css/signin-signup.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>

  <?php if(!isset($_GET['action'])) {?>
      <?php get_404();?>
  <?php } else {?>
    <!--SIGN IN  -->
    <div class="form-container sign-in-form <?=(isset($_GET['action']) && $_GET['action'] == 'login' || $_GET['action'] == 'index') ? 'show' : 'hide'?>">
      <div class="form-box sign-in-box">
        <h2>Login</h2>
        <form action="?mod=user&action=login" method="POST" id="sign-in-form">
          <div class="field">
            <i class="uil uil-at"></i>
            <input type="email" placeholder="Email ID" value="<?=isset($email) ? $email : ''?>" name="email" required>
          </div>
          <div class="field">
            <i class="uil uil-lock-alt"></i>
            <input type="password" placeholder="Password" name="password" id="input-pass" required>
            <div class="btn-eye">
              <i class="uil uil-eye-slash"></i>
            </div>
          </div>
          <div class="message-box">
            <p><?=isset($wrong) ? $wrong : '' ?></p>
            <p><?=isset($not_exist) ? $not_exist : '' ?></p>
            <p><?=isset($not_verified) ? $not_verified : ''?></p>
          </div>
          <div class="forgot-link">
            <a href="#">Forgot password?</a>
          </div>
          <input type="submit" name="login" value="Login" class="submit-btn" id="btn-signin">
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

    <!-- SIGN UP  -->
    <div class="form-container sign-up-form <?=(isset($_GET['action']) && $_GET['action'] == 'signup') ? 'show' : 'hide'?>">
      <div class="img-box sign-up-imgBox">
        <div class="sliding-link">
          <p>Already member?</p>
          <span class="sign-in-btn">Sign in</span>
        </div>
        <img src="../../../public/img/signup-img.png" alt="">
      </div>
      <div class="form-box sign-up-box">
        <h2>Sign Up</h2>
        <form action="?mod=user&action=signup" method="POST" id="sign-up-form">
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
            <input type="email" placeholder="Email ID" name="email" id="inp-email" value="<?=isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
          </div>
          <div class="field">
            <i class="uil uil-english-to-chinese"></i>
            <input type="text" placeholder="Full name" name="fullname" id="inp-fullname" value="<?=isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>" required>
          </div>
          <div class="field">
            <i class="uil uil-lock-alt"></i>
            <input type="password" placeholder="Password" id="input-pass" class="inp-pass" name="password" required>
          </div>
          <div class="field">
            <i class="uil uil-lock-access"></i>
            <input type="password" placeholder="Confirm password" id="input-pass" class="confirm-pass" name="confirm-password" required>
          </div>

          <div class="message-box">
            <p><?=isset($error_pass) ? $error_pass : ''?></p>
            <p class="invalid-user"><?=isset($invalid_user) ? $invalid_user : ''?></p>
          </div>
          <div class="forgot-link">
            <a href="#">Forgot password?</a>
          </div>
          
          <input type="submit" value="Sign up" name="sign-up" class="submit-btn" id="btn-signup">
        </form>
      </div>
    </div>
  <?php }?>
  </body>
  <script src="../../../public/js/user.js"></script>
</html>


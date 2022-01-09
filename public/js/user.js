    const inputPass = document.querySelector('#input-pass');
    const btnEye = document.querySelector('.btn-eye');
    const fieldsInput = document.querySelectorAll('input');
    const signUpBtn = document.querySelector('.sign-up-btn');
    const signInBtn = document.querySelector('.sign-in-btn');
    const formSignUp = document.querySelector('.sign-up-form');
    const formSignIn = document.querySelector('.sign-in-form');
    const btnSignIn = document.querySelector('#btn-signin');
    const btnSignUp = document.querySelector('#btn-signup');
    const signIn = document.querySelector('#sign-in-form');
    const signUp = document.querySelector('#sign-up-form');

    const inpMail = document.querySelector('#inp-email');
    const inpName = document.querySelector('#inp-fullname');
    const inpPass = document.querySelector('.inp-pass');
    const inpConfirmPass = document.querySelector('.confirm-pass');
    const invalidUser = document.querySelector('.invalid-user');

    //TODO Show SweetAlert  when sign in & sign up 
    btnSignUp.addEventListener('click', function(e) {
      if(inpMail.value != '' && inpName.value != '' && inpPass.value != '' && inpConfirmPass.value != '' && inpConfirmPass.value == inpPass.value ) {
        Swal.fire({
            icon: 'success',
            title: 'Thông báo!',
            text: 'Mã xác nhận đã được gửi tới mail của bạn. Hãy xác thực mail để tiếp tục đăng nhập!',
            showConfirmButton: false
        })
        setTimeout(function() {
            signUp.submit();
        }, 3000);
      }
    })

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
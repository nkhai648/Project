<?php get_header(); ?>
 <main class="bd-container section" id="user-profile">
    <div class="main-profile">
        <h2>Hồ sơ người dùng</h2>
        <form action="?mod=user&action=updateProfile" method="POST" class="profile-form">
            <div class="field">
                <span>Họ và tên:</span>
                <input type="text" value="<?=$get_user['full_name']?>" name="full_name" required>
            </div>
            <div class="field">
                <span>Email:</span>
                <input type="email" disabled value="<?=$get_user['email']?>" id="email-profile">
            </div>
            <div class="field field-pass-main">
                <span>Mật khẩu:</span>
                <div class="field-pass">
                    <input type="password" value="<?=$get_user['password']?>" name="password" id="pass-profile" required>
                    <i class='bx bx-show'></i>
                </div>
            </div>
            <div class="field">
                <span>Trạng thái: </span>
                <span>Đã xác thực.</span>
            </div>
            <div class="field">
                <span>Đăng ký lúc: </span>
                <span><?=$get_user['created_at']?>.</span>
            </div>
            <input type="text" hidden name="id_user" value="<?=$get_user['id_user']?>">
            <button class="btn" id="btn-profile" name="update" type="submit">Lưu hồ sơ</button>
        </form>
    </div>
 </main>
<script>
    const inpPass = document.querySelector('#pass-profile');
    const eyeBtn = document.querySelector('.field-pass i');

    eyeBtn.onclick = function() {
        if(inpPass.type == 'password') {
            inpPass.type = 'text'
            eyeBtn.classList.remove('bx-show')
            eyeBtn.classList.add('bx-hide')
        } else {
            inpPass.type = 'password'
            eyeBtn.classList.remove('bx-hide')
            eyeBtn.classList.add('bx-show')
        }
    }
</script>
<?php get_footer(); ?>
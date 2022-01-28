<?php get_header('pay'); ?>
 <main class="bd-container section" id="user-profile">
    <div class="main-profile">
        <h2>Profile User</h2>
        <form action="?mod=user&action=updateProfile" method="POST" class="profile-form" enctype="multipart/form-data">
            <div class="container-file">
                <div class="wrapper">
                    <div class="image">
                        <img id="imgHere" src="../../../public/upload/<?=$get_user['img']?>">
                        <input type="text" hidden name="img-user" id="name-img-product" value="<?=$get_user['img']?>">
                    </div>
                    <div class="content">
                        <div class="icon">
                            <i class='bx bxs-cloud-upload'></i>
                        </div>
                        
                        <div class="text">
                            No file chosen, yet!
                        </div>
                    </div>
                </div>
                <a onclick="defaultBtnActive()" id="custom-btn">Choose a avatar</a>
                <input id="default-btn" type="file" name="file" hidden>
            </div>
            <div class="field">
                <span>Full name:</span>
                <input type="text" value="<?=$get_user['full_name']?>" name="full_name" required>
            </div>
            <div class="field">
                <span>Email:</span>
                <input type="email" disabled value="<?=$get_user['email']?>" id="email-profile">
            </div>
            <div class="field field-pass-main">
                <span>Password:</span>
                <div class="field-pass">
                    <input type="password" value="<?=$get_user['password']?>" name="password" id="pass-profile" required>
                    <i class='bx bx-show'></i>
                </div>
            </div>
            <div class="field">
                <span>State: </span>
                <span>Verifired.</span>
            </div>
            <div class="field">
                <span>Sign up in: </span>
                <span><?=$get_user['created_at']?>.</span>
            </div>
            <input type="text" hidden name="id_user" value="<?=$get_user['id_user']?>">
            <button class="btn" id="btn-profile" name="update" type="submit">Save profile</button>
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
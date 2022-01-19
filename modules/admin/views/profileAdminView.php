<?php get_sidebar('admin');?>
<main class="profile-main">
    <form action="?mod=admin&action=updateProfileAdmin" method="POST" class="form-profile" enctype="multipart/form-data">
        <div class="mb-2 container-file container-profile-admin">
            <div class="wrapper wrapper-profile">
                <div class="image">
                    <img id="imgHere" src="../../../public/img/<?=$get_admin['img']?>">
                    <input type="text" hidden name="img-admin" id="name-img-product" value="<?=$get_admin['img']?>">
                </div>

                <div class="file-name">
                    File name here
                </div>
            </div>

            <a onclick="defaultBtnActive()" id="custom-btn">Choose a avatar</a>
            <input id="default-btn" type="file" name="file" hidden>
        </div>
        <div class="mb-2" style="margin-top: 3.5rem;">
            <label for="formGroupExampleInput" class="form-label">Name Admin:</label>
            <input type="text" name="name-admin" value="<?=$get_admin['full_name']?>" class="form-control" id="formGroupExampleInput">
        </div>
        <div class="mb-2">
            <label for="formGroupExampleInput" class="form-label">Email Admin:</label>
            <input type="text" name="email-admin" value="<?=$get_admin['email']?>" class="form-control" id="formGroupExampleInput">
        </div>
        <div class="mb-2">
            <label for="formGroupExampleInput" class="form-label">Password Admin:</label>
            <input type="text" name="password-admin" value="<?=$get_admin['password']?>" class="form-control" id="formGroupExampleInput">
        </div>
        <div>
            <label for="formGroupExampleInput" class="form-label">Admin's Position:</label>
            <span><?=$get_admin['permission'] == 'admin' ? 'Manager' : ''?></span>
        </div>
        <div class="mb-2">
            <label for="formGroupExampleInput" class="form-label">Created at:</label>
            <span><?=$get_admin['created_at']?></span>
        </div>
        <input type="text" hidden name="id-admin" value="<?=$get_admin['id_user']?>">
        <button type="submit" class="btn" name="save-profile">Save Profile</button>
        
    </form>
</main>

<?php get_footer('admin');?>
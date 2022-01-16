<!-- <?php show_array($get_product);?> -->
<?php get_sidebar('admin')?>
    <main class="edit container mt-3 pb-4">
        <h2 class="text-center mb-4 mt-4">Edit Product</h2>
        <form action="?mod=admin&action=update" method="POST" enctype="multipart/form-data" id="form-edit-product">
            <div class="container-file">
                <label class="form-label">Image product:</label>
                <div class="wrapper">
                    <div class="image">
                        <img id="imgHere" src="../../../public/img/<?=$get_product['img']?>">
                        <input type="text" hidden name="img-product" id="name-img-product" value="<?=$get_product['img']?>">
                    </div>

                    <div class="content">
                        <div class="icon">
                            <i class='bx bxs-cloud-upload'></i>
                        </div>
                        
                        <div class="text">
                            No file chosen, yet!
                        </div>
                    </div>

                    <!-- <div id="cancel-btn">
                        <i class='bx bx-x'></i>
                    </div> -->
                    <div class="file-name">
                        File name here
                    </div>
                </div>

                <a onclick="defaultBtnActive()" id="custom-btn">Choose a file</a>
                <input id="default-btn" type="file" name="file" hidden>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Name product:</label>
                <input type="text" name="name-product" value="<?=$get_product['name']?>" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Price product:</label>
                <input type="text" name="price-product" value="<?=$get_product['price']?>" class="form-control" id="formGroupExampleInput2">
            </div>
            <div class="mb-3">
                <label for="des" class="form-label">Description product:</label>
                <textarea name="des-product" class="form-control" id="des" cols="30" rows="7"><?=$get_product['des']?></textarea>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content product:</label>
                <textarea name="content-product" class="form-control" id="content" cols="30" rows="7"><?=$get_product['content']?></textarea>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Region product:</label>
                <select name="region-option" id="inputState" class="form-select">
                    <option disabled>Choose once region</option>
                    <option value="1" <?=$get_product['region_id'] == 1 ? 'selected' : '' ?> >Miền Bắc</option>
                    <option value="2" <?=$get_product['region_id'] == 2 ? 'selected' : '' ?> >Miền Trung</option>
                    <option value="3" <?=$get_product['region_id'] == 3 ? 'selected' : '' ?> >Miền Nam</option>
                </select>
            </div>
            <input type="text" hidden name="id" value="<?=$get_product['id']?>">
            <button type="submit" class="btn-edit" id="btn-edit-product" name="save-edit" onclick="trimText()">Save</button>
        </form>
    </main>

<script>

    function trimText() {
        document.querySelector('#des').value.trim()
        document.querySelector('#content').value.trim()
    }
</script>
<?php get_footer('admin')?>
<?php get_sidebar('admin') ?>

<main class="edit container mt-3 pb-4">
        <h2 class="text-center">Add Product</h2>
        <form action="?mod=admin&action=addProduct" method="POST" enctype="multipart/form-data" id="form-add-product">
            <div class="container-file">
                <label class="form-label">Image product:</label>
                <div class="wrapper">
                    <div class="image">
                        <img id="imgHere" src="">
                        <input type="text" hidden name="img-product" id="name-img-product" value="" required>
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
                <input type="text" name="name-product" value="" class="form-control" id="formGroupExampleInput" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Price product:</label>
                <input type="text" name="price-product" value="" class="form-control" id="formGroupExampleInput2" required>
            </div>
            <div class="mb-3">
                <label for="des" class="form-label">Description product:</label>
                <textarea name="des-product" class="form-control" id="des" cols="30" rows="7" required></textarea>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content product:</label>
                <textarea name="content-product" class="form-control" id="content" cols="30" rows="7" required></textarea>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Region product:</label>
                <select name="region-option" id="inputState" class="form-select">
                    <option disabled selected>Choose once region</option>
                    <option value="1">Miền Bắc</option>
                    <option value="2">Miền Trung</option>
                    <option value="3">Miền Nam</option>
                </select>
            </div>
            <button type="submit" class="btn-edit" id="btn-add-product" name="add" onclick="trimText()">Add</button>
        </form>
    </main>

<script>

    function trimText() {
        document.querySelector('#des').value.trim()
        document.querySelector('#content').value.trim()
    }
</script>

<?php get_footer('admin') ?>
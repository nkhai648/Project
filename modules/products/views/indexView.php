<?php get_header('products'); ?>
<main class="l-main">
    <div class="bd-grid bd-container main-products ">
        <div class="main-menu">
            <h3 class="title-products__menu">Đặc sản vùng miền</h3>
            <ul class="main-menu__list">
                <?php foreach($list_regions as $value) {?>
                    <li class="main-menu__item">
                        <a href="?mod=products&action=sortProducts&id=<?=$value['id']?>" class="main-menu__link <?= isset($_GET['id']) && $_GET['id'] === $value['id'] ? "active" : "" ?>"><?=$value['region_name']?></a>
                    </li>
                <?php }?>
            </ul>
        </div>
        <div class="view-products">
            <form action="?mod=products&action=search" method="post">
                <div class="search-products">
                    <div class="grid-search">
                        <input type="text" placeholder="Nhập tên sản phẩm..." name="search-product" value="<?= isset($_POST['search-product']) ? $name : '' ?>">
                        <button type="submit">
                            <i class='bx bx-search'></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="list-products bd-grid">
                <?php if(isset($_GET['id'])) { ?>
                    <?php foreach($option_products as $value) {?>
                        <div class="card">
                            <a href="?mod=products&action=detail&id=<?=$value['id']?>">
                                <img src="../../../public/img/<?=$value['img']?>" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="?mod=products&action=detail&id=<?=$value['id']?>">
                                    <h5 class="card-title"><?=$value['name']?></h5>
                                </a>
                                <p class="card-text"><span><?=formatPrice($value['price'])?></span></p>

                                <div class="rate">
                                    <i class='bx bx-heart favorite-food' ></i>
                                    <ul class="vote">
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li>Đã bán 7,5k</li>
                                    </ul>
                                </div>
                                <a href="?mod=products&action=cart&id=<?=$value['id']?>" class="btn btn-primary add-cart-product"><i class='bx bx-cart-alt' ></i></a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else if(isset($_GET['action']) && $_GET['action'] == 'search') {?>
                    <?php if($result_search == null) {?>
                        <div class="search-null">
                            <img src="../../../public/img/search-null.jpg" class="img-search-null" alt="">
                            <h3>Không tìm thấy kết quả. Vui lòng nhập lại!</h3>
                        </div>
                    <?php }else {?>
                        <?php foreach($result_search as $value) {?>
                            <div class="card">
                                <a href="?mod=products&action=detail&id=<?=$value['id']?>">
                                    <img src="../../../public/img/<?=$value['img']?>" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <a href="?mod=products&action=detail&id=<?=$value['id']?>">
                                        <h5 class="card-title"><?=$value['name']?></h5>
                                    </a>
                                    <p class="card-text"><span><?=formatPrice($value['price'])?></span></p>

                                    <div class="rate">
                                        <i class='bx bx-heart favorite-food' ></i>
                                        <ul class="vote">
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li>Đã bán 7,5k</li>
                                        </ul>
                                    </div>
                                    <a href="?mod=products&action=cart&id=<?=$value['id']?>" class="btn btn-primary add-cart-product"><i class='bx bx-cart-alt' ></i></a>
                                </div>
                            </div>
                        <?php } ?>
                    <?php }?>
                <?php } else {?>
                    <?php foreach($products as $value) {?>
                        <div class="card">
                            <a href="?mod=products&action=detail&id=<?=$value['id']?>">
                                <img src="../../../public/img/<?=$value['img']?>" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <a href="?mod=products&action=detail&id=<?=$value['id']?>">
                                    <h5 class="card-title"><?=$value['name']?></h5>
                                </a>
                                <p class="card-text"><span><?=formatPrice($value['price'])?></span></p>

                                <div class="rate">
                                    <i class='bx bx-heart favorite-food' ></i>
                                    <ul class="vote">
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li><i class='bx bxs-star'></i></li>
                                        <li>Đã bán 7,5k</li>
                                    </ul>
                                </div>
                                <a href="?mod=products&action=cart&id=<?=$value['id']?>" class="btn btn-primary add-cart-product"><i class='bx bx-cart-alt' ></i></a>
                            </div>
                        </div>
                    <?php } ?>
                <?php }?>
            </div>
        </div>
    </div>
    <?php if(isset($_GET['action']) && $_GET['action'] == 'sortProducts') {?>
        <?php require("paggingRegionView.php"); ?>
    <?php }?>
    <?php if(isset($_GET['action']) && $_GET['action'] == 'index') {?>
        <?php require("paggingView.php"); ?>
    <?php }?>
</main>


<?php get_footer() ?>
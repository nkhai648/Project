<?php get_header('products') ?>
<main class="bd-container bd-container__detail-product">
    <form action="?mod=cart&controller=index&action=add" method="POST">
        <div class="main-details bd-grid">
            <div class="image-detail">
                <img src="../../../public/img/<?=$detail_product['img']?>" alt="">

                <div class="share-socials">
                    <ul>
                        <li>Chia sẻ:</li>
                        <li><i class='bx bxl-facebook-circle'></i></li>
                        <li><i class='bx bxl-messenger'></i></li>
                        <li><i class='bx bxl-pinterest' ></i></li>
                        <li><i class='bx bxl-twitter' ></i></li>
                    </ul>

                    <div class="add-love">
                        <i class='bx bx-heart favorite-food' ></i>
                        <span>Đã thích (19,3k)</span>
                    </div>
                </div>
            </div>
            <div class="detail-data">
                <span class="title-detail"><?=$detail_product['name']?></span>
                <ul class="list-data__rate">
                    <li class="rate-star">
                        <span>4.9</span> 
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </li>
                    <li class="rate-evaluate">
                        <label>17,7K </label><span> Đánh giá</span>
                    </li>
                    <li class="rate-sell">
                        <label>40,2K <span>Đá bán</span></label>
                    </li>
                </ul>
                <span class="data-price"><?=formatPrice($detail_product['price'])?></span>
                <div class="voucher">
                    <label>Mã giảm giá của shop</label>
                    <ul>
                        <li>Giảm ₫5K</li>
                        <li>Giảm ₫5K</li>
                        <li>Giảm ₫5K</li>
                        <li>Giảm ₫5K</li>
                    </ul>
                </div>

                <div class="data-deal">
                    <label>Deal sốc</label>
                    <span>Mua kèm deal sốc</span>
                </div>

                <div class="data-ship">
                    <label>Vận chuyển</label>
                    <ul>
                        <li>
                            <img src="../../../public/img/ship.png" alt="">
                            Miễn phí vận chuyển
                        </li>
                        <li>Miên phí vận chuyển cho đơn hàng trên ₫50.000</li>
                    </ul>
                </div>

                <div class="data-num__order">
                    <span>Số lượng:</span>
                    <div>
                        <span class="btn-number btn number-decrement" onclick="changeNumOrder('num-order-<?=$detail_product['id']?>', -1)">-</span>
                        
                        <input class="input-number" id="num-order-<?=$detail_product['id']?>" type="text" name="num-order" value="1" min="1" max="99">
                        
                        <span class="btn-number btn number-increment" onclick="changeNumOrder('num-order-<?=$detail_product['id']?>', 1)">+</span>

                        <input type="text" hidden name="id" value="<?=$detail_product['id']?>">

                        <button type="submit" class="btn">Thêm giỏ hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="data-text">
        <div class="data-desciption">
            <span>mô tả sản phẩm</span>
            <p><?=$detail_product['des']?></p>
        </div>

        <div class="data-highlight">
            <span>Chi tiết sản phẩm</span>
            <p><?=$detail_product['content']?></p>
        </div>
    </div>
</main>
<?php  get_footer() ?>
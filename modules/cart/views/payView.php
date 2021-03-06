<?php get_header('pay'); ?>
<?php  
    $cart_info = isset($_SESSION['cart']['info']) ? $_SESSION['cart']['info'] : ''; 
    $list_cart = isset($_SESSION['cart']['buy']) ? $_SESSION['cart']['buy'] : ''; 
?>
<div id="main-content-wp" class="checkout-page bd-container">
    <div class="wp-inner clearfix">
        <div id="content" class="fl-right">
            <div class="section" id="checkout-wp">
                <div class="section-head">
                    <h3 class="section-title pay-title">Payment</h3>
                </div>
                <div class="section-detail">
                    <div class="wrap clearfix">
                        <form action="?mod=cart&action=checkout" method="POST" id="form-pay">
                            <div id="custom-info-wp" class="fl-left">
                                <h3 class="title">Customer information</h3>
                                <div class="detail">
                                    <div class="field-wp">
                                        <label>Fullname <span>*</span></label>
                                        <input type="text" name="fullname" id="fullname" class="vali-inp"  required>
                                    </div>
                                    <div class="field-wp">
                                        <label>Email <span>*</span></label>
                                        <input type="email" name="email" id="email" class="vali-inp"  required>
                                    </div>
                                    <div class="field-wp">
                                        <label>Delivery address <span>*</span></label>
                                        <input type="text" name="address" id="address" class="vali-inp"  required>
                                    </div>
                                    <div class="field-wp">
                                        <label>Phone number <span>*</span></label>
                                        <input type="text" name="tel" id="tel" class="vali-inp"  required>
                                    </div>
                                    <div class="field-full-wp">
                                        <label>Note</label>
                                        <textarea name="note"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div id="order-review-wp" class="fl-right">
                                <h3 class="title">Infomation bill</h3>
                                <div class="detail">
                                    <table class="shop-table">
                                        <thead>
                                            <tr>
                                                <td>Product(<?=$cart_info['total_num_order']?>)</td>
                                                <td>Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($list_cart as $value) {?>
                                                <tr class="cart-item">
                                                    <td class="product-name"><?=$value['name']?><strong class="product-quantity">x
                                                        <?=$value['quantity']?>
                                                    </strong></td>
                                                    <td class="product-total"><?=formatPrice($value['into_money'])?></td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="order-total">
                                                <td>Total order:</td>
                                                <td><strong class="total-price">
                                                    <?=formatPrice($cart_info['total_price'])?>
                                                </strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div id="payment-checkout-wp">
                                        <ul id="payment_methods">
                                            <li>
                                                <input type="radio" checked="checked" id="direct-payment" name="payment-method" value="direct-payment">
                                                <label for="direct-payment">Pay at the store</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="payment-home" name="payment-method" value="payment-home">
                                                <label for="payment-home">Pay at home</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="place-order-wp clearfix">
                                        <input type="submit" value="Order" id="btn-checkout">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../../public/js/validator.js"></script>
<?php get_footer(); ?>

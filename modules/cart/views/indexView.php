<?php if(isset($_SESSION['user'])) {?>
    <?php get_header('products');?>
    <?php 
        $list_cart = isset($_SESSION['cart']['buy']) ? $_SESSION['cart']['buy'] : '';
        $info_cart = isset($_SESSION['cart']['info']) ? $_SESSION['cart']['info'] : '';
    ?>
    <div class="container cart" style="margin-top:7rem">
        <?php if(empty($list_cart)) {?>
            <div class="empty-cart">
                <img src="../../../public/img/empty_cart.jpg" alt="" class="img-empty">
                <span>There are no products in the cart! Click <a href="?mod=products&action=index">here</a> to view the product.</span>
            </div>
        <?php }else {?>
            <h3>Cart</h3>
            <form action="?mod=cart&action=update" method="POST">
                <table class="table">
                    <thead>
                        <tr class="table-secondary">
                            <!-- <th scope="col">Mã sản phẩm</th> -->
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Into money</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($list_cart as $value) {?>
                            <tr class="justify-content-center">
                                <input type="text" hidden name="id[]" value="<?=$value['id']?>">
                                <td class="td-image">
                                    <a href="<?=$value['base_url']?>">
                                        <img src="../../../public/img/<?=$value['img']?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?=$value['base_url']?>"><?=$value['name']?></a>
                                </td>
                                <td><?=formatPrice($value['price'])?></td>
                                <td>
                                    <div class="data-num__order" style="justify-content: center;">
                                        <div>
                                            <span class="btn-number btn number-decrement" onclick="changeNumOrder('num-order-<?=$value['id']?>', -1)">-</span>
                                            
                                            <input class="input-number" id="num-order-<?=$value['id']?>" type="text" name="num-order[]" value="<?=$value['quantity']?>" min="1" max="99">
                                            
                                            <span class="btn-number btn number-increment" onclick="changeNumOrder('num-order-<?=$value['id']?>', 1)">+</span>
                                        </div>
                                    </div>
                                </td>
                                <td><?=formatPrice($value['into_money'])?></td>
                                <td>
                                    <a href="?mod=cart&action=delete&id=<?=$value['id']?>" class="text-danger">
                                        <i class='bx bx-trash '></i>
                                    </a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                        
                    <tfoot>
                        <!-- <tr>
                            <td colspan="7">
                                <?php require("paggingCartView.php"); ?>
                            </td>
                        </tr> -->
                        <tr>
                            <td colspan="7">
                                <span>Total price: <span class="into-price"><?=isset($info_cart['total_price']) ? formatPrice($info_cart['total_price']) : ''?></span></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <a href="" id="btn-destroy-cart" class="btn btn-delete-cart">Delete cart</a>
                                <button class="btn" type="submit">Update cart</button>
                                <a href="?mod=cart&action=pay" class="btn">Payment</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        <?php }?>
    </div>
    <?php get_footer();?>
<?php }else {?>
    <?php header('location: ?mod=home');?>
<?php }?>

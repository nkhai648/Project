<?php get_header('products');?>
<div class="container cart" style="margin-top:7rem">
    <h3>Giỏ hàng</h3>
    <form action="" method="POST">
        <table class="table">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Ảnh sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr class="justify-content-center">
                    <td>F01</td>
                    <td class="td-image">
                        <img src="../../../public/img/mn-3.png" alt="">
                    </td>
                    <td>Banh da cua</td>
                    <td>₫50.000</td>
                    <td>
                        <div class="data-num__order" style="justify-content: center;">
                            <div>
                                <span class="btn-number btn number-decrement" onclick="changeNumOrder('num-order-id', -1)">-</span>
                                
                                <input class="input-number" id="num-order-id" type="text" name="num-order[]" value="1" min="1" max="99">
                                
                                <span class="btn-number btn number-increment" onclick="changeNumOrder('num-order-id', 1)">+</span>
                                <input type="text" hidden name="id[]" value="">
                            </div>
                        </div>
                    </td>
                    <td>₫500.000</td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="7">
                        <span>Tổng giá: 500000</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <a href="#" class="btn btn-delete-cart">Xóa giỏ hàng</a>
                        <button class="btn" type="submit">Cập nhật giỏ hàng</button>
                        <a href="" class="btn">Thanh toán</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>

    
</div>
<?php get_footer();?>
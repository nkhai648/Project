<?php $cart_info = isset($_SESSION['cart']['info']) ? $_SESSION['cart']['info'] : ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="../public/img/home.png" type="image/x-icon">

    <!--========== BOX ICONS ==========-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Food Restaurant</title>
    
</head>
<body>
    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="?mod=home&action=index" class="nav__logo">Tasty</a>

            <div class="cart-user">
                <div class="user-box">
                    <a href="<?=isset($_SESSION['user']) ? '' : '?mod=user&action=index'?>" id="user-icon">
                        <?php if(isset($_SESSION['user'])) {?>
                            <i class='bx bxs-user-detail nav__link'></i>
                        <?php }else {?>
                            <i class='bx bx-user-circle nav__link'></i>
                        <?php }?>
                    </a>
                    <?php if(isset($_SESSION['user'])) {?>
                        <div class="option-user">
                            <a href="#" class="text-option">Thông tin cá nhân</a>
                            
                            <a href="?mod=user&action=logout" class="text-option">Đăng xuất</a>
                        </div>
                    <?php }?>
                </div>
                <?php if(isset($_SESSION['user'])) {?>
                    <a href="?mod=cart">
                        <i class='bx bx-cart-alt nav__link'></i>
                        <span class="quantity-product">
                            <?=isset($cart_info['total_num_order']) ? $cart_info['total_num_order'] : ''?>
                        </span>
                    </a>
                <?php }?>
            </div>
        </nav>
    </header>

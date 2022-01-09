<?php 
    $cart_info = isset($_SESSION['cart']['info']) ? $_SESSION['cart']['info'] : ''; 
    // $user = isset($_SESSION['user']) ? $_SESSION['user'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--========== FAVICON ==========-->

    <link rel="shortcut icon" href="../public/img/home.png" type="image/x-icon">

    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--========== BOX ICONS ==========-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

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
            <a href="#" class="nav__logo">Tasty</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="#services" class="nav__link">Services</a>
                    </li>
                    <li class="nav__item">
                        <a href="#menu" class="nav__link">Menu</a>
                    </li>
                    <li class="nav__item">
                        <a href="?mod=products&action=index" class="nav__link">Products</a>
                    </li>
                    <li >
                        <i class='bx bx-moon change-theme' id="theme-button"></i>
                    </li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>


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
                    <a href="?mod=cart" id="cart-icon">
                        <i class='bx bx-cart-alt nav__link'></i>
                        <span class="quantity-product">
                            <?=isset($cart_info['total_num_order']) ? $cart_info['total_num_order'] : ''?>
                        </span>
                    </a>
                <?php }?>
            </div>


        </nav>
    </header>

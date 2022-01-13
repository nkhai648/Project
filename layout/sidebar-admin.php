<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="shortcut icon" href="../public/img/logo.png" type="image/x-icon">
        
        <!-- BOX ICONS CSS-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        
        <!-- CSS BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- SWEETALERT -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <!-- STYLES CSS -->
        <link rel="stylesheet" href="../public/css/admin.css">

        <title>Admin Tasty</title>
    </head>
    <body id="body">
        <div class="l-navbar" id="navbar">
            <nav class="nav">
                <div>
                    <a href="" class="nav__logo">
                        <img src="../public/img/logo2.png" alt="" class="nav__logo-icon">

                        <span class="nav__logo-text">Tasty</span>
                    </a>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class='bx bxs-chevron-right'></i>
                    </div>

                    <ul class="nav__list">
                        <!-- <a href="#" class="nav__link active">
                            <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__text">Home</span>
                        </a> -->
                        <a href="?mod=admin&action=index" class="nav__link <?=!isset($_GET['action']) || $_GET['action'] == 'index' ? 'active' : '' ?>">
                            <i class='bx bx-cookie nav__icon'></i>
                            <span class="nav__text">Products</span>
                        </a>
                        <a href="?mod=admin&action=managerUser" class="nav__link <?=isset($_GET['action']) && $_GET['action'] == 'managerUser' ? 'active' : '' ?>">
                            <i class='bx bxs-user nav__icon'></i>
                            <span class="nav__text">Users</span>
                        </a>
                        <a href="?mod=admin&action=profileAdmin" class="nav__link <?=isset($_GET['action']) && $_GET['action'] == 'profileAdmin' ? 'active' : '' ?>">
                            <i class='bx bx-file nav__icon'></i>
                            <span class="nav__text">Profile</span>
                        </a>
                        <a href="#" class="nav__link ">
                            <i class='bx bx-heart nav__icon' ></i>
                            <span class="nav__text">Favorites</span>
                        </a>
                        <a href="#" class="nav__link ">
                            <i class='bx bx-bookmark nav__icon'></i>
                            <span class="nav__text">Favorites</span>
                        </a>
                        <a href="#" class="nav__link ">
                            <i class='bx bx-message-rounded nav__icon' ></i>
                            <span class="nav__text">Chat</span>
                        </a>
                    </ul>
                </div>
                <a href="?mod=admin&action=logout" class="nav__link">
                    <i class='bx bx-log-out-circle nav__icon'></i>
                    <span class="nav__text">Log out</span>
                </a>
            </nav>
        </div>  
        

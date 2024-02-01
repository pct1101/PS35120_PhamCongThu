<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website Đơn Giản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= APPURL ?>css/style_mm.css" />
    <link rel="stylesheet" href="<?= APPURL ?>css/bootstrap.min.css" />

</head>
<header id="header" class="scrolled">
    <nav class="container flex">
        <div class="nav-logo flex">
            <img class="w-80" src="<?= APPURL ?>img/logotrang.png" alt="" />
        </div>
        <div class="nav-list">
            <ul class="flex">
                <li><a href="<?= APPURL ?>">Trang Chủ</a></li>
                <li><a href="#">Sản Phẩm</a></li>
                <li><a href="#">Giới Thiệu</a></li>
                <li><a href="#">Liên Hệ</a></li>
            </ul>
        </div>
        <div id="check"></div>
        <div class="nav-search flex">
            <div class="searchbar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <div class="searchclick">
                    <form>
                        <input type="text" placeholder="Search..." />
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>
            <div class="cartbar">
                <a href="<?= APPURL ?>product/cart"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            <?php if (isset($_SESSION['user'])) : ?>
            <div class="users">
                <i class="fa-solid fa-users"></i>
                <div class="dropdown-content">
                    <ul>

                        <li>
                            <div class="text">
                                <i class="fa-solid fa-user"></i>
                                <a href="#">Thông tin cá nhân</a>
                            </div>

                        </li>
                        <li>
                            <div class="text">

                                <i class="fa-solid fa-truck-fast"></i>
                                <a href="#">Lịch sử mua hàng</a>
                            </div>
                        </li>
                        <?php if (isset($_SESSION['user']['ac_role']) && $_SESSION['user']['ac_role'] == 'admin') : ?>
                        <li>
                            <div class="text">
                                <i class="fa-solid fa-user-tie"></i>
                                <a href="<?= APPURL ?>admin/dashboard">Trang admin</a>
                            </div>

                        </li>
                        <?php endif; ?>
                        <li>
                            <hr class="hr-menu">
                        </li>
                        <li>
                            <div class="text">

                                <i class="fa-solid fa-right-from-bracket"></i>
                                <a href="<?= APPURL ?>user/logout">Đăng xuất</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
            <?php else : ?>
            <div class="btn-login">
                <a href="<?= APPURL ?>user/login"><i class="fa-solid fa-right-to-bracket"></i></a>
            </div>
            <?php endif; ?>


        </div>
    </nav>
</header>
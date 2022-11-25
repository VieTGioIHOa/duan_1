<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOOK GOOD, FEEL GOOD!</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />


    <link rel="stylesheet" type="text/css" href="view/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="view/assets/css/font-awesome.css">

    <link rel="stylesheet" href="view/assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="view/assets/css/owl-carousel.css">

    <!-- LOGIN -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="view/assets/css/auth-form.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    

</head>

<body>
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="view/assets/images/logo.png" />
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" class="active">TRANG CHỦ</a></li>
                            <li class="scroll-to-section"><a href="#men">NAM</a></li>
                            <li class="scroll-to-section"><a href="#women">NỮ</a></li>
                            <li class="scroll-to-section"><a href="#kids">TRẺ EM</a></li>
                            <li class="submenu">
                                <a href="javascript:;">YODY</a>
                                <ul>
                                    <li><a href="index.php?act=about">Giới thiệu</a></li>
                                    <li><a href="index.php?act=products">Sản phẩm</a></li>
                                    <li><a href="#">Chi tiết về sản phẩm</a></li>
                                    <li><a href="index.php?act=contact">Liên hệ</a></li>
                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="javascript:;">TIN TỨC</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                </ul>
                            </li>

                            <?php
                            if (isset($_SESSION['user'])) {
                                extract($_SESSION['user']);
                            ?><div class="carts">
                                    <li><a href="view/client/cart.php"><i class="fa fa-shopping-cart"></i></a> </li>
                                </div>
                                <div class="dropdown text-end mx-4">
                                  
                                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="<?= './uploaded/user/'.$anh ?>" alt="mdo" width="50" height="50" class="rounded-circle">
                                    </a>
                                    <ul class="dropdown-menu text-small" style="max-width:500px;max-height:350px;font-size:11px">
                                        <li><a class="dropdown-item">Xin chào <b><?= $ho_ten ?></b></a></li>
                                        <li><a class="dropdown-item" href="index.php?act=capnhat">Cập nhật tài khoản</a></li>
                                        <li><a class="dropdown-item" href="index.php?act=doimatkhau">Đổi mật khẩu</a></li>
                                        <li><a class="dropdown-item" href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                                        <?php
                                        if ($vai_tro == "1") {
                                        ?>
                                            <li><a class="dropdown-item" href="view/admin/index.php">Đăng nhập admin</a></li>
                                        <?php } ?>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="index.php?act=dangxuat">Sign out</a></li>
                                    </ul>
                                </div>
                            <?php
                            } else {
                            ?>
                             <li><a href="index.php?act=login"><button class="btn">Login</button></a></li>
                            <li><a href="index.php?act=register"><button class="btn">Register</button></a></li>
                            <?php } ?>

                           
                           
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
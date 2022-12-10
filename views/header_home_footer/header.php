<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc Truyện Online Hay Và Mới Nhất</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="content/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="./content/csslib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./content/csslib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="./content/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="./content/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./content/css/index.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php

if (isset($_SESSION['okokok'])) {
?>
    <script>
        alert('<?= $_SESSION['okokok'] ?>');
    </script>
<?php
    unset($_SESSION['okokok']);
} ?>

<?php
if (isset($_SESSION['love_comic_not_login'])) {
?>
    <script>
        alert('<?= $_SESSION['love_comic_not_login'] ?>');
    </script>
<?php
    unset($_SESSION['love_comic_not_login']);
} ?>

<?php
if (isset($_SESSION['chua_dn'])) {
?>
    <script>
        alert('<?= $_SESSION['chua_dn'] ?>');
    </script>
<?php
    unset($_SESSION['chua_dn']);
} ?>

<?php
if (isset($_SESSION['err_not_dn'])) {
?>
    <script>
        alert('<?= $_SESSION['err_not_dn'] ?>');
    </script>
<?php
    unset($_SESSION['err_not_dn']);
} ?>

<?php
if (isset($_SESSION['succes_pw'])) {
?>
    <script>
        alert('<?= $_SESSION['succes_pw'] . ',bạn nên đổi mật khẩu!' ?>');
    </script>
<?php
    unset($_SESSION['succes_pw']);
} ?>

<?php
if (isset($_SESSION['susess_change'])) {
?>
    <script>
        alert('<?= $_SESSION['susess_change']; ?>');
    </script>
<?php
    unset($_SESSION['susess_change']);
} ?>

<?php
if (isset($_SESSION['tb'])) {
?>
    <script>
        alert('<?= $_SESSION['tb'] ?>');
    </script>
<?php
    unset($_SESSION['tb']);
} ?>

<?php
if (isset($_SESSION['khong_du_coin'])) {
?>
    <script>
        alert('<?= $_SESSION['khong_du_coin'] ?>');
    </script>
<?php
    unset($_SESSION['khong_du_coin']);
} ?>

<?php
if (isset($_SESSION['hay_dn'])) {
?>
    <script>
        alert('<?= $_SESSION['hay_dn'] ?>');
    </script>
<?php
    unset($_SESSION['hay_dn']);
} ?>

<?php
if (isset($_SESSION['send_succes'])) {
?>
    <script>
        alert('<?= $_SESSION['send_succes'] ?>');
    </script>
<?php
    unset($_SESSION['send_succes']);
} ?>


<?php
if (isset($_SESSION['dang_xuat'])) {
?>
    <script>
        alert('<?= $_SESSION['dang_xuat'] ?>');
    </script>
<?php
    session_unset();
    session_destroy();
} ?>


<body>
    <div class="home">
        <!--Phần Header-->
        <header>
            <div class="up">
                <div class="left">
                    <a href="index.php">
                        <div class="img"><img src="content/img/logo.png" alt=""></div>
                    </a>
                </div>
                <div class="mid">
                    <!--Tìm kiếm truyện-->
                    <form action="" method="POST">
                        <div class="search">
                            <div class="vien">
                                <input type="text" name='textsearch' placeholder="<?php echo isset($_SESSION['timkiem']) ? $_SESSION['timkiem'] : ' Bạn muốn tìm truyện gì?'; unset($_SESSION['timkiem'])?>">
                                <a href="index.php?act=search"><button name="search"> <i class="fas fa-search"></i></button></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <!--Đăng ký - Đăng nhập-->
                    <?php
                    ob_start();
                    if (isset($_SESSION['auth'])) {
                        // echo '<pre>';
                        // print_r($_SESSION['auth']);
                    ?>
                        <form action="">
                            <label class="text_login">Xin chào <strong>
                                    <?= $_SESSION['auth']['name'] ?>
                                </strong></label>
                            <label class="text_login" style="float: right;">Coin của bạn: <strong>
                                    <?= number_format($_SESSION['auth']['coin']); ?> Coin
                                </strong></label>

                            <br>
                            <a href="index.php?act=cap_nhat_tai_khoan"><input type="button" value="Cập nhật tài khoản"></a>
                            <a href="index.php?act=changepass&id=<?= $_SESSION['auth']['id'] ?>"><input name="" type="button" value="Thay đổi mật khẩu"></a>

                            <?php if ($_SESSION['auth']['role'] == 1) { ?>
                                <a href="admin/index.php"><input type="button" value="Đăng nhập admin"></a>
                            <?php } ?>

                            <?php if ($_SESSION['auth']['role'] == 3) { ?>
                                <a href="admin/index.php"><input type="button" value="Đăng truyện"></a>
                            <?php } ?>

                            <a href="index.php?act=dang_xuat"><input type="button" value="Đăng xuất"></a>
                        </form>
                    <?php } else { ?>
                        <form action="#">

                            <a href="index.php?act=login"><input type="button" id="login" value="Đăng nhập"></a>

                            <a href="index.php?act=register"><input type="button" id="register" value="Đăng ký"></a>

                        </form>
                    <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
    </div>

    <div class="nav_full">
        <nav>
            <ul class="menu">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="#">Thể loại</a>
                    <ul class="sub_menu">
                        <!--Phần đẩy loại truyện-->
                        <div class="vien">
                            <li><a href="index.php?act=loai&ma_svip">Svip</a></li>
                            <?php
                            ob_start();
                            foreach ($list_all_loai as $key => $value) { ?>
                                <li><a href="index.php?act=loai&ma_loai=<?php echo $value['id'] ?>">
                                        <?php echo $value['name'] ?>
                                    </a></li>
                            <?php
                            }
                            ?>
                        </div>
                    </ul>
                </li>
                <li><a href="index.php?act=truyen_yeu_thich">Truyện yêu thích</a></li>
                <li><a href="index.php?act=truyen_da_doc">Lịch sử đọc truyện</a></li>
                <li><a href="index.php?act=hoa_don">Lịch sử nạp coin</a></li>
                <li><a href="index.php?act=lien_he">Liên hệ</a></li>

                <li><a href="index.php?act=coin">Nạp coin</a></li>
                <!-- <li class="coin"><a href="">Nạp coin</a></li> -->
                <?php
                if (isset($_SESSION['auth'])) { ?>

                    <li class="float-right mt-[-5px]"><a href="">
                            <div class="nav-item dropdown">

                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa fa-bell me-lg-2"></i>
                                    <span class="d-none d-lg-inline-flex">Thông báo<object data="o" type=""></object></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                                    <?php foreach ($select_tb as $key => $value) {
                                        extract($value);
                                        $xoa_tb = 'index.php?act=del_tb&id='.$id;
                                        ?>
                                        <div class="flex">

                                            <a href="#" class="dropdown-item">
                                                <h6 class="fw-normal mb-0">
                                                    <?php echo $content; ?>
                                                </h6>
                                                <h6><?php echo $date  ?></h6>
                                            </a>
                                            <div class="text-center">
                                            <a href="<?= $xoa_tb ?>" onclick="return confirm('Bạn chắc chắn muốn xóa thông báo này chứ!')" class="p-2 px-4 bg-orange-400 border text-white hover:bg-blue-500  hover:text-orange-400 ml-2">Xóa</a>
                                            </div>
                                        </div>
                                        <hr class="dropdown-divider">
                                    <?php } ?>

                                    <!-- <hr class="dropdown-divider"> -->

                                </div>
                            </div>
                        </a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
    </header>
    <div class="clear"></div>
    <div class="home">
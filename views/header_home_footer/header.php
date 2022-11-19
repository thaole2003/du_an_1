<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="content/css/index.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
   
    if(isset($_SESSION['okokok'])){
?>
<script>
    alert('<?= $_SESSION['okokok'] ?>');
</script>
<?php } ?>


<?php
   
    if(isset($_SESSION['err_not_dn'])){
?>
<script>
    alert('<?= $_SESSION['err_not_dn'] ?>');
</script>
<?php
unset($_SESSION['err_not_dn']);

}?>



<?php
    if(isset($_SESSION['succes_pw'])){
?>
<script>
    alert('<?= $_SESSION['succes_pw'].',bạn nên đổi mật khẩu!' ?>');
</script>
<?php 
unset($_SESSION['succes_pw']);
} ?>

<?php
    if(isset(  $_SESSION['susess_change'])){
?>
<script>
    alert('<?=   $_SESSION['susess_change']='ban da doi mat khau!'; ?>');
</script>
<?php 
unset(  $_SESSION['susess_change']);
} ?>
<?php
    if(isset($_SESSION['dang_xuat'])){
?>
<script>
    alert('<?= $_SESSION['dang_xuat'] ?>');
</script>
<?php } ?>
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
                                <input type="text" name='textsearch' placeholder="Bạn muốn tìm truyện gì?">
                                <a href="index.php?act=search"><button name="search"> <i class="fas fa-search"></i></button></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="right">
                    <!--Đăng ký - Đăng nhập-->
                    <?php
                    if (isset($_SESSION['auth'])) {
                        extract($_SESSION['auth']);
                        // echo '<pre>';
                        // print_r($_SESSION['auth']);
                    ?>
                        <form action="">
                            <label class="text_login">Xin chào <strong><?php echo $name ?></strong></label><br>
                            <a href="index.php?act=login"><input type="button" value="Cập nhật tài khoản"></a>
                            <a href="index.php?act=changepass&id=<?=$_SESSION['auth']['id']?>"><input name=""  type="button" value="Thay đổi mật khẩu"></a>
                            <?php if($_SESSION['auth']['role'] == 1){?>
                                <a href="admin/index.php"><input type="button" value="Đăng nhập admin"></a>
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
                            <?php foreach ($list_all_loai as $key => $value) { ?>
                                <li><a href="index.php?act=loai&ma_loai=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></li>
                            <?php  } ?>
                        </div>
                    </ul>
                </li>
                <li><a href="index.php?act=truyen_yeu_thich">Truyện yêu thích</a></li>
                <li><a href="index.php?act=truyen_da_doc">Lịch sử</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </nav>
    </div>
    </header>
    <div class="clear"></div>
    <div class="home">
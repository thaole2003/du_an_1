<!-- admin coppy -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manager</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <!-- <link href="img/favicon.ico" rel="icon"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../content/csslib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../content/csslib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="../content/css/bootstrap.min.css">


    <!-- Template Stylesheet -->
    <link href="../content/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../content/css/index.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<script>
    function hien_thi(visible) {
        var loai = document.getElementById("loai_vip");
        loai.style.display = visible ? "" : "none";
    }
    $n = setTimeout(click, 1);
</script>
</head>
<?php if (isset($_SESSION['yess'])) {
?>
    <script>
        alert('<?= $_SESSION['yess'] ?>');
    </script>
<?php
}
unset($_SESSION['yess']) ?>

<?php if (isset($_SESSION['succes_disagree'])) {
?>
    <script>
        alert('<?= $_SESSION['succes_disagree'] ?>');
    </script>
<?php
}
unset($_SESSION['succes_disagree']) ?>


<?php if (isset($_SESSION['again'])) {
?>
    <script>
        alert('<?= $_SESSION['again'] ?>');
    </script>
<?php
}
unset($_SESSION['again']) ?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>HOME</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="https://png.pngtree.com/png-clipart/20190904/original/pngtree-hand-drawn-flat-wind-user-avatar-icon-png-image_4492039.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php
                                            ob_start();
                                            echo $_SESSION['auth']['name'] ?></h6>
                        <span><?php if ($_SESSION['auth']['role'] == 1) {
                                    echo ' Admin';
                                } else {
                                    echo 'Manager';
                                } ?> </span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <!-- <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a> -->
                    <?php if ($_SESSION['auth']['role'] == 1) {
                    ?>
                        <div class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Thể loại</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="index.php?act=list_loai" class="dropdown-item">Danh sách</a>
                                <a href="index.php?act=add_loai" class="dropdown-item">Thêm loại</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Truyện</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="index.php?act=add_comic" class="dropdown-item">Thêm truyện</a>
                                <a href="index.php?act=list_truyen" class="dropdown-item">Danh sách truyện</a>
                            </div>
                        </div>
                        <a href="index.php?act=list_kh" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Người dùng</a>
                        <a href="index.php?act=list_bl" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Bình luận</a>
                        <a href="index.php?act=list_tk" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Thống kê</a>
                        <a href="index.php?act=agree" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Phê duyệt</a>
                        <a href="index.php?act=lisk_bill" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Hóa đơn</a>



                        <a href="index.php?act=list_contact" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Ý kiến của KH</a>

                    <?php } ?>
                    <?php if ($_SESSION['auth']['role'] == 3) {
                    ?>
                        <div class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Thể loại</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="index.php?act=list_loai" class="dropdown-item">Danh sách</a>
                                <a href="index.php?act=add_loai" class="dropdown-item">Thêm loại</a>
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Truyện</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="index.php?act=add_comic" class="dropdown-item">Thêm truyện</a>
                                <a href="index.php?act=list_truyen" class="dropdown-item">Danh sách truyện</a>
                            </div>
                        </div>


                        <a href="index.php?act=list_bl" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Bình luận</a>
                        <a href="index.php?act=wait" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Sửa lại truyện </a>

                    <?php } ?>



                </div>
            </nav>
        </div>
        <div class="content">
            <!-- nav start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">

                    <div class=" ">
                        <a href="" class="nav-link ">
                            <img class="rounded-circle me-lg-2" src="https://png.pngtree.com/png-clipart/20190904/original/pngtree-hand-drawn-flat-wind-user-avatar-icon-png-image_4492039.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex ml-[5px]"><?php echo $_SESSION['auth']['name'] ?></span>
                        </a>

                    </div>
                </div>
            </nav>
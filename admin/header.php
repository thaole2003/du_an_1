<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../content/css/index.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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


<?php if(isset($_SESSION['again'])){
    ?>
<script>
      alert('<?= $_SESSION['again'] ?>');
</script>
    <?php
} 
unset($_SESSION['again'])?>

<body class="bg-slate-100">
    <div class="home">
        <!--Phần Header-->
        <header>
            <div class="up">
                <div class="left">
                    <a href="../index.php">
                        <div class="img"><img src="../content/img/logo.png" alt=""></div>
                    </a>
                </div>

                <div class="clear"></div>
            </div>
    </div>
    <div class="home">
        <div class="bg-orange-300">
            <h1 class="p-4 font-medium text-2xl text-white">Quản trị website</h1>
        </div>
    </div>
    <div class="home">
        <div class="flex">
            <!-- nav  -->
            <nav class="text-center p-4 mt-4 bg-orange-300 max-h-max w-[200px] ">
                <ul>

                    <?php if ($_SESSION['auth']['role'] == 1) { ?>

                        <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500  px-4 font-medium  " href="index.php">Home</a></li>
                        <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500  px-4 font-medium " href="index.php?act=list_loai">Loại</a></li>
                        <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500 px-4 font-medium " href="index.php?act=list_truyen">Truyện</a></li>
                        <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500 px-4 font-medium " href="index.php?act=list_kh">Người dùng</a></li>
                        <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500 px-4 font-medium " href="index.php?act=list_bl">Bình luận</a></li>
                        <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500  px-4 font-medium " href="index.php?act=list_tk">Thống kê</a></li>
                        <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500  px-4 font-medium " href="index.php?act=agree">Phê duyệt</a></li>
                        <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500 px-4 font-medium " href="index.php?act=lisk_bill">Bill</a></li>
                    <?php } elseif ($_SESSION['auth']['role'] == 3) {
                    ?>
                        <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500  px-4 font-medium " href="index.php?act=list_truyen">Truyện</a></li>
                                <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500  px-4 font-medium " href="index.php?act=wait">Duyệt lại</a></li>
                        <li class="my-2"><a class="p-2 text-white hover:bg-white hover:text-orange-500  px-4 font-medium " href="index.php?act=list_bl">Bình luận</a></li>



                    <?php } ?>
                </ul>
            </nav>
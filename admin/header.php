<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/index.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="home">
        <!--Phần Header-->
        <header>
            <div class="up">
                <div class="left">
                    <a href="#">
                        <div class="img"><img src="../img/logo.png" alt=""></div>
                    </a>
                </div>

                <div class="right">
                    <!--Đăng ký - Đăng nhập-->
                    <form action="#">
                        <a href="#"><input type="submit" value="Đăng ký"></a>
                        <a href="#"><input type="submit" value="Đăng nhập"></a>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
    </div>
    <div class="home">
        <div class="bg-orange-400">
            <h1 class="p-4 font-medium text-2xl text-white">Quản trị website</h1>
        </div>
    </div>
    <div class="home">
        <div class="flex">
            <!-- nav  -->
            <nav class="text-center p-4 mt-4 bg-orange-400 max-h-max w-[200px] ">
                <ul>
                    <li class="my-2"><a class="p-2 rounded-lg px-4 font-medium  " href="index.php">Home</a></li>
                    <li class="my-2"><a class="p-2 rounded-lg px-4 font-medium " href="index.php?act=list_loai">Loại</a></li>
                    <li class="my-2"><a class="p-2 rounded-lg px-4 font-medium " href="index.php?act=list_truyen">Truyện</a></li>
                    <li class="my-2"><a class="p-2 rounded-lg px-4 font-medium " href="index.php?act=list_kh">Người dùng</a></li>
                    <li class="my-2"><a class="p-2 rounded-lg px-4 font-medium " href="index.php?act=list_bl">Bình luận</a></li>
                    <li class="my-2"><a class="p-2 rounded-lg px-4 font-medium " href="index.php?act=list_tk">Thống kê</a></li>
                </ul>
            </nav>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="content/css/index.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

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
                    <form action="#">
                        <a href="#"><input type="button" id="register" value="Đăng ký"></a>
                        <a href="#"><input type="button" id="login" value="Đăng nhập"></a>
                    </form>
                </div>
                <div class="clear"></div>
            </div>
    </div>
    <div class="login rounded-lg absolute hidden flex flex-col w-1/2 m-2 p-2   bg-white">
        <p class="text-center font-medium text-2xl">Đăng nhập</p>
        <label class="m-2" for="">Email</label>
        <input type="text" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 ">
        <label class="m-2" for="">Password</label>
        <input type="password" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 ">
        <div class="flex justify-between border-b-2">
            <div class="flex m-2 gap-1">
                <a class="hover:text-sky-500" href="">Quên mật khẩu</a>|<a class="hover:text-sky-500" href="">Đăng kí</a>
            </div>
            <div class="flex m-2 gap-3">
                <button class="border border-soild h-8 rounded-lg  h-10 p-2 bg-orange-500"> Đăng Nhập</button> <button id="cancellogin" class="border border-soild h-8 rounded-lg  h-10 p-2 bg-blue-500">Cancel</button>
            </div>
        </div>
        <div class="flex gap-2 justify-center m-3">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-google"></i>
        </div>
    </div>
    <div class="register hidden rounded-lg absolute  flex flex-col w-1/2 m-2 p-2   bg-white">
        <p class="text-center font-medium text-2xl">Đăng Kí Mới</p>
        <label class="m-2" for="">Email</label>
        <input type="text" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 ">
        <label class="m-2" for="">Password</label>
        <input type="password" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 ">
        <label class="m-2" for="">Password</label>
        <input type="password" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 ">
        <div class="flex justify-between border-b-2">
            <div class="flex m-2 gap-1">
                <a class="hover:text-sky-500" href="">Đăng Nhập</a>
            </div>
            <div class="flex m-2 gap-3">
                <button class="border border-soild h-8 rounded-lg  h-10 p-2 bg-orange-500">Đăng Kí</button> <button id="cancelregister" class="border border-soild h-8 rounded-lg  h-10 p-2 bg-blue-500">Cancel</button>
            </div>
        </div>
        <div class="flex gap-2 justify-center m-3">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-google"></i>
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
                            <?php foreach($list_all_loai as $key => $value){
?>
                            <li><a href="#"><?php echo $value['name'] ?></a></li>

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
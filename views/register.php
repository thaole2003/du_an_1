<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="content/css/index.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div style="margin: 20px auto; width:600px; background-color:white;  border-radius: 6px;    box-shadow: 0px 0px 7px;">
        <p class="text-center font-medium text-2xl">Đăng Kí Mới</p>
        <form action="index.php?act=register" method="POST" class="flex flex-col">
            <label class="m-2" for="">Email</label>
            <input type="text" name="email" class="email m-2 content-between  border border-soild h-8  w-11/12 " placeholder="<?php echo isset($err_email) ? $err_email : "" ?>">
            <label class="m-2" for="">Name</label>
            <input type="text" name="name" class="email m-2 content-between  border border-soild h-8  w-11/12 " placeholder="<?php echo isset($err_name) ? $err_name : "" ?> ">
            <label class="m-2" for="">Phone</label>
            <input type="text" name="phone" class="email m-2 content-between  border border-soild h-8  w-11/12 " placeholder="<?php echo isset($err_phone) ? $err_phone : "" ?>">
            <label class="m-2" for="">Address</label>
            <input type="text" name="address" class="email m-2 content-between  border border-soild h-8  w-11/12 " placeholder="<?php echo isset($err_address) ? $err_address : "" ?>">
            <label class="m-2" for="">Password</label>
            <input type="password" name="pass" class="email m-2 content-between  border border-soild h-8  w-11/12 " placeholder="<?php echo isset($err_pass) ? $err_pass : "" ?>">
            <label class="m-2" for="">Password nhập lại</label>
            <input type="password" name="password" class="email m-2 content-between  border border-soild h-8  w-11/12 " placeholder="<?php echo isset($err_repassword) ? $err_repassword : "" ?>">
            <div class="flex justify-between border-b-2">
                <div class="flex m-2 gap-1">
                    <a class="hover:text-sky-500" href="index.php?act=login">Đăng Nhập</a>
                </div>
                <span class=""><?php echo isset($thongbao) ? $thongbao : "" ?></span>
                <div class="flex m-2 gap-3 p-2">
                    <button class="border border-soild h-8 rounded-lg  h-10 p-2 bg-orange-500" name="dang_ky">Đăng Kí</button>
                    <button id="cancellogin" class="border border-soild h-8 rounded-lg  h-10 p-2 bg-blue-500"><a href="index.php">Cancel</a></button>
                </div>
            </div>
            <div class="flex gap-2 justify-center m-3">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-google"></i>
            </div>
        </form>
    </div>

</body>

</html>
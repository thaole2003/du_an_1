
<?php ob_start()?>
<div class=" rounded-lg mx-auto flex flex-col w-1/2 m-2 p-2   bg-white">
    <form action="" method='post'>
        <p class="text-center font-medium text-2xl">Thay đổi mật khẩu</p>
        <label class="m-2" for="">Nhập mật khẩu cũ</label>
        <input type="password" name="pass_befor" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 " placeholder="<?php echo isset($_SESSION['err_pb']) ? $_SESSION['err_pb']: '' ?>">
        <label class="m-2" for="">Nhập mật khẩu mới</label>
        <input type="password" name="passw_new" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 " placeholder="<?php echo isset($_SESSION['err_pw']) ? $_SESSION['err_pw']: '' ?>">
        <label class="m-2" for="">Xác nhận mật khẩu</label>
        <input type="password" name="repass" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 " placeholder="<?php echo isset($_SESSION['err_rp']) ? $_SESSION['err_rp']: '' ?>">
        <?php unset($_SESSION['err_pb']);
        unset($_SESSION['err_pw']);
        unset($_SESSION['err_rp']); ?>
        <div class="flex justify-between border-b-2">
            <div class="flex m-2 gap-1">
                <a class="hover:text-sky-500" href="">Đăng nhập</a>|<a class="hover:text-sky-500" href="">Đăng kí</a>
            </div>
            <div class="flex m-2 gap-3">
                <button name="dmk" class="border border-soild h-8 rounded-lg  h-10 p-2 bg-orange-500"> Đổi mật khẩu</button>
                <a class="border border-soild h-8 rounded-lg  h-10 p-2 bg-blue-500" href="index.php">Cancel</a>
            </div>
        </div>
        </form>
    </div>
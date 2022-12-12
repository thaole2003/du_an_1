<div class="fg_pw rounded-lg mx-auto flex flex-col w-1/2 m-2 p-2   bg-white">
    <form action="" method='post'>
        <p class="text-center font-medium text-2xl">Quên mật khẩu</p>
        <label class="m-2" for="">Email</label>
        <input type="text" name="email_fg" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 " placeholder="<?php echo isset($_SESSION['err_pw_em']) ? $_SESSION['err_pw_em']: '' ?>">
        <div class="flex justify-between border-b-2">
            <div class="flex m-2 gap-1">
                <a class="hover:text-sky-500" href="">Đăng nhập</a>|<a class="hover:text-sky-500" href="">Đăng kí</a>
            </div>
            <div class="flex m-2 gap-3">
                <button name="fg_pw" class="border border-soild h-8 rounded-lg  h-10 p-2 bg-orange-500"> Lấy mật khẩu</button> 
                <a class="border border-soild h-8 rounded-lg  h-10 p-2 bg-blue-500" href="index.php?act=login">Cancel</a>
            </div>
        </div>
        </form>
    </div>
<div class=" mx-auto rounded-lg    w-1/2 m-2 p-2   bg-white">
    <form action="" class="flex flex-col" method="POST">
        <?php if (isset($_GET['msg'])) : ?>
            <h3 style="color: red;"><?= $_GET['msg'] ?></h3>
        <?php endif ?>
      
        <div>
            <p class="text-center font-medium text-2xl">Đăng nhập</p>
            <p class="text-center text-yellow-600">
    <?php echo isset($_SESSION['okokok']) ? $_SESSION['okokok'] : ''?>
            </p>
        </div>
             
  
   
       
             <div>
                        <label class="m-2" for="">Email</label>
                        <span>
    <?php echo isset($_SESSION['khong_ton_tai_tk']) ? $_SESSION['khong_ton_tai_tk'] : ''?>
</span>      
             </div>
        <input type="text" name="email_login" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12" placeholder=" <?php echo isset($err1_email_login) ? $err1_email_login : ''?> ">
        <div>
        <label class="m-2" for="">Password</label>
<span>
    <?php echo isset($_SESSION['sai_mk']) ?$_SESSION['sai_mk'] :''?>
</span>
        </div>
        <input type="password" name="password_login" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 " placeholder=" <?php echo isset($err_pass_login) ? $err_pass_login : '' ?> ">
        <div class="flex justify-between border-b-2">
            <div class="flex m-2 gap-1">
                <a class="hover:text-sky-500" href="">Quên mật khẩu</a>|<a class="hover:text-sky-500" href="">Đăng kí</a>
            </div>
            <div class="flex m-2 gap-3">
                <button name="loginn" class="border border-soild h-8 rounded-lg  h-10 p-2 bg-orange-500"> Đăng Nhập</button> <button id="cancellogin" class="border border-soild h-8 rounded-lg  h-10 p-2 bg-blue-500">Cancel</button>
            </div>
        </div>
        <div class="flex gap-2 justify-center m-3">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-google"></i>
        </div>
    </form>
</div>
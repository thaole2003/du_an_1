<!-- content  -->
<div class="py-4 w-full ">
    <div class="bg-[#]">
        <h1 class="text-xl font-medium p-4">Thêm người dùng</h1>
    </div>
    <div class=" rounded-lg   flex flex-col w-2/3 m-4 p-4  bg-white " >
        <p class="text-center font-medium text-2xl">Đăng Kí Mới</p>
        <form action="index.php?act=add_user" method="POST" class="flex flex-col">
        <label class="m-2" for="">Email</label>
        <input type="text" name="email" class="email m-2 content-between  border border-soild h-8  w-11/12 h-[40px]" placeholder="<?php echo isset($err_email) ? $err_email : "" ?>">
        <label class="m-2" for="">Name</label>
        <input type="text" name="name" class="email m-2 content-between  border border-soild h-8  w-11/12 h-[40px] "  placeholder="<?php echo isset($err_name) ? $err_name : "" ?> ">
        <label class="m-2" for="">Phone</label>
        <input type="text" name="phone" class="email m-2 content-between  border border-soild h-8  w-11/12 h-[40px] "  placeholder="<?php echo isset($err_phone) ? $err_phone : "" ?>">
        <label class="m-2" for="">Address</label>
        <input type="text" name="address" class="email m-2 content-between  border border-soild h-8   w-11/12 h-[40px] " placeholder="<?php echo isset($err_address) ? $err_address : "" ?>">
        <label class="m-2" for="">Password</label>
        <input type="password" name="pass" class="email m-2 content-between  border border-soild h-8  w-11/12 h-[40px] " placeholder="<?php echo isset($err_pass) ? $err_pass : "" ?>">
        <label class="m-2" for="" >Password nhập lại</label>
        <input type="password" name="password" class="email m-2 content-between  border border-soild h-8  w-11/12 h-[40px]" placeholder="<?php echo isset($err_repassword) ? $err_repassword : "" ?>">
        <label class="m-2" for="" >Vai trò</label>
        <select name="role_id" class="w-[100px] p-2">
            <?php foreach($list_role as $key =>$value){ ?>
            <option value="<?= $value['id'] ?>"><?= $value['name']  ?></option>
            
            <?php } ?>
        </select>
        <div class="flex justify-between border-b-2">
            
            <span class=""><?php echo isset($thongbao) ? $thongbao : "" ?></span>
            <div class="flex m-2 gap-3">
                <button class="p-2 px-4 bg-orange-400  text-white hover:bg-blue-500  hover:text-orange-400  border border-solid "  name="add">Thêm</button> <button id="cancelregister" class="p-2 px-4 bg-orange-400  text-white hover:bg-blue-500  hover:text-orange-400  border border-solid "><a class="text-white" href="index.php?act=list_kh">Danh sách</a></button>
            </div>
        </div>
        <div class="flex gap-2 justify-center m-3">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-google"></i>
        </div>
        </form>
</div>
</div>
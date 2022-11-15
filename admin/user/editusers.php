<!-- content  -->
<div class="py-4 w-full ">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Sửa người dùng</h1>
    </div>
    <div class=" rounded-lg   flex flex-col w-2/3 m-4 p-4  bg-white " >
        <p class="text-center font-medium text-2xl">EDIT ACCOUNT</p>
        <form action="" method="POST" class="flex flex-col">
        <label class="m-2" for="">Name</label>
        <input type="text" name="name" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 "  value="<?= $user_id['name']?>"  placeholder="">
        <span class="m-2 text-red-500"><?php echo isset($err_name) ? $err_name : "" ?> </span>
        <label class="m-2" for="">Phone</label>
        <input type="text" name="phone" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 "  value="<?= $user_id['phone']?>"  placeholder="">
        <span class="m-2 text-red-500"><?php echo isset($err_phone) ? $err_phone : "" ?></span>
        <label class="m-2" for="">Address</label>
        <input type="text" name="address" class="email m-2 content-between  border border-soild h-8 rounded-lg w-11/12 " value="<?= $user_id['address']?>" placeholder="">
        <span class="m-2 text-red-500"><?php echo isset($err_address) ? $err_address : "" ?></span>
        <label class="m-2" for="" >Vai trò</label>
        <select name="role_id" class="w-[100px] p-2">
           <?php foreach($list_role as $key => $value){

            if($value['id']==$user_id['role']){
                echo '<option value=' . $value['id'] . ' selected>' . $value['name'] . '</option>';
            }else{ 
                echo '<option value=' . $value['id'] . '>' . $value['name'] . '</option>';
            }

            }?>
           
            
           
        </select>
        <div class="flex justify-between border-b-2">
            <div class="flex m-2 gap-1">
                <a class="hover:text-sky-500" href="">Đăng Nhập</a>
            </div>
            <span class=""><?php echo isset($thongbao) ? $thongbao : "" ?></span>
            <div class="flex m-2 gap-3">
                <button class="p-2 px-4 bg-orange-400 rounded-md text-white hover:bg-white hover:text-orange-400  border-2 border-solid "  name="update">UPDATE</button> <button id="cancelregister" class="p-2 px-4 bg-orange-400 rounded-md text-white hover:bg-white hover:text-orange-400  border-2 border-solid "><a href="index.php?act=list_kh">Danh sách</a></button>
            </div>
        </div>
        <div class="flex gap-2 justify-center m-3">
            <i class="fa-brands fa-facebook"></i>
            <i class="fa-brands fa-google"></i>
        </div>
        </form>
</div>
</div>
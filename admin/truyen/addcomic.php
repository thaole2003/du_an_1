<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Thêm Truyện</h1>
    </div>
    <form action="" method="POST" enctype="multipart/form-data" class="p-4 w-[500px]">
        <label class="font-medium">Mã Truyện </label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full" type="text" placeholder="Auto number" disabled><br>
        <label class="font-medium">Tên Truyện</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="text" name="name_comic" placeholder="Tên truyện">
        <span class="font-medium text-red-500"><?php if (isset($rong_ten)) { echo $rong_ten; } ?></span>
        <span class="font-medium text-red-500"><?php if (isset($trung_ten)) { echo $trung_ten; } ?></span>
        <br>
        <label class="font-medium">Ảnh bìa</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="file" name="cover_image" placeholder="Ảnh bìa">
        <span class="font-medium text-red-500"><?php if (isset($khong_tt)) { echo $khong_tt; } ?></span>
        <span class="font-medium text-red-500"><?php if (isset($khong_phai_anh)) { echo $khong_phai_anh; } ?></span>
        <span class="font-medium text-red-500"><?php if (isset($loi_dinh_dang)) { echo $loi_dinh_dang; } ?></span>
        <br>
        <label class="font-medium">Detail</label><br>
        <textarea class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " placeholder="Chi tiết" name="detail" id="" cols="30" rows="10"></textarea>
        <br>
        <label class="font-medium">Author</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="text" name="author" placeholder="Tác giả"><br>
        <label class="font-medium">Intro</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="text" name="intro" placeholder="Giới thiệu"><br>
        <label class="font-medium">Loại truyện</label><br>
        <select name="category">
            <?php
            foreach ($list_all_loai as $Key => $value) {
            ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>

            <?php } ?>
        </select><br>
        
        <label class="font-medium">Ảnh truyện</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="file" name="file[]" id="file" multiple placeholder="Giới thiệu">
        <span class="font-medium text-red-500"><?php if (isset($khong_tt_f)) { echo $khong_tt_f; } ?></span>
        <span class="font-medium text-red-500"><?php if (isset($khong_phai_anh_f)) { echo $khong_phai_anh_f; } ?></span>
        <span class="font-medium text-red-500"><?php if (isset($file_ton_tai_f)) { echo $file_ton_tai_f; } ?></span>
        <span class="font-medium text-red-500"><?php if (isset($loi_dinh_dang_f)) { echo $loi_dinh_dang_f; } ?></span>
        <br>
        <button style="margin-top: 10px;" class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400" name="btnAdd">Thêm</button>
        <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"><a href="index.php?act=list_truyen">Danh sách</a></button>
        <span class="font-medium text-red-500"><?php if (isset($upload_ok)) { echo $upload_ok; } ?></span>
    </form>

</div>
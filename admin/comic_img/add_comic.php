<article>
    <form class="p-4" action='index.php?act=add_img_comic' method='post' enctype='multipart/form-data'>
        <label class="font-medium text-2xl">Tên truyện</label>
        <br>
        <select name="id_comic" class="p-2 m-2 rounded border-1 text-xl ">
            <?php
            foreach ($name_id_comic as $value) {
                extract($value);
            ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>

            <?php } ?>
        </select><br>
        <br>
        <input type="file" name="file[]" id="file" multiple class="border-2 border-solid rounded-r-lg  m-2 text-orange-500"><br>
        <input type="submit" name="btn-submit" value="Upload" class="p-2 m-2 px-4 bg-orange-400 rounded-md text-white hover:bg-white hover:text-orange-400">
        <b style="color: red;"><?php echo isset($khong_phai_anh) ? $khong_phai_anh : "" ?></b>
        <b style="color: red;"><?php echo isset($file_ton_tai) ? $file_ton_tai : "" ?></b>
        <b style="color: red;"><?php echo isset($loi_dinh_dang) ? $loi_dinh_dang : "" ?></b>
        <b style="color: red;"><?php echo isset($upload_ok) ? $upload_ok : "" ?></b>
    </form>
</article>
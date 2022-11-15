<article>
    <form action='index.php?act=add_img_comic' method='post' enctype='multipart/form-data'>
        <label class="font-medium">Tên truyện</label>
        <br>
        <select name="id_comic">
            <?php
            foreach ($name_id_comic as $value) {
                extract($value);
            ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>

            <?php } ?>
        </select><br>
        <br>
        <input type="file" name="file[]" id="file" multiple>
        <input type="submit" name="btn-submit" value="Upload">
        <b style="color: red;"><?php echo isset($khong_phai_anh) ? $khong_phai_anh : "" ?></b>
        <b style="color: red;"><?php echo isset($file_ton_tai) ? $file_ton_tai : "" ?></b>
        <b style="color: red;"><?php echo isset($loi_dinh_dang) ? $loi_dinh_dang : "" ?></b>
        <b style="color: red;"><?php echo isset($upload_ok) ? $upload_ok : "" ?></b>
    </form>
</article>
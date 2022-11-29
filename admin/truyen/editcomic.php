<!-- content  -->
<?php
if (is_array($load_all_comic)) {
    extract($load_all_comic);
    $id_comic = $id;
}
?>
<div class="py-4 w-full">
    <div class="bg-[#]">
        <h1 class="text-xl font-medium p-4">Sửa Truyện</h1>
    </div>
    <form action="index.php?act=update_truyen" method="POST" class="p-4 w-[100%]" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
        <label class="font-medium">Mã Truyện </label>
        <br>
        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full h-[40px]" disabled type="text" value="<?php if (isset($id) && ($id != "")) echo $id; ?>">
        <br>
        <label class="font-medium">Tên Truyện</label>
        <br>
        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px]" type="text" name="name" value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
        <b style="color: red;"><?php echo isset($_SESSION['trong_truyen']) ? $_SESSION['trong_truyen'] : "" ?></b>
        <b style="color: red;"><?php echo isset($_SESSION['trung_ten']) ? $_SESSION['trung_ten'] : "" ?></b>
        <?php unset($_SESSION['trong_truyen']); unset($_SESSION['trung_ten']); ?>
        <br>
        <label class="font-medium">Ảnh bìa</label><br>
        <div class="mt-2">
            <img class="w-[200px] h-[200px]" src="../content/uploads/cover_img/<?php echo $cover_image ?>" />
        </div><br>
        <input class="border-0 my-2 focus:outline-none border-solid border p-1 border-yellow-400 w-full  h-[40px] " type="file" name="cover_image" placeholder="Ảnh bìa"><br>
        <b style="color: red;"><?php echo isset($thong_bao) ? $thong_bao : "" ?></b>
        <b style="color: red;"><?php echo isset($khong_phai_anh) ? $khong_phai_anh : "" ?></b>
        <b style="color: red;"><?php echo isset($loi_dinh_dang) ? $loi_dinh_dang : "" ?></b>
        <label class="font-medium">Detail</label>
        <br>
        <textarea class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  " name="detail" id="" cols="30" rows="10"><?php if (isset($detail) && ($detail != "")) echo $detail; ?></textarea>
        <br>
        <label class="font-medium">Author</label>
        <br>
        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px] " type="text" name="author" value="<?php if (isset($author) && ($author != "")) echo $author; ?>">
        <br>
        <label class="font-medium">Intro</label>
        <br>
        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px] " type="text" name="intro" value="<?php if (isset($intro) && ($intro != "")) echo $intro; ?>">
        <br>
        <label class="font-medium">Loại truyện</label>
        <br>
        <select name="category_id">
            <?php
            foreach ($list_all_loai as $loai) {
                extract($loai);
                if ($category_id == $id) {
            ?>
                    <option value="<?= $id ?>" selected><?= $name ?></option>
                <?php
                } else {   ?>
                    <option value="<?= $id ?>"><?= $name ?></option>
            <?php
                }
            }
            ?>
        </select>
        <br>

        <label class="font-medium">Ảnh truyện</label><br>
        <div style="width: 100%;">
            <div class="flex flex-wrap gap-2 justify-items-center">
                <?php
                foreach ($img_comic as $img) {
                    $them_img_comic = "index.php?act=them_img_comic";
                    $xoa_img_comic = "index.php?act=xoa_img_comic&id=" . $img['id_new'] . "&id_comic=" . $id_comic;
                ?>
                    <div class="flex flex-col justify-center content-center items-center w-1/5">
                        <img style="float:left;" class="h-[200px]" src="../content/uploads/img_cua_comic/<?= $img['img'] ?>" alt="">
                        <p><?= $img['img'] ?></p>
                        <a class="border border-solid bg-yellow-300 pr-3 pl-3 border-gray-200  cursor-pointer hover:bg-white hover:text-orange-500" onclick="delete_img_comic('<?php echo $xoa_img_comic ?>')">Xóa</a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px] p-1 " type="file" name="file[]" id="file" multiple placeholder="Giới thiệu">
        <span class="font-medium text-red-500">
            <?php if (isset($khong_tt_f)) {
                echo $khong_tt_f;
            } ?></span>
        <span class="font-medium text-red-500">
            <?php if (isset($khong_phai_anh_f)) {
                echo $khong_phai_anh_f;
            } ?></span>
        <span class="font-medium text-red-500">
            <?php if (isset($file_ton_tai_f)) {
                echo $file_ton_tai_f;
            } ?></span>
        <span class="font-medium text-red-500">
            <?php if (isset($loi_dinh_dang_f)) {
                echo $loi_dinh_dang_f;
            } ?></span>
        <br>
        <label class="font-medium">Truyện</label><br>
        <?php 
            if($vip == 0){
                $checked = "checked";
                $block_none = "none";
            }else{
                $checked_vip = "checked";
                $block_none = "block";
            }
        ?>
        <input type="radio" value="0" <?php if($vip == 0) echo "checked"; ?> name="vip" onclick="hien_thi(false)" />Truyện thường
        <input type="radio" value="1" <?php if($vip == 1) echo "checked"; ?> name="vip" onclick="hien_thi(true)" />Truyện Svip
        <p id="loai_vip" style="display:<?= $block_none ?>">
            <label>Loại Svip</label><br>
            <input placeholder="Nhập giá truyện" class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="text" placeholder="price" name="price_comic" value="<?= $price ?>"/>
        </p>
        <div class="clear"></div>
        <button style="margin-top: 10px;" class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn-update">Cập nhật</a></button>
        <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400"><a href="index.php?act=list_truyen">Danh sách</a></button>
    </form>

</div>
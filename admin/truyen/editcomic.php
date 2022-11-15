<!-- content  -->
<?php
if (is_array($load_all_comic)) {
    extract($load_all_comic);
}
?>
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Sửa Truyện</h1>
    </div>
    <form action="index.php?act=update_truyen" method="POST" class="p-4 w-[500px]" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
        <label class="font-medium">Mã Truyện </label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full" type="text" value="<?php if (isset($id) && ($id != "")) echo $id; ?>">
        <br>
        <label class="font-medium">Tên Truyện</label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="text" name="name" value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
        <b style="color: red;"><?php echo isset($_SESSION['trong_truyen']) ? $_SESSION['trong_truyen'] : "" ?></b>
        <b style="color: red;"><?php echo isset($_SESSION['trung_ten']) ? $_SESSION['trung_ten'] : "" ?></b>
        <br>
        <label class="font-medium">Ảnh bìa</label><br>
        <div class="mt-2">
            <img class="w-[200px] h-[200px]" src="../content/uploads/cover_img/<?php echo $cover_image ?>" />
        </div><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="file" name="cover_image" placeholder="Ảnh bìa"><br>
        <b style="color: red;"><?php echo isset($thong_bao) ? $thong_bao : "" ?></b>
        <b style="color: red;"><?php echo isset($khong_phai_anh) ? $khong_phai_anh : "" ?></b>
        <b style="color: red;"><?php echo isset($loi_dinh_dang) ? $loi_dinh_dang : "" ?></b>
        <label class="font-medium">Detail</label>
        <br>
        <textarea class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " name="detail" id="" cols="30" rows="10"><?php if (isset($detail) && ($detail != "")) echo $detail; ?></textarea>
        <br>
        <label class="font-medium">Author</label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="text" name="author" value="<?php if (isset($author) && ($author != "")) echo $author; ?>">
        <br>
        <label class="font-medium">Intro</label>
        <br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="text" name="intro" value="<?php if (isset($intro) && ($intro != "")) echo $intro; ?>">
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
        <button style="margin-top: 10px;" class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400" name="btn-update">Cập nhật</a></button>
        <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"><a href="index.php?act=list_truyen">Danh sách</a></button>
    </form>

</div>
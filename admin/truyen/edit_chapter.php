<!-- content  -->
<style>
    .accordion {
        background-color: white;
        margin-top: 10px;
        color: rgb(165, 165, 165);
        cursor: pointer;
        padding: 5px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        margin-bottom: 10px;
        width: 100%;
    }

    .active,
    .accordion:hover {
        background-color: rgb(255, 247, 247);
    }

    .panel {
        padding: 0 5px;
        display: none;
        background-color: white;
        overflow: hidden;
        width: 100%;
    }

    .m {
        outline: none;
        margin: 5px 0px;
        padding: 5px 0px;
        border: 1px solid #ccc;
        width: 100%;
        border-radius: 5px;
    }
</style>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="panel" style="display: block;">
        <label>Tập truyện</label><br>

        <input class="m" type="text" min="1" value="Tập <?= $id_chapter ?>" disabled name="number_chapter" /><br>

        <label>Nội dung tập</label><br>
        <input class="m" value="<?= $noi_dung_id['noi_dung'] ?>" placeholder="Nhập nội dung tập truyện" name="noi_dung" />

        <label class="font-medium">Ảnh truyện</label><br>
        <div class="flex flex-wrap gap-2 justify-items-center">
            <?php
            if ($img_comic) {
                foreach ($img_comic as $img) {
                    $xoa_img_comic = "index.php?act=xoa_img_comic&id=" . $img['id_new'] . "&id_comic=" . $id . "&id_chapter=" . $id_chapter;
            ?>
                    <div class="flex flex-col justify-center content-center items-center w-1/5">
                        <img style="float:left;" class="h-[200px]" src="../content/uploads/img_cua_comic/<?= $img['img'] ?>" alt="">
                        <p><?= $img['img'] ?></p>
                        <a class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn-update" href="<?= $xoa_img_comic ?>" onclick="return confirm('Bạn chắc chắn muốn xóa ảnh này?')">Xóa ảnh</a>
                    </div>
                <?php }
            } else {
                ?>
            <h1 style="margin-top: 10px; color:red;">Không có ảnh</h1>
            <?php
            }
            ?>
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
        <?php $xoa_chapter = "index.php?act=xoa_chapter&id_chapter=" . $noi_dung_id['id_ch'] . "&id=" . $id . "&number_chapter=" . $id_chapter ?>
        <button style="margin-top: 10px;" class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn-update">Cập nhật</a></button>
        <a class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn-update" href="<?= $xoa_chapter ?>" onclick="return confirm('Bạn chắc chắn muốn xóa tập này?')">Xóa tập</a>
        <a class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" href="index.php?act=sua_truyen&id=<?= $id ?>">Quay lại</a>
    </div>
</form>
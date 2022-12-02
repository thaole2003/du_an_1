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
        <label>Thêm tập truyện</label><br>
        <?php
            for($i=$count_chapter['sl']+1; $i <= $count_chapter['sl']+1; $i++){
        ?>
        <input class="m" value="Tập <?= $i ?>" disabled placeholder="Nhập tập truyện" /><br>
        <input type="hidden" value="<?= $i ?>" name="number_chapter">
        <?php
        }
        ?>
        <label>Nội dung tập</label><br>
        <input class="m" placeholder="Nhập nội dung tập truyện" name="noi_dung" />
        <span class="font-medium text-red-500">
            <?php if (isset($noi_dung_trong)) {
                echo $noi_dung_trong;
            } ?></span>
        <br>
        <label class="font-medium">Ảnh truyện</label><br>
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
        <button style="margin-top: 10px;" class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btnAdd">Thêm</button>
    </div>
</form>
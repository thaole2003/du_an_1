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
<div class="py-4 w-full">
    <div class="bg-[#]">
        <h1 class="text-xl font-medium p-4">Thêm Truyện</h1>
    </div>
    <form action="" method="POST" enctype="multipart/form-data" class="p-4 w-[500px]">

        <label class="font-medium">Tên Truyện</label><br>
        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px]" type="text" name="name_comic" placeholder="Tên truyện">
        <span class="font-medium text-red-500">
            <?php if (isset($rong_ten)) {
                echo $rong_ten;
            } ?></span>
        <span class="font-medium text-red-500">
            <?php if (isset($trung_ten)) {
                echo $trung_ten;
            } ?></span>
        <br>
        <label class="font-medium">Ảnh bìa</label><br>
        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px] p-1 " type="file" name="cover_image" placeholder="Ảnh bìa">
        <span class="font-medium text-red-500">
            <?php if (isset($khong_tt)) {
                echo $khong_tt;
            } ?></span>
        <span class="font-medium text-red-500">
            <?php if (isset($khong_phai_anh)) {
                echo $khong_phai_anh;
            } ?></span>
        <span class="font-medium text-red-500">
            <?php if (isset($loi_dinh_dang)) {
                echo $loi_dinh_dang;
            } ?></span>
        <br>
        <label class="font-medium">Detail</label><br>
        <textarea class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px] " placeholder="Chi tiết" name="detail" id="" cols="30" rows="10"></textarea>
        <br>
        <label class="font-medium">Author</label><br>
        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px] " type="text" name="author" placeholder="Tác giả"><br>
        <label class="font-medium">Intro</label><br>
        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px] " type="text" name="intro" placeholder="Giới thiệu"><br>
        <label class="font-medium">Loại truyện</label><br>
        <select name="category">
            <?php
            foreach ($list_all_loai as $Key => $value) {
            ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>

            <?php } ?>
        </select><br>
        <!--Tập-->
        <div class="accordion">
            Tập
        </div>
        <div class="panel" style="display:         
        <?php
        if (isset($noi_dung_trong) || isset($khong_tt_f)) {
            echo 'block';
        } else {
            echo 'none';
        }
        ?>;">
            <label>Tập truyện</label><br>
            <input class="m" value="Tập 1" disabled placeholder="Nhập tập truyện"/><br>
            <input type="hidden" value="1" name="number_chapter">

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
        </div>
        <!--Svip-->
        <label class="font-medium">Truyện</label><br>
        <input type="radio" value="0" checked name="vip" onclick="hien_thi(false)" />Truyện thường
        <input type="radio" value="1" name="vip" onclick="hien_thi(true)" />Truyện Svip

        <p id="loai_vip" style="display:none">
            <label>Loại Svip</label><br>
            <input placeholder="Nhập giá truyện" class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px] " type="text" placeholder="price" name="price_comic" />
        </p>
        <br>
        <button style="margin-top: 10px;" class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btnAdd">Thêm</button>
        <button class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400"><a class="text-white" href="index.php?act=list_truyen">Danh sách</a></button>
        <span class="font-medium text-red-500">
            <?php if (isset($upload_ok)) {
                echo $upload_ok;
            } ?></span>
    </form>

</div>
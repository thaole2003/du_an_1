<!-- content  -->
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

    .add_chapter {
        background: #ff973c;
        color: #ffffff;
        padding: 4px 4px;
        line-height: 40px;
        border-radius: 6px;
        border: 1px solid #ff973c;
        font-size: 15px;
    }

    .add_chapter:hover {
        background-color: white;
    }
</style>
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
        <?php unset($_SESSION['trong_truyen']);
        unset($_SESSION['trung_ten']); ?>
        <br>
        <label class="font-medium">Ảnh bìa</label><br>
        <div class="mt-2">
            <img class="w-[200px] h-[200px]" src="../content/uploads/cover_img/<?php echo $cover_image ?>" />
        </div><br>
        <input class="border-0 my-2 focus:outline-none border-solid border p-1 border-yellow-400 w-full  h-[40px] " type="file" name="cover_image" placeholder="Ảnh bìa"><br>
        <span style="color: red; font-weight:bold;"><?php echo isset($_SESSION['khong_phai_anh']) ? $_SESSION['khong_phai_anh'] : "" ?></span><br>
        <span style="color: red; font-weight:bold;"><?php echo isset($_SESSION['dinh_dang']) ? $_SESSION['dinh_dang'] : "" ?></span>
        <?php unset($_SESSION['khong_phai_anh']);
        unset($_SESSION['dinh_dang']); ?><br>
        <label class="font-medium">Detail</label>
        <br>
        <textarea class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  " name="detail" id="" cols="30" rows="10"><?php if (isset($detail) && ($detail != "")) echo $detail; ?></textarea>
        <br>
        <label class="font-medium">Author</label>
        <br>
        <input class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px] " type="text" name="author" value="<?php if (isset($author) && ($author != "")) echo $author; ?>">
        <br>
        <span style="color: red; font-weight:bold;"><?php echo isset($_SESSION['trong_tg']) ? $_SESSION['trong_tg'] : "" ?></span><br>
        <?php unset($_SESSION['trong_tg']); ?>
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
        </select><br>

        <!--Tập-->
        <div class="accordion">
            Tập
        </div>

        <div class="panel" style="display: block;">
            <?php
            if ($all_chapter) {
                foreach ($all_chapter as $chapter) {
                    extract($chapter);

            ?>
                    <a class="add_chapter" href="index.php?act=sua_chapter&id=<?= $id_comic ?>&id_chapter=<?= $number_chapter ?>">Tập <?= $number_chapter ?></a>
                <?php
                }
            } else {
                ?>
                <h1 style="margin-top: 10px; color:red;">Không có tập</h1>
            <?php
            }
            ?>
            <br>
            <a class="add_chapter" href="index.php?act=add_chapter&id=<?= $id_comic ?>&add=<?= $count_chapter['sl'] + 1 ?>">Thêm tập</a>

        </div>

        <!--Svip-->
        <label class="font-medium">Truyện</label><br>
        <?php
        if ($vip == 0) {
            $checked = "checked;";
            $block_none = "none;";
        } else {
            $checked_vip = "checked;";
            $block_none = "block;";
        }
        ?>
        <input type="radio" value="0" <?php if ($vip == 0) echo "checked"; ?> name="vip" onclick="hien_thi(false)" />Truyện thường
        <input type="radio" value="1" <?php if ($vip == 1) echo "checked"; ?> name="vip" onclick="hien_thi(true)" />Truyện Svip

        <p id="loai_vip" style="display:<?= $block_none ?>">
            <label>Loại Svip</label><br>
            <input placeholder="Nhập giá truyện" class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400 w-full " type="text" placeholder="price" name="price_comic" value="<?= $price ?>" />
            <span class="font-medium text-red-500">
                <?php if (isset($_SESSION['tien_nho'])) {
                    echo $_SESSION['tien_nho'];
                }
                if (isset($_SESSION['nhap_chu'])) {
                    echo $_SESSION['nhap_chu'];
                }
                ?></span>
        </p>
        <?php unset($_SESSION['tien_nho']);
        unset($_SESSION['nhap_chu']);
        ?>
        <div class="clear"></div>
        <button style="margin-top: 10px;" class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn-update">Cập nhật</a></button>
        <button class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400"><a class="text-white" href="index.php?act=list_truyen">Danh sách</a></button>
    </form>

</div>
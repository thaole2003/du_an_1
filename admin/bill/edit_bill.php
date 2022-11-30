<!-- content  -->
<div class="py-4 w-full">
    <div class="">
        <h1 class="text-xl font-medium p-4">Cập nhật bill</h1>
    </div>
    <form action="index.php?act=update_bill" method="POST" class="p-4">
        <label class="font-medium text-xl">Mã bill</label><br>
        <input class="h-[40px] p-2  border-0 my-2 focus:outline-none border-solid border border-yellow-400" type="text" disabled value="<?php if (isset($id) && ($id != "")) echo $id; ?>">
        <input type="hidden" name="id" value="<?php
        
        if (isset($id) && ($id != "")) echo $id; ?>">
        <br>
        <label class="font-medium text-xl ">Tình trạng</label><br>
        <span class='text-red-500'><?php echo isset( $_SESSION['err_whynot'])?  $_SESSION['err_whynot']:'' ?>
        <?php unset( $_SESSION['err_whynot'])?>
        </span> <br>
        <?php
        // echo '<pre>';
        // print_r($bill_one);
        extract($bill_one);
        if ($status == 0) {
            $selected0 = "selected";
        } else {
            $selected0 = "";
        }
        if ($status == 1) {
            $selected1 = "selected";
        } else {
            $selected1 = "";
        }
        if ($status == 2) {
            $selected2 = "selected";
        } else {
            $selected2 = "";
        }
        ?>
        <input type="hidden" name="price" value="<?php if (isset($price) && ($price != "")) echo $price; ?>">
        <input type="hidden" name="id_user" value="<?php if (isset($id_user) && ($id_user != "")) echo $id_user; ?>">

        <input type="radio" value="0" checked name="status" onclick="hien_thi(false)"/>Đang xử lý
        <input type="radio" value="1" name="status" onclick="hien_thi(false)" />Đồng ý
        <input type="radio" value="2" name="status" onclick="hien_thi(true)" />Từ chối
        <p id="loai_vip" style="display:none">
            <label>Lý do</label><br>
            
            <input  class=" border-0 my-2 focus:outline-none border-solid border border-yellow-400 w-full  h-[40px] " type="text" placeholder="Mời nhập lý do" name="why_not"/>
        </p>
        <br>
        <div class="py-2">
            <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="cap_nhat">Cập nhật</button>
            <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400"><a href="index.php?act=lisk_bill">Danh sách</a></button>
        </div>
    </form>
</div>
<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Cập nhật bill</h1>
    </div>
    <form action="index.php?act=update_bill" method="POST" class="p-4">
        <label class="font-medium">Mã bill</label><br>
        <input class="rounded-md border-0 my-2 focus:outline-none border-solid border-2 border-yellow-400" type="text" disabled value="<?php if (isset($id) && ($id != "")) echo $id; ?>">
        <input type="hidden" name="id" value="<?php if (isset($id) && ($id != "")) echo $id; ?>">
        <br>
        <label class="font-medium">Tình trạng</label><br>
        <?php 
            // echo '<pre>';
            // print_r($bill_one);
            extract($bill_one);
            if($status == 0){
                $selected0 = "selected";
            }else{
                $selected0 = "";
            }
            if($status == 1){
                $selected1 = "selected";
            }else{
                $selected1 = "";
            }
            if($status == 2){
                $selected2 = "selected";
            }else{
                $selected2 = "";
            }
        ?>
        <input type="hidden" name="price" value="<?php if (isset($price) && ($price != "")) echo $price; ?>">
        <input type="hidden" name="id_user" value="<?php if (isset($id_user) && ($id_user != "")) echo $id_user; ?>">
        <select name="status" id="">
            <option value="0" <?= $selected0 ?>>Đang xử lý</option>
            <option value="1" <?= $selected1 ?>>Giao dịch thành công</option>
            <option value="2" <?= $selected2 ?>>Giao dịch thất bại</option>
        </select>
        <br>
        <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400" name="cap_nhat">Cập nhật</button>
        <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"><a href="index.php?act=lisk_bill">Danh sách</a></button>
    </form>
</div>
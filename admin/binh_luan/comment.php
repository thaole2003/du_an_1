<!-- content  -->
<div class="py-4 w-full">
    <div class="">
        <h1 class="text-xl font-medium p-4">Bình luận</h1>
    </div>
    <div class="p-4">
        <form action="index.php?act=search_bl" method="POST" class="">
            <input placeholder="Mời nhập tên người dùng muốn tìm kiếm" type="text" name="key_search" class="w-[300px] h-[44px]  border border-solid border-yellow-400">
            <select name="id_comic" class="p-2 px-4 rounded-md h-[44px]">
                <option value="0" selected>Tất cả</option>
                <?php
                $comic_all = comic_select_all();
                foreach ($comic_all as $KEY => $VAL) {
                ?>
                    <option class="font-medium text-xl" value="<?= $VAL['id'] ?>"><?= $VAL['name'] ?></option>
                <?php } ?>
            </select>
            <button class="bg-orange-400 hover:bg-blue-500 hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn_search">Tìm kiếm</button>
        </form>
    </div>
    <div class="p-4">
        <table class="table-auto w-full">
            <thead class="text-xl border-2">
                <tr class="bg-[#47C5FC] ">
                    <th class="p-2 border">Mã bình luận</th>
                    <th class="p-2 border">Mã người dùng</th>
                    <th class="p-2 border">Tên người dùng</th>
                    <th class="p-2 border">Thời gian</th>
                    <th class="p-2 border">Nội dung</th>
                    <th class="p-2 border">Mã comic</th>
                    <th  class="p-2 border">Tên truyện</th>
                    <th class="p-2 border">Thay đổi</th>


                </tr>
            </thead>
            <tbody class="font-medium text-lg border-2">
                <?php foreach($list_comment as $key =>$value){ 
                    $xoa_comment="index.php?act=xoa_comment&id=" . $value['id'];
                    ?>
                    
                <tr class="text-center  ">
                    <td class="p-2 border-2 border-solid "><?= $value['id'] ?></td>
                    <td class="p-2 border-2 border-solid "><?= $value['user_id'] ?></td>
                    <td class="p-2 border-2 border-solid "><?= $value['u_name'] ?></td>
                    <td class="p-2 border-2 border-solid"><?= $value['date'] ?></td>
                    <td class="p-2 border-2 border-solid "><?= $value['detail'] ?></td>
                    <td class="p-2 border-2 border-solid "><?= $value['comic_id'] ?></td>
                    <td class="p-2 border-2 border-solid "><?= $value['comic_name'] ?></td>
                    <td class="p-2 border-2 border-solid ">
                    <a href="<?= $xoa_comment ?>" onclick="return confirm('Bạn chắc chắn xóa comment này chứ!')" class="p-2 px-4 bg-orange-400 border text-white hover:bg-blue-500  hover:text-orange-400 ml-2">Xóa</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
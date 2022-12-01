<!-- content  -->
<div class="py-4 w-full">
    <div class="">
        <h1 class="text-xl font-medium p-4">Bình luận</h1>
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
                        <button onclick="del('<?php echo $xoa_comment ?>')" class="p-2 px-4 bg-orange-400  text-white hover:bg-blue-500  hover:text-orange-400 mt-2 ">Xóa</button>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>
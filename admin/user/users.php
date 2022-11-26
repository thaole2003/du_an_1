<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Người dùng</h1>
    </div>
    <div class="p-4">
        <table class="table-auto w-full">
            <thead class="text-xl border-2">
                <tr class="bg-red-200 ">
                    <th class="p-2 border-2">Mã người dùng</th>
                    <th class="p-2 border-2">Email</th>
                    <th class="p-2 border-2">Address</th>
                    <th class="p-2 border-2">Phone</th>
                    <th class="p-2 border-2">Name</th>
                    <th class="p-2 border-2">Coin</th>
                    <th class="p-2 border-2">Vai trò</th>
                    <th class="p-2 border-2">Thay đổi</th>


                </tr>
            </thead>
            <tbody class="font-medium text-lg border-2">
                <?php foreach($all_user as $key => $value){
                extract($value);

                $delete_user = "index.php?act=delete_user&id=" . $id;
                    ?>
                       <tr class="text-center  ">
                    <td class="p-2 border-2 border-solid "><?= $id ?></td>
                    <td class="p-2 border-2 border-solid "><?= $email ?></td>
                    <td class="p-2 border-2 border-solid "><?= $address ?></td>
                    <td class="p-2 border-2 border-solid"><?= $phone ?></td>
                    <td class="p-2 border-2 border-solid "><?= $name ?> </td>
                    <td class="p-2 border-2 border-solid "><?= number_format($coin); ?> Coin</td>
                    <td class="p-2 border-2 border-solid "><?= $r_name ?></td>
                    <td class="p-2 border-2 border-solid flex gap-2">
                        <button class="p-2 px-4 bg-orange-400 rounded-md text-white hover:bg-white hover:text-orange-400 "><a href="index.php?act=edit_user&id=<?= $id?>">Sửa</a> </button>
                        <button onclick="del('<?php echo $delete_user ?>')" class="p-2 px-4 bg-orange-400 rounded-md text-white hover:bg-white hover:text-orange-400 ">Xóa</button>
                    </td>
                </tr>
           <?php      } ?>
         
               
            </tbody>
        </table>
    </div>
    <div class="p-4">
        <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"><a href="index.php?act=add_user">Thêm</a> </button>

    </div>
</div>
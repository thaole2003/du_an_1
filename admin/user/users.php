<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-[#]">
        <h1 class="text-xl font-medium p-4">Người dùng</h1>
    </div>
    <div class="p-4">
        <form action="index.php?act=search_user" method="POST" class="">
            <input placeholder="Mời nhập tên người dùng muốn tìm kiếm" type="text" name="key_search" class="w-[300px] h-[44px]  border border-solid border-yellow-400">
            <select name="role" class="p-2 px-4 rounded-md h-[44px]">
                <option value="0" selected>Tất cả</option>
                <?php
                $role = load_all_roll();
                foreach ($role as $KEY => $VAL) {
                ?>
                    <option class="font-medium text-xl" value="<?= $VAL['id'] ?>"><?= $VAL['name'] ?></option>
                <?php } ?>
            </select>
            <button class="bg-orange-400 hover:bg-blue-500 hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn_search">Tìm kiếm</button>
        </form>
    </div>
    <div class="p-4">
        <button class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border border-yellow-400"><a class="text-white" href="index.php?act=add_user">Thêm</a> </button>
    </div>
    <div class="p-4">
        <table class="table-auto w-full">
            <thead class="text-xl border-2">
                <tr class="bg-[#47C5FC] ">
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
                <?php foreach ($all_user as $key => $value) {
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
                            <button class="p-2 px-4 bg-orange-400  text-white hover:bg-blue-500  hover:text-orange-400 "><a class="text-white" href="index.php?act=edit_user&id=<?= $id ?>">Sửa</a> </button>
                            <a href="<?= $delete_user ?>" onclick="return confirm('Bạn chắc chắn muốn xóa người dùng này!')" class="p-2 px-4 bg-orange-400 border text-white hover:bg-blue-500  hover:text-orange-400 ml-2">Xóa</a>
                        </td>
                    </tr>
                <?php      } ?>


            </tbody>
        </table>
    </div>
</div>
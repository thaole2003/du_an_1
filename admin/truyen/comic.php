<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Truyện</h1>
    </div>
    <div class="p-4">
        <form action="index.php?act=list_truyen_search" method="POST" class="">
            <input type="text" name="key_search" class="w-[300px] h-[44px] rounded-md border-2 border-solid border-yellow-400">
            <select name="category_id" class="p-2 px-4 rounded-md h-[44px]">
                <option value="0" selected>Tất cả</option>
                <?php
                $list_all_loai = load_all_loai();
                foreach ($list_all_loai as $KEY => $VAL) {
                ?>
                    <option class="font-medium text-xl" value="<?= $VAL['id'] ?>"><?= $VAL['name'] ?></option>
                <?php } ?>
            </select>
            <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400" name="btn_search">Tìm kiếm</button>
        </form>
    </div>
    <div class="p-4">
        <table class="table-auto w-full">
            <thead class="text-xl border-2">
                <tr class="bg-red-200 ">
                    <th class="p-2 border-2">Mã truyện</th>
                    <th class="p-2 border-2">Tên truyện</th>
                    <th class="p-2 border-2">Tác giả</th>
                    <th class="p-2 border-2">Giới thiệu</th>
                    <th class="p-2 border-2">Ngày giờ</th>
                    <th class="p-2 border-2">View</th>
                    <th class="p-2 border-2">Like</th>
                    <th class="p-2 border-2">Loại</th>
                    <th class="p-2 border-2">Thay đổi</th>
                    <th class="p-2 border-2">Chức năng</th>
                    </th>
                </tr>
            </thead>
            <tbody class="font-medium text-lg border-2">
                <?php
                foreach ($load_all_truyen as $key => $value) {
                    extract($value);
                    $sua_truyen = "index.php?act=sua_truyen&id=" . $id;
                    $xoa_truyen = "index.php?act=xoa_truyen&id=" . $id;
                ?>
                    <tr class="text-center  ">
                        <td class="p-2 border-2 border-solid "><?php echo $id ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $name ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $author ?></td>
                        <td class="p-2 border-2 border-solid"><?php echo $intro ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $date ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $view ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $like_comic ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $ca_name ?></td>
                        <td class="p-2 border-2 border-solid "><img class="w-[200px] h-[200px]" src="<?php echo $img_name ?>" /></td>

                        <td class="p-2 border-2 border-solid ">
                            <button class="p-2 px-4 bg-orange-400 rounded-md text-white hover:bg-white hover:text-orange-400 "><a href="<?php echo $sua_truyen ?>">Sửa</a> </button><br>
                            <button onclick="del('<?php echo $xoa_truyen ?>')" class="p-2 px-4 bg-orange-400 rounded-md text-white hover:bg-white hover:text-orange-400 mt-2">Xóa</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="p-4">
        <a href="index.php?act=add_comic"> <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400">
                Thêm</button></a>

    </div>
</div>
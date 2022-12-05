<!-- content  -->
<div class="py-4 w-full">
    <div class="">
        <h1 class="text-xl font-medium p-4">Truyện chờ phê duyệt</h1>
    </div>
    <div class="p-4">
        <form action="index.php?act=search_agree" method="POST">
            <input type="text" placeholder="Mời nhập tên người đăng" name="key_search" class="w-[300px] h-[44px]  border border-solid border-yellow-400">

            <button class="bg-orange-400 hover:bg-blue-500 hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn_search">Tìm kiếm</button>
        </form>
    </div>
    <div class="p-4">
        <table class="table-auto w-full">
            <thead class="text-xl border-2">
                <tr class="bg-[#47C5FC] ">
                    <th class="p-2 border-2">Tên người đăng</th>
                    <th class="p-2 border-2">Mã truyện</th>
                    <th class="p-2 border-2">Tên truyện</th>
                    <th class="p-2 border-2">Tác giả</th>
                    <th class="p-2 border-2">Giới thiệu</th>
                    <th class="p-2 border-2">Ngày giờ</th>
                    <th class="p-2 border-2">Loại</th>
                    <th class="p-2 border-2">Ảnh bìa</th>
                    <th class="p-2 border-2">Duyệt</th>
                    </th>
                </tr>
            </thead>
            <tbody class="font-medium text-lg border-2">
                <?php
                foreach ($comic_select_all_bystatus as $key => $value) {
                    extract($value);
                    $yess = "index.php?act=yes&id=" . $id;
                    $noo = "index.php?act=no&id=" . $id;
                ?>
                    <tr class="text-center  ">
                        <td class="p-2 border-2 border-solid"><?php echo $name_poster ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $id ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $name ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $author ?></td>
                        <td class="p-2 border-2 border-solid"><?php echo $intro ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $date ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $ca_name ?></td>
                        <td class="p-2 border-2 border-solid "><img class="w-[400px] h-[200px]" src="../content/uploads/cover_img/<?php echo $img_name ?>" /></td>

                        <td class="p-2 border-2 border-solid ">
                            <!-- <form action="" method="post"></form> -->
                            <a href="<?php echo $yess ?>"> <button class="p-2 px-4 bg-orange-400 border border-solid text-white hover:bg-blue-500  hover:text-orange-400 ">Đồng ý</button></a> <br>
                            <a href="<?php echo $noo ?>"> <button class="p-2 px-4 bg-orange-400  border border-solid text-white hover:bg-blue-500  hover:text-orange-400 mt-2">Từ chối</button></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
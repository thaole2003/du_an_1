<!-- content  -->
<div class="py-4 w-full ">
    <div class="">
        <h1 class="text-xl font-medium p-4">Danh sách loại truyện</h1>
    </div>
    <div class="p-4">
        <button class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border border-yellow-400"><a class="text-white" href="index.php?act=add_loai">Thêm</a></button>

    </div>
    <div class="p-4">
        <table class="table-auto w-full shadow-2xl ">
            <thead class="text-xl border-2">
                <tr class="bg-[#F5DBB0] ">
                    <th class="p-2 border-2">Mã truyện</th>
                    <th class="p-2 border-2">Tên loại truyện</th>
                    <th class="p-2 border-2">Số truyện</th>
                    <th class="p-2 border-2">Thay đổi</th>
                </tr>
            </thead>
            <?php
            foreach ($list_all_loai as $loai_all) {
              
                extract($loai_all);
                $sl= handle_dem_truyen_cung_tl($id);
                $sua_loai = "index.php?act=sua_loai&id=" . $id;
                $xoa_loai = "index.php?act=xoa_loai&id=" . $id;
            ?>
            
                <tbody class="font-medium text-lg border-2">
                    <tr class="text-center  ">
                        <td class="p-2 border-2 border-solid "><?php echo $id ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $name ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $sl["COUNT(*)"] ?></td>
                        <td class="p-2 border-2 border-solid ">
                            <button class="p-2 px-4 bg-orange-400  text-white hover:bg-blue-500  hover:text-orange-400 border mr-2"><a class="text-white" href="<?php echo $sua_loai ?>">Sửa</a></button>
                            <a href="<?= $xoa_loai ?>" onclick="return confirm('Bạn chắc chắn muốn xóa loại này?')" class="p-2 px-4 bg-orange-400 border text-white hover:bg-blue-500  hover:text-orange-400 ml-2">Xóa</a>

                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            
        </table>
    </div>
    
</div>

<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Danh sách loại truyện</h1>
    </div>
    <div class="p-4">
        <table class="table-auto w-full">
            <thead class="text-xl border-2">
                <tr class="bg-red-200 ">
                    <th class="p-2 border-2">Mã truyện</th>
                    <th class="p-2 border-2">Tên loại truyện</th>
                    <th class="p-2 border-2">Số truyện</th>
                    <th class="p-2 border-2">Thay đổi</th>
                </tr>
            </thead>
            <?php
            foreach ($list_all_loai as $loai_all) {
                extract($loai_all);
                $sua_loai = "index.php?act=sua_loai&id=" . $id;
                $xoa_loai = "index.php?act=xoa_loai&id=" . $id;
            ?>
            
                <tbody class="font-medium text-lg border-2">
                    <tr class="text-center  ">
                        <td class="p-2 border-2 border-solid "><?php echo $id ?></td>
                        <td class="p-2 border-2 border-solid "><?php echo $name ?></td>
                        <td class="p-2 border-2 border-solid ">8</td>
                        <td class="p-2 border-2 border-solid ">
                            <button class="p-2 px-4 bg-orange-400 rounded-md text-white hover:bg-white hover:text-orange-400 mr-2"><a href="<?php echo $sua_loai ?>">Sửa</a></button>
                            <button onclick="del('<?php echo $xoa_loai?>')"   class="p-2 px-4 bg-orange-400 rounded-md text-white hover:bg-white hover:text-orange-400 ml-2">Xóa</button>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            
        </table>
    </div>
    <div class="p-4">
        <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"><a href="index.php?act=add_loai">Thêm</a></button>

    </div>
</div>
<script>
    function del(aaaa){
            if( confirm('xác nhận xóa')){
                return document.location = aaaa;
            }
        }
</script>
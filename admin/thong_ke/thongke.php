<!-- content  -->
<div class="py-4 w-full">
    <div class="bg-red-300">
        <h1 class="text-xl font-medium p-4">Người dùng</h1>
    </div>
    <div class="p-4">
        <table class="table-auto w-full">
            <thead class="text-xl border-2">
                <tr class="bg-red-200 ">
                    <th class="p-2 border-2">Mã loại</th>
                    <th class="p-2 border-2">Tên loại</th>
                    <th class="p-2 border-2">Số lượng</th>
                    <th class="p-2 border-2">View</th>

                    <th class="p-2 border-2">View thấp nhất</th>
                    <th class="p-2 border-2">View trung bình</th>
                    <th class="p-2 border-2">View cao nhất</th>
                    <th class="p-2 border-2">Like</th>
                    <th class="p-2 border-2">Like thấp nhất</th>
                    <th class="p-2 border-2">Like trung bình</th>
                    <th class="p-2 border-2">Like cao nhất</th>



                </tr>
            </thead>
            <tbody class="font-medium text-lg border-2">
                <?php  
                // echo "<pre>";
                // var_dump($list_loai);
                // echo "<pre/>";
                // die();
                foreach($statistical as $key =>$value){ 
                extract($value);
                echo '<pre>';
                print_r($value);
                    ?>
                <tr class="text-center  ">
                    <td class="p-2 border-2 border-solid "><?= $category_id ?></td>
                    <td class="p-2 border-2 border-solid "><?= $category_name ?></td>
                    
                    <td class="p-2 border-2 border-solid "><?= $so_luong?></td>
                    <td class="p-2 border-2 border-solid"><?= $sum_view?> </td>
                    <td class="p-2 border-2 border-solid "><?= $min_view ?></td>
                    <td class="p-2 border-2 border-solid "><?= round($avg_view,1)?></td>
                    <td class="p-2 border-2 border-solid"><?= $max_view?></td>
                    <td class="p-2 border-2 border-solid "><?= $sum_like?></td>
                    <td class="p-2 border-2 border-solid "><?= $min_like?></td>
                    <td class="p-2 border-2 border-solid "><?= round($avg_like,1)?></td>
                    <td class="p-2 border-2 border-solid "><?= $max_like?></td>

                </tr>
                <?php }?>

            </tbody>
        </table>
    </div>
    <div class="p-4">
        <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4 rounded-md border-solid border-2 border-yellow-400"><a href="index.php?act=bieu_do">Xem biểu đồ</a></button>

    </div>
</div>
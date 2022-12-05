<!-- content  -->
<div class="py-4 w-full">
    <div class="p-4">
        <h1 class=" font-medium text-2xl p-2 ">Thống kê Truyện theo loại</h1>
        <div class="p-4">
            <form action="index.php?act=search_tk_dm" method="POST">
                <input type="text" placeholder="Mời nhập tên thể loại muốn tìm kiếm" name="key_search" class="w-[300px] h-[44px]  border border-solid border-yellow-400">

                <button class="bg-orange-400 hover:bg-blue-500 hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn_search">Tìm kiếm</button>
            </form>
        </div>
        <table class="table-auto w-full">
            <thead class="text-xl border-2">
                <tr class="bg-[#47C5FC]">
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
                foreach ($statistical as $key => $value) {
                    extract($value);
                ?>
                    <tr class="text-center  ">
                        <td class="p-2 border-2 border-solid "><?= $category_id ?></td>
                        <td class="p-2 border-2 border-solid "><?= $category_name ?></td>

                        <td class="p-2 border-2 border-solid "><?= $so_luong ?></td>
                        <td class="p-2 border-2 border-solid"><?= $sum_view ?> </td>
                        <td class="p-2 border-2 border-solid "><?= $min_view ?></td>
                        <td class="p-2 border-2 border-solid "><?= round($avg_view, 1) ?></td>
                        <td class="p-2 border-2 border-solid"><?= $max_view ?></td>
                        <td class="p-2 border-2 border-solid "><?= $sum_like ?></td>
                        <td class="p-2 border-2 border-solid "><?= $min_like ?></td>
                        <td class="p-2 border-2 border-solid "><?= round($avg_like, 1) ?></td>
                        <td class="p-2 border-2 border-solid "><?= $max_like ?></td>

                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <h1 class=" font-medium text-2xl p-2 ">Thống kê Coin</h1>
        <div class="">
            <h1 class="font-medium p-2">Số lượng người nạp coin:<?= $statistical_coin['number'] ?></h1>
            <h1 class="font-medium p-2">Tổng coin nạp:<?= number_format($statistical_coin['coin_sum']) ?></h1>
            <h1 class="font-medium p-2">Coin nạp trung bình:<?= number_format($statistical_coin['coin_tb']) ?></h1>
            <h1 class="font-medium p-2">Coin nạp ít nhât:<?= number_format($statistical_coin['coin_min']) ?></h1>
            <h1 class="font-medium p-2">Coin nạp nhiều nhất:<?= number_format($statistical_coin['coin_max']) ?></h1>
        </div>
        <h1 class="font-medium text-xl">Top 5 người nạp coin nhiều nhất</h1>
        <table class="table-auto w-10/12">
            <thead class="text-xl border-2">
                <tr class="bg-[#47C5FC]">
                    <th class="p-2 border-2">ID</th>
                    <th class="p-2 border-2">Name</th>
                    <th class="p-2 border-2">Coin</th>
                    <th class="p-2 border-2">Email</th>
                    <th class="p-2 border-2">Phone number</th>
                    <th class="p-2 border-2">Time</th>
                </tr>
            </thead>
            <tbody class="font-medium text-lg border-2">
                <?php
                // echo "<pre>";
                // var_dump($top_coin);
                foreach ($top_coin  as $key => $val) {
                    extract($val);
                ?>
                    <tr class="text-center  ">
                        <td class="p-2 border-2 border-solid "><?= $id_user ?></td>
                        <td class="p-2 border-2 border-solid "><?= $name ?></td>
                        <td class="p-2 border-2 border-solid "><?= number_format($total_price) ?></td>
                        <td class="p-2 border-2 border-solid "><?= $email ?></td>
                        <td class="p-2 border-2 border-solid "><?= $phone ?></td>
                        <td class="p-2 border-2 border-solid "><?= $date ?></td>


                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <div class="p-4">
        <button class="bg-orange-400 hover:bg-blue-500  hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400"><a class="text-white" href="index.php?act=bieu_do">Xem biểu đồ</a></button>

    </div>
</div>
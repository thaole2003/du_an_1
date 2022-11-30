<!-- content  -->
<div class="py-4 w-full">
    <div class="">
        <h1 class="text-xl font-medium p-4">Danh sách coin</h1>
    </div>
    <div class="p-4">
        <form action="index.php?act=search_bill" method="POST">
            <input type="text" name="key_search" class="w-[300px] h-[44px]  border border-solid border-yellow-400">
            <select name="status" class="p-2 px-4 rounded-md h-[44px]">
                <option value="3" selected>Tất cả</option>
                <option class="font-medium text-xl" value="0">Đang xử lý</option>
                <option class="font-medium text-xl" value="1">Giao dịch thành công</option>
                <option class="font-medium text-xl" value="2">Giao dịch thất bại</option>
            </select>
            <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-4  border-solid border border-yellow-400" name="btn_search">Tìm kiếm</button>
        </form>
    </div>
    <div class="p-4">
        <table class="table-auto w-full">
            <thead class="text-xl border-2">
                <tr class="bg-[#47C5FC] ">
                    <th class="p-2 border">Id</th>
                    <th class="p-2 border">Mã user</th>
                    <th class="p-2 border">Tên người dùng</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Địa chỉ</th>
                    <th class="p-2 border">Số điện thoại</th>
                    <th class="p-2 border">Thời gian nạp</th>
                    <th class="p-2 border">Mệnh giá</th>
                    <th class="p-2 border">Tình trạng</th>
                    <th class="p-2 border">Bằng chứng</th>
                    
                    <th></th>
                </tr>
            </thead>
            <tbody class="font-medium text-lg border-2">
                <?php foreach ($list_bill as $value) {
                    extract($value);
                    // echo '<pre>';
                    // print_r($list_bill);
                    // die;
                    $sua_bill = "index.php?act=edit_bill&id=" . $id;
                    $xoa_bill = "index.php?act=delete_bill&id=" . $id;
                    if ($status == 0) {
                        $status = "Đang xử lý";
                        $color = "black;";
                    }
                    if ($status == 1) {
                        $status = "Giao dịch thành công";
                        $color = "green;";
                    }
                    if ($status == 2) {
                        $status = "Giao dịch thất bại";
                        $color = "red;";
                    }
                ?>

                    <form action="index.php?act=edit_bill">
                        <tr class="text-center  ">
                            <td class="p-2 border-2 border-solid "><?= $id ?></td>
                            <td class="p-2 border-2 border-solid "><?= $id_user ?></td>
                            <td class="p-2 border-2 border-solid "><?= $name ?></td>
                            <td class="p-2 border-2 border-solid"><?= $email ?></td>
                            <td class="p-2 border-2 border-solid "><?= $address ?></td>
                            <td class="p-2 border-2 border-solid "><?= $phone ?></td>
                            <td class="p-2 border-2 border-solid "><?= $date ?></td>
                            <td class="p-2 border-2 border-solid "><?= number_format($price); ?> VNĐ</td>
                            <td class="p-2 border-2 border-solid " style="color: <?= $color ?>"><?= $status ?></td>
                            <td class="p-2 border-2 border-solid "><img class="w-[50px] h-[70px]" src="../content/uploads/bill/<?= $images ?>" alt="">  </td>
                            <td class="p-2 border-2 border-solid ">
                                <?php
                                if ($status != "Giao dịch thành công") {
                                ?>
                                    <button class="bg-orange-400 hover:bg-white hover:text-orange-400 font-medium text-white p-2 px-3 border-solid border border-yellow-400"><a href="<?= $sua_bill ?>">Cập nhật</a></button>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<article>
    <h1 class="hoa_don_h1"><i class="fas fa-history"></i>Lịch sử giao dịch</h1>
    <table class="hoa_don">
        <?php
        if (isset($_SESSION['auth'])) {
            if ($bill) {
        ?>
                <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Thời gian nạp</th>
                    <th>Mệnh giá</th>
                    <th>Tình trạng</th>
                    <th>Coin nhận được</th>
                    <th>Hóa đơn</th>
                </tr>
                <?php
                foreach ($bill as $value) {
                    extract($value);

                    $huy_don = "index.php?act=delete_gd&id=" . $id;
                    if ($status == 0) {
                        $st = "Đang xử lý";
                        $color = "black;";
                        $coin = 0;
                    }
                    if ($status == 1) {
                        $st = "Giao dịch thành công";
                        $color = "green;";
                        if ($price == 20000) {
                            $coin = 20000;
                        }
                        if ($price == 50000) {
                            $coin = 50000;
                        }
                        if ($price == 100000) {
                            $coin = 120000;
                        }
                        if ($price == 200000) {
                            $coin = 240000;
                        }
                        if ($price == 500000) {
                            $coin = 550000;
                        }
                    }
                    if ($status == 2) {
                        $st = "Giao dịch thất bại";
                        $color = "red;";
                        $coin = 0;
                    }
                ?>
                    <tr>
                        <td><?= $name ?></td>
                        <td><?= $email ?></td>
                        <td><?= $address ?></td>
                        <td><?= $phone ?></td>
                        <td><?= $date ?></td>
                        <td><?= number_format($price); ?> VNĐ</td>
                        <td style="color:<?= $color ?>"><?= $st ?></td>
                        <td><?= $coin ?> Coin</td>

                        <td class="p-2 border-2 border-solid "><img class="w-[50px] h-[70px]" src="./content/uploads/bill/<?= $images ?>" alt=""> </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <h1 class="text-center font-medium text-orange-500 p-2 px-4 text-3xl rounded">Bạn chưa có giao dịch nào</h1>
            <?php
            }
        } else {
            ?>
            <h1 class="text-center font-medium text-orange-500 p-2 px-4 text-3xl rounded">Bạn cần đăng nhập để xem lịch sử giao dịch</h1>
        <?php
        }
        ?>
    </table>
</article>
<article>
    <h1 class="hoa_don_h1"><i class="fas fa-history"></i>Lịch sử giao dịch</h1>
    <table class="hoa_don">
        <?php
        if (isset($_SESSION['auth'])) {
        ?>
            <tr>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Địa</th>
                <th>Số điện thoại</th>
                <th>Thời gian nạp</th>
                <th>Mệnh giá</th>
                <th>Tình trạng</th>
                <th>Coin nhận được</th>
                <th></th>
            </tr>
            <?php
            foreach ($bill as $value) {
                extract($value);
                $huy_don = "index.php?act=delete_gd&id=".$id;
                if ($status == 0) {
                    $st = "Đang xử lý";
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
                    <td><a class=" p-2 px-4 bg-orange-400 text-white hover:bg-blue-400 cursor-pointer" onclick="del_gd('<?= $huy_don ?>')">Hủy giao dịch</a></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <h1 class="text-center font-medium text-orange-500 p-2 px-4 text-3xl rounded border-1 border-solid border-yellow-500">Bạn cần đăng nhập để xem lịch sử giao dịch</h1>
            </th>
        <?php
        }
        ?>
    </table>
</article>
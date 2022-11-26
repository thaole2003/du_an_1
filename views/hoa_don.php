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
            </tr>
            <?php
            foreach ($bill as $value) {
                extract($value);
                if($status == 0){
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
                    <td><?= $price ?> VNĐ</td>
                    <td style="color:<?= $color ?>"><?= $st ?></td>
                    <td><?= $coin ?> Coin</td>
                </tr>
            <?php
            }
        } else {
            ?>
            <h1>Bạn cần đăng nhập để xem lịch sử giao dịch</h1>
        <?php
        }
        ?>
    </table>
</article>
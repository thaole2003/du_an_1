<article>
    <table class="ct_coin">
        <tr>
            <td colspan="2">
                <h1>Chi tiết giao dịch</h1>
            </td>
        </tr>
        <tr>
            <td>
                <p>Phương thức thanh toán</p>
            </td>
            <td><span>Chuyển khoản ngân hàng</span></td>
        </tr>
        <tr>
            <td><div class="vien"></div>
                <p>Mệnh giá</p>
            </td>
            <td><div class="vien"></div>
                <span><?= $price ?> VNĐ</span></td>
        </tr>
        <tr>
            <td><div class="vien"></div>
                <p>Người nạp</p>
            </td>
            <td><div class="vien"></div>
                <span><?= $name ?></span></td>
        </tr>
        <tr>
            <td><div class="vien"></div>
                <p>Email</p>
            </td>
            <td><div class="vien"></div>
                <span><?= $email ?></span></td>
        </tr>
        <tr>
            <td><div class="vien"></div>
                <p>Số điện thoại</p>
            </td>
            <td><div class="vien"></div>
                <span><?= $phone ?></span></td>
        </tr>
        <tr>
            <td><div class="vien"></div>
                <p>Coin nhận được</p>
            </td>
            <td><div class="vien"></div>
                <?php 
                    if($price == 20000){
                        $coin = "20000";
                    }
                    if($price == 50000){
                        $coin = "50000";
                    }
                    if($price == 100000){
                        $coin = "120000";
                    }
                    if($price == 200000){
                        $coin = "240000";
                    }
                    if($price == 500000){
                        $coin = "550000";
                    }
                ?>
                <span><?= $coin ?> Coin</span>
            
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="vien"></div>
                <b>Chuyển khoản tới ngân hàng BIDV <br>
                    STK: 21210000884846 <br>
                    Nội dung: "nap_coin_truyen_<?= $price ?>_coin" <br>
                    Chú ý: Nhập sai nội dung và mệnh giá sẽ không nhận được coin
                </b>
            </td>
        </tr>
        <tr>
            <td colspan="2"><a href="#">Thanh toán</a></td>
        </tr>
    </table>
</article>
<article>
    <table class="ct_coin">
        <form action="index.php?act=thanh_toan" method="POST" enctype="multipart/form-data">
            <tr>
                <td colspan="2">
                    <h1>Chi tiết giao dịch</h1>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Phương thức thanh toán</p>
                </td>
                <td>
                    <input type="text" name="" value="Chuyển khoản ngân hàng" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="vien"></div>
                    <p>Mệnh giá</p>
                </td>
                <td>
                    <div class="vien"></div>
                    <input type="text" name="" value="<?= number_format($price); ?> VNĐ" disabled>
                    <input type="hidden" name="price" value="<?= $price ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <div class="vien"></div>
                    <p>Người nạp</p>
                </td>
                <td>
                    <div class="vien"></div>
                    <input type="text" name="name" value="<?= $_SESSION['auth']['name']; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="vien"></div>
                    <p>Email</p>
                </td>
                <td>
                    <div class="vien"></div>
                    <input type="text" name="email" value="<?= $_SESSION['auth']['email']; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="vien"></div>
                    <p>Địa chỉ</p>
                </td>
                <td>
                    <div class="vien"></div>
                    <input type="text" name="address" value="<?= $_SESSION['auth']['address']; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="vien"></div>
                    <p>Số điện thoại</p>
                </td>
                <td>
                    <div class="vien"></div>
                    <input type="text" name="phone" value="<?= $_SESSION['auth']['phone']; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="vien"></div>
                    <p>Coin nhận được</p>
                </td>
                <td>
                    <div class="vien"></div>
                    <?php
                    if ($price == 20000) {
                        $coin = "20000";
                    }
                    if ($price == 50000) {
                        $coin = "50000";
                    }
                    if ($price == 100000) {
                        $coin = "120000";
                    }
                    if ($price == 200000) {
                        $coin = "240000";
                    }
                    if ($price == 500000) {
                        $coin = "550000";
                    }
                    ?>
                    <input type="text" name="coin" value="<?= number_format($coin) ?> Coin" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="vien"></div>
                    <p class="">Hóa đơn chuyển tiền</p>
                </td>
                <td class="items-center">
                    <div class="vien" style="margin-top: 5px;"></div>
                    <input type="file" name="fileupload" id="fileToUpload">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <b style="color:red; margin-left: 200px"><?php echo isset($_SESSION['bill']) ? $_SESSION['bill'] : '' ?></b>
                    <?php unset($_SESSION['bill']) ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="vien"></div>
                    <b>Chuyển khoản tới ngân hàng BIDV <br>
                        STK: 21210000884846 <br>
                        Nội dung: "nap_coin_truyen_<?= $price ?>_vnd" <br>
                        Chú ý: <b style="color: red;">Nhập sai nội dung và mệnh giá sẽ không nhận được coin</b>
                    </b>
                </td>
            </tr>

            <tr>
                <td colspan="2"><button name="nap_coin" class="cursor-pointer">Thanh toán</button></td>
            </tr>
        </form>
    </table>
</article>
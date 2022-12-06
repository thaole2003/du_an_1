<article>
    <div class="coin_thanh_toan">
        <table class="bang_coin">
            <tr>
                <td colspan="2">BẢNG QUY ĐỔI MỆNH GIÁ COIN</td>
            </tr>
            <tr>
                <td>20,000 VNĐ</td>
                <td><span>20,00 Coin</span></td>
            </tr>
            <tr>
                <td>50,000 VNĐ</td>
                <td><span>50,000 Coin</span></td>
            </tr>
            <tr>
                <td>100,000 VNĐ</td>
                <td><span>120,000 Coin</span></td>
            </tr>
            <tr>
                <td>200,000 VNĐ</td>
                <td><span>240,000 Coin</span></td>
            </tr>
            <tr>
                <td>500,000 VNĐ</td>
                <td><span>550,000 Coin</span></td>
            </tr>
        </table>
        <table class="thanh_toan">
            <form action="index.php?act=coin" method="POST">
                <tr>
                    <td colspan="2">Hình thức thanh toán
                        <div class="vien"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Thanh toán ATM nội địa</p>
                    </td>
                    <td><img src="content/img/logo_coin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="vien"></div>
                        <p>Phí giao dịch</p>
                    </td>
                    <td>
                        <div class="vien"></div>
                        <span>Miễn phí</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="vien"></div>

                        <select name="price" id="">
                            <option value="0">Mệnh giá</option>
                            <option value="20000">20,000 VNĐ</option>
                            <option value="50000">50,000 VNĐ</option>
                            <option value="100000">100,000 VNĐ</option>
                            <option value="200000">200,000 VNĐ</option>
                            <option value="500000">500,000 VNĐ</option>
                        </select>
                        <span class="font-medium text-red-500"><?php if (isset($menh_gia)) { echo $menh_gia; } 
                        ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="nap_coin" id="" value="Thanh toán">
                    </td>
                </tr>
            </form>
        </table>
    </div>
</article>
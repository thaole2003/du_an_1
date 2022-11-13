<!--Phần article-->
<article>
    <div class="banner">
        <table border="0">
            <!--Truyện nổi bật-->
            <tr>
                <td>
                    <a href="index.php?act=chi_tiet_truyen" class="item_1">
                        <div class="img"><img src="content/img/banner/banner_1.jpg" alt="">
                            <div class="ngay_xb">22/12/2022</div>
                            <div class="text">One Pice</div>
                        </div>
                    </a>
                </td>
                <td rowspan="2" style="padding: 0px 5px;">
                    <a href="#" class="item_2">
                        <div class="img"><img src="content/img/banner/banner_3.jpg" alt="">
                            <div class="ngay_xb">22/12/2022</div>
                            <div class="text">Học Viện Anh Hùng</div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="#" class="item_1">
                        <div class="img"><img src="content/img/banner/banner_4.jpg" alt="">
                            <div class="ngay_xb">22/12/2022</div>
                            <div class="text">Fairy Tail 100 Year Quest</div>
                        </div>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#" class="item_1">
                        <div class="img"><img src="content/img/banner/banner_2.jpg" alt="">
                            <div class="ngay_xb">22/12/2022</div>
                            <div class="text">Thất Hình Đại Hội</div>
                        </div>
                    </a>
                </td>
                <td>
                    <a href="#" class="item_1">
                        <div class="img"><img src="content/img/banner/banner_5.jpg" alt="">
                            <div class="ngay_xb">22/12/2022</div>
                            <div class="text">Black Clover - Thế Giới Phép Thuật</div>
                        </div>
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <!--Truyện hot-->
    <div class="truyen_hot">
        <h3><i class="fa-solid fa-star"></i>Truyện hot</h3>
        <div class="rol">
            <?php 
            foreach($comic_by_view as $key => $value){
                extract($value);
?>
<a href="index.php?act=detail&id=<?=$id?>">
                <div class="col">
                    <div class="product">
                        <div class="img"><img src="<?= $iname ?>" alt=""></div>
                        <div class="text">
                            <a href="#">
                                <h4><?= $name?></h4>
                            </a>
                        </div>
                        <div class="ngay_update">
                            <h5><?php echo substr($date, 0,11)?>
                        </h5>
                        </div>
                    </div>
                </div>
            </a>
  <?php          }
            ?>
            
           
        </div>
    </div>
    <div class="clear"></div>
    <!--Truyện-->
    <div class="truyen">
        <h3><i class="fa-solid fa-cloud-arrow-down"></i>Truyện mới cập nhật</h3>
        <?php foreach($comic_by_date as $key => $value ){?>
            <?php extract($value) ?>
            <a href="index.php?act=detail&id=<?=$id?>">
            <div class="col">
                <div class="img"><img src="<?= $iname ?>" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4><?= $name?></h4>
                    </a>
                    <div class="ngay_update">
                        <h5><?php echo substr($date, 0,11)?></h5>
                    </div>
                </div>
            </div>
        </a>
            <?php } ?>
    </div>

    <div class="clear"></div>

    <div class="trang">
        <a href="#">
            << </a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">>></a>
    </div>
</article>
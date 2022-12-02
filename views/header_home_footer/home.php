<!--Phần article-->
<article>
    <div class="banner">
        <?php
        $i = 1;
        foreach ($like_comic as $like) {
            extract($like);
            // echo '<pre>';
            // print_r($like);
            // die;
            if (($i == 1)) {
                $number = '3';
            } elseif ($i == 2) {
                $number = '1';
            } elseif ($i == 3) {
                $number = '2';
            } elseif ($i == 4) {
                $number = '4';
            } elseif ($i == 5) {
                $number = '5';
            }
            echo '
                <div class="col_' . $number . '">
                    <a href="index.php?act=detail&id=' . $id . '" class="item_1">
                        <div class="img"><img src="content/uploads/cover_img/' . $img . '" alt="">
                            <div class="ngay_xb">' . substr($date, 0, 11) . '</div>
                            <div class="text">' . $name . '</div>
                        </div>
                    </a>
                </div>
                ';
            $i += 1;
        }
        ?>
    </div>
    <div class="clear"></div>

    <!--Truyện Svip-->
    <div class="truyen_svip">
        <h3><i class="fab fa-hotjar"></i>Truyện Svip</h3>

        <div class="rol">
            <?php foreach ($comic_svip as $value) {
                extract($value);
                // echo '<pre>';
                // print_r($value);
            ?>
                <a href="index.php?act=detail&id=<?= $id ?>">
                    <div class="col">
                        <div class="product">
                            <div class="img"><img src="content/uploads/cover_img/<?= $cover_image ?>"></div>
                            <div class="text">
                                <a href="index.php?act=detail&id=<?= $id ?>">
                                    <?= $name ?>
                                </a>
                                <p><?= number_format($price); ?> Coin</p>
                            </div>
                            <div class="ngay_update">
                                <h5>
                                    <?= substr($date, 0, 11) ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </a>
            <?php
            }
            ?>
        </div>

    </div>
    <div class="clear"></div>
    <!--Truyện hot-->
    <div class="truyen_hot">
        <h3><i class="fa-solid fa-star"></i>Truyện hot</h3>
        <div class="rol">
            <?php
            foreach ($comic_by_view as $key => $value) {
                extract($value);
                if ($vip == 1) {
                    $display = "block";
                } else {
                    $display = "none";
                }
            ?>
                <a href="index.php?act=detail&id=<?= $id ?>">
                    <div class="col">
                        <div class="product">
                            <div class="img"><img src="content/uploads/cover_img/<?= $iname ?>" alt=""></div>
                            <div class="text">
                                <a href="index.php?act=detail&id=<?= $id ?>">
                                    <h4><?= $name ?></h4>
                                </a>
                                <p style="display: <?= $display ?>;"><?= number_format($price); ?> Coin</p>
                            </div>
                            <div class="ngay_update">
                                <h5><?php echo substr($date, 0, 11) ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </a>
            <?php }
            ?>
        </div>
    </div>
    <div class="clear"></div>

    <!--Truyện-->
    <div class="truyen" style="margin-top: 35px;">
        <h3><i class="fa-solid fa-cloud-arrow-down"></i>Truyện mới cập nhật</h3>
        <?php
        foreach ($comic_by_date as $value) {
            extract($value);
            if ($vip == 1) {
                $display = "block";
            } else {
                $display = "none";
            }
        ?>

            <a href="index.php?act=detail&id=<?= $id ?>">
                <div class="col">
                    <div class="img"><img src="content/uploads/cover_img/<?= $iname ?>" alt="">
                    </div>
                    <div class="text">
                        <a href="#">
                            <h4><?= $name ?></h4>
                        </a>
                        <p style="display: <?= $display ?>;"><?= number_format($price); ?> Coin</p>
                        <div class="ngay_update">
                            <h5 style="color:white;"><?php echo substr($date, 0, 11) ?></h5>
                        </div>
                    </div>
                </div>
            </a>
        <?php }
        ?>
    </div>

    <div class="clear"></div>
    <div class="trang">
        <?php
        $count = count_comic();
        $dem = $count['soluong'] / 18;

        for ($i = 0; $i < $dem; $i++) {
        ?>
            <a style="background-color: 
            <?php
                if(isset($_GET['id'])){
                    if($_GET['id'] == $i){
                        echo '#ed9c56;';
                    }else{
                        echo "";
                    }
                }else{
                    if($i == 0){
                        echo '#ed9c56;';
                    }else{
                        echo "";
                    }
                }
            ?>
            " href="index.php?act=trang&id=<?= $i ?>"><?= $i + 1 ?></a>
        <?php
        }
        ?>
    </div>
</article>
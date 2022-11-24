<!--Phần article-->
<article>
    <div class="truyen_hot">
        <h3><i class="fa-solid fa-star"></i>Truyện yêu thích</h3>
        <div class="rol">
            <?php
            if (isset($_SESSION['auth'])) {
                foreach ($love_comic as $value) {
                    extract($value);
                    // echo '<pre>';
                    // print_r($value);
            ?>
                    <a href="index.php?act=detail&id=<?= $id ?>">
                        <div class="col">
                            <div class="product">
                                <div class="img"><img src="content/uploads/cover_img/<?= $cover_image ?>" alt=""></div>
                                <div class="text">
                                    <a href="#">
                                        <h4><?= $name ?></h4>
                                    </a>
                                </div>
                                <div class="ngay_update">
                                    <h5><?php echo substr($date, 0, 11) ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </a>
            <?php
                }
            }else{
                ?>
                <h1 class="h1_text">Hãy đăng nhập để có thể thêm truyện yêu thích</h1>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="clear"></div>
</article>
<article class="mb-60">
    <div class="truyen_hot">
        <h3 class='text-center'> <i class="fa-solid fa-heart"></i>Từ khóa của bạn tìm là '<?= $textsearch ?>'</h3>
        <h4 class='text-center'>Kết quả tìm kiếm</h4>
        <div class="rol">
            <?php
            foreach ($all_search as $key => $value) {
                if ($value['vip'] == 1) {
                    $display = "block";
                } else {
                    $display = "none";
                }
            ?>
                <a href="index.php?act=detail&id=<?= $value['id']; ?>">
                    <div class="col">
                        <div class="product">
                            <div class="img"><img class="w-[200px] h-[300px]" src="content/uploads/cover_img/<?php echo $value['img_name'] ?>" alt="">
                            </div>
                            <div class="text">
                                <a href="index.php?act=detail&id=<?= $value['id']; ?>">
                                    <h4><?php echo $value['name'] ?></h4>
                                    <p style="display: <?= $display ?>;"><?= number_format($value['price']); ?> Coin</p>
                                </a>
                                <div class="ngay_update">
                                    <h5><?php echo substr($value['date'], 0, 11) ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="clear"></div>
</article>
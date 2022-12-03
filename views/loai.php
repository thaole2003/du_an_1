<!--Phần article-->
<article>
    <div class="truyen">
        <?php
        if (!isset($_GET['ma_svip'])) {
        ?>
            <h3 class="text-center"> <i class="fa-solid fa-flag"></i>Thể loại '
                <?php
                if ($all_comic_by_categoryid) {
                    echo $all_comic_by_categoryid[0]['ca_name'];
                } ?>'</h3>
            <div>

                <?php
                if ($all_comic_by_categoryid) {
                    foreach ($all_comic_by_categoryid as $key => $value) {
                ?>
                        <a href="index.php?act=detail&id=<?= $value['id'] ?>">
                            <div class="col">
                                <div class="img"><img src="content/uploads/cover_img/<?php echo $value['img_name'] ?>" alt="">
                                </div>
                                <div class="text">
                                    <a href="index.php?act=detail&id=<?= $value['id'] ?>">
                                        <h4><?php echo $value['name'] ?></h4>
                                    </a>
                                    <div class="ngay_update">
                                        <h5><?php echo substr($value['date'], 0, 11) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <h1 class="text-center font-medium text-orange-500 p-2 px-4 text-3xl rounded border-1 border-solid border-yellow-500">Chưa có truyện</h1>
                <?php
                }
            } else {
                ?>
                <h3 class="text-center"> <i class="fa-solid fa-flag"></i>Truyện 'Svip'</h3>
                <?php
                foreach ($all_svip as $value) {
                    extract($value);
                ?>
                    <a href="index.php?act=detail&id=<?= $value['id'] ?>">
                        <div class="col">
                            <div class="img"><img src="content/uploads/cover_img/<?php echo $value['cover_image'] ?>" alt="">
                            </div>
                            <div class="text">
                                <a href="index.php?act=detail&id=<?= $value['id'] ?>">
                                    <h4><?php echo $value['name'] ?></h4>
                                </a>
                                <p><?= number_format($value['price']); ?> Coin</p>
                                <div class="ngay_update">
                                    <h5 style="color: white;"><?php echo substr($value['date'], 0, 11) ?></h5>
                                </div>
                            </div>
                        </div>
                    </a>
            <?php
                }
            }
            ?>
            </div>
    </div>

    <div class="clear"></div>
</article>
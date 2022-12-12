<!--Phần article-->
<article class="mb-60">
    <div class="truyen">
        <h3> <i class="fa-solid fa-flag"></i><?php echo isset($_SESSION['auth']) ? "lịch sử đọc của bạn" : "bạn cần đăng nhập để xem lịch sử" ?> </h3>
        <div class="rol">
            <?php
            if (isset($_SESSION['auth'])) {
                $all_history = history_comic($_SESSION['auth']['id']);
                if ($all_history) {
                    foreach ($all_history as $Key => $value) {
                        extract($value); ?>
                        <a class="" href="index.php?act=detail&id=<?= $id ?>">
                            <div class="col">
                                <div class="img"><img src="content/uploads/cover_img/<?= $cover_image ?>" alt="">
                                </div>
                                <div class="text">
                                    <a href="#">
                                        <h4><?= $name ?></h4>
                                    </a>
                                    <div class="ngay_update">
                                        <h5 style="color: white;"><?= substr($date, 0, 11) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </a>
            <?php
                    }
                }else{
                    ?>
                     <h1 class="text-center font-medium text-orange-500 p-2 px-4 text-3xl rounded">Bạn chưa đọc truyện nào</h1>
                    <?php
                }
            } ?>
        </div>
    </div>
    <div class="clear"></div>
</article>
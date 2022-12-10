<!--Phần article-->
<article>
    <!--Đọc truyện-->
    <div class="truyen_doc">
        <div class="title_truyen">
            <a href="#">Trang chủ</a> / <a href="index.php?act=detail&id=<?= $id ?>"><?= $doc_truyen[0]['name'] ?></a>/ <a href="index.php?act=detail&id=<?= $id ?>">Tập <?= $number_chapter ?>: <?= $noi_dung ?></a>
            <h2>Bạn đang đọc truyện</h2>
            <h1><?= $doc_truyen[0]['name'] ?></h1>
        </div>
        <div class="img_comic text-center ">
            <?php foreach ($doc_truyen as $img) {
            ?>
                <img src="content/uploads/img_cua_comic/<?= $img['img'] ?>" alt="">
            <?php } ?>
        </div>
        <div style="margin-bottom: 20px;">
            <?php
            if ($number_chapter == 1) {
                $display = "none";
            } else {
                $display = "block";
            }
            ?>
            <div class="left_prive bg-orange-300 hover:bg-blue-300 rounded-md p-2" style="
            float: left;
            display: <?= $display ?>;">
                <?php
                $id_chapter = $number_chapter - 1;
                $nd_chapter = load_one_nd_chapter($id, $id_chapter);
                ?>
                <a href="index.php?act=doc_truyen&id=<?= $id ?>&number_chapter=<?= $id_chapter ?>&noi_dung=<?= $nd_chapter['noi_dung'] ?>">Tập trước</a>
            </div>

            <?php
            $sl_chapter = count_sl_chapter($id);

            if ($number_chapter == $sl_chapter) {
                $display_chapter = "none";
            } else {
                $display_chapter = "block";
            }
            ?>
            <div class="right_next bg-orange-300 hover:bg-blue-300 rounded-md p-2" style="
            float: right;
            display: <?= $display_chapter ?>;">
                <?php
                $id_chapter = $number_chapter + 1;
                $nd_chapter = load_one_nd_chapter($id, $id_chapter);
                ?>
                <a href="index.php?act=doc_truyen&id=<?= $id ?>&number_chapter=<?= $id_chapter ?>&noi_dung=<?= $nd_chapter['noi_dung'] ?>">Tập sau</a>
            </div>
        </div>
    </div>
</article>
<!--Phần article-->
<article>
    <!--Đọc truyện-->
    <div class="truyen_doc">
        <div class="title_truyen">
            <a href="#">Trang chủ</a> / <a href="index.php?act=detail&id=<?= $id ?>"><?= $doc_truyen[0]['name'] ?></a>
            <h2>Bạn đang đọc truyện</h2>
            <h1><?= $doc_truyen[0]['name'] ?></h1>
        </div>
        <div class="img_comic text-center ">
            <?php foreach ($doc_truyen as $img) {
            ?>
                <img src="content/uploads/img_cua_comic/<?= $img['img'] ?>" alt="">
            <?php } ?>
        </div>
    </div>
</article>
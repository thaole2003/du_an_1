<!--Phần article-->
<article>
    <!--Đọc truyện-->
    <div class="truyen_doc">
        <div class="title_truyen">
            <a href="#">Trang chủ</a> / <a href="#"><?= $doc_truyen['ca_name'] ?></a>
            <h2>Bạn đang đọc truyện</h2>
            <h1><?= $doc_truyen['name'] ?></h1>
        </div>
        <div class="img_comic text-center ">
            <img src="<?= $doc_truyen['img_name'] ?>" alt="">
         <p class="w-1/2 text-center font-serif text-2xl tracking-widest leading-7 container mx-auto">
         <?= $doc_truyen['detail'] ?>
         </p>
        </div>
    </div>
</article>
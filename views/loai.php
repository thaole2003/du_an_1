<!--Phần article-->
<article>
     <div class="truyen">
        <h3 class="text-center">  <i class="fa-solid fa-flag"></i>Thể loại '<?php  echo $all_comic_by_categoryid[0]['ca_name'] ?>'</h3>
        <div>

        <?php foreach($all_comic_by_categoryid as $key => $value){

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
        <?php } ?>
        </div>
    </div>

    <div class="clear"></div>
</article>
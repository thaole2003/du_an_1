<!--Phần article-->
<article>
    <div class="nen">
        <div class="trangchu_phim">
            <a href="#">Trang chủ</a> / <a href="#"><?=  $detail_comic['ca_name'] ?></a>
        </div>
        <div class="col">
            <div class="product">
                <div class="left">
                    <div class="img"><img
                            src="<?=  $detail_comic['img_name'] ?>" alt="">
                    </div>
                </div>
                <div class="right">
                    <h2><?= $detail_comic['name'] ?></h2>
                    <table border="0">
                        <tr>
                            <td><i class="fa-sharp fa-solid fa-plus"></i> Tên khác</td>
                            <td class="kc"></td>
                            <td>null</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-person"></i> Tác giả</td>
                            <td class="kc"></td>
                            <td><?= $detail_comic['author'] ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-wifi"></i> Tình trạng</td>
                            <td class="kc"></td>
                            <td>Đã hoàn thiện</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-thumbs-up"></i> Lượt thích</td>
                            <td class="kc"></td>
                            <td><?= $detail_comic['like_comic']?></td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-eye"></i> Lượt xem</td>
                            <td class="kc"></td>
                            <td><?= $detail_comic['view']?></td>
                        </tr>
                    </table>
                    <div class="loai_truyen">
                        <a href="#"><?= $detail_comic['ca_name']?></a>
                     
                    </div>
                    <div class="clear"></div>
                    <div class="chon">
                        <a href="index.php?act=doc_truyen">Đọc truyện</a>
                        <a href="#">Thích</a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="gioi_thieu">
            <h3><i class="fa-solid fa-info"></i>Giới thiệu</h3>
            <p>
            <?= $detail_comic['intro'] ?>
            </p>
        </div>
        <div class="binh_luan">
            <h3><i class="fa-regular fa-comments"></i>Bình luận</h3>
        </div>
    </div>
    <div class="truyen">
        <h3>  <i class="fa-solid fa-flag"></i>Truyện cùng thể loại</h3>
        <div class="flex flex-wrap">
            <?php
              $truyen_tuong_tu = all_comic_by_categoryid($detail_comic['ca_id'] );
            foreach($truyen_tuong_tu as $key => $value){ 
                extract($value);
                ?>
                
        <a href="index.php?act=detail&id=<?=$id?>">
            <div class="col">
                <div class="img"><img src="<?=$img_name?>" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4><?=$name?></h4>
                       
                    </a>
                    <div class="ngay_update">
                        <h5><?=$date?></h5>
                    </div>
                </div>
            </div>
        </a>
        <?php  } ?>
        </div>
        
        
    </div>
</article>
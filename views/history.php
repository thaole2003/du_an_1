<!--Phần article-->
<article>
     <div class="truyen">
     <h3>  <i class="fa-solid fa-flag"></i><?php echo isset($_SESSION['auth'])? "lịch sử đọc của bạn" : "bạn cần đăng nhập để xem lịch sử" ?> </h3>
 
<?php 

if(isset($_SESSION['auth'])){
    $all_history=history_comic($_SESSION['auth']['id']);
foreach($all_history as $Key => $value){
    extract($value);?>
    <a href="#">
    <div class="col">
        <div class="img"><img src="content/uploads/cover_img/<?= $cover_image ?>" alt="">
        </div>
        <div class="text">
            <a href="#">
                <h4><?= $name ?></h4>
            </a>
            <div class="ngay_update">
                <h5><?= $date ?></h5>
            </div>
        </div>
    </div>
</a>
<?php 
}

}?>
     
       
    </div>

    <div class="clear"></div>
</article>
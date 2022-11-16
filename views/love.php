<!--Phần article-->
<article>
<div class="truyen">
        <h3> <i class="fa-solid fa-heart"></i>Truyện Yêu Thích</h3>
        <div class="w-full">
            <?php foreach($all_love as $key => $value){
                extract($value);
      
                ?>
                
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/uploads/cover_img/<?php echo $img_name ?>" alt=""/>
                </div>
                <div class="text">
                    <a href="#">
                        <h4>                <?= $name?>
</h4>
                      
                    </a>
                    <div class="Lượt thích flex items-center justify-center">
                        <h5 class="mt-5 pt-5"><?=$like_comic?></h5>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 30" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
</svg>

                    </div>
                </div>
            </div>
        </a>
        <?php } ?>
        </div>
        
        
    </div>

    <div class="clear"></div>
</article>
<div class="truyen">
        <h3 class='text-center'> <i class="fa-solid fa-heart"></i>Từ khóa của bạn tìm là <?php echo $_POST['textsearch'] ?></h3>
        <div class="flex">


        <?php 
        foreach($all_search as $key => $value){
        ?>
        <a href="#">
            <div class="">
                <div class=""><img class="w-[200px] h-[200px]" src="<?php echo $value['img_name'] ?>" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4><?php echo $value['name'] ?></h4>
                      
                    </a>
                    <div class="ngay_update">
                        <h5><?php echo $value['date'] ?></h5>
                    </div>
                </div>
            </div>
        </a>
        </div>
      <?php } ?>
    </div>

    <div class="clear"></div>
</article>

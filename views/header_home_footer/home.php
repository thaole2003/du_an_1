<!--Phần article-->
<article>
    <div class="banner">
        <!--Truyện nổi bật-->
        <!-- <div class="col_1">
            <a href="index.php?act=chi_tiet_truyen" class="item_1">
                <div class="img"><img src="content/img/banner/banner_1.jpg" alt="">
                    <div class="ngay_xb">22/12/2022</div>
                    <div class="text">One Pice</div>
                </div>
            </a>
        </div>
        <div class="col_2">
            <a href="index.php?act=chi_tiet_truyen" class="item_1">
                <div class="img"><img src="content/img/banner/banner_1.jpg" alt="">
                    <div class="ngay_xb">22/12/2022</div>
                    <div class="text">One Pice</div>
                </div>
            </a>
        </div>
        <div class="col_3">
            <a href="index.php?act=chi_tiet_truyen" class="item_1">
                <div class="img"><img src="content/img/banner/banner_1.jpg" alt="">
                    <div class="ngay_xb">22/12/2022</div>
                    <div class="text">One Pice</div>
                </div>
            </a>
        </div>
        <div class="col_4">
            <a href="index.php?act=chi_tiet_truyen" class="item_1">
                <div class="img"><img src="content/img/banner/banner_1.jpg" alt="">
                    <div class="ngay_xb">22/12/2022</div>
                    <div class="text">One Pice</div>
                </div>
            </a>
        </div>
        <div class="col_5">
            <a href="index.php?act=chi_tiet_truyen" class="item_1">
                <div class="img"><img src="content/img/banner/banner_1.jpg" alt="">
                    <div class="ngay_xb">22/12/2022</div>
                    <div class="text">One Pice</div>
                </div>
            </a>
        </div>  -->
        <?php
            $i = 1;
            foreach($like_comic as $like){
                extract($like);
                // echo '<pre>';
                // print_r($like);
                // die;
                if(($i == 1)){
                    $number = '3';
                }elseif($i == 2){
                    $number = '1';
                }elseif($i == 3){
                    $number = '2';
                }elseif($i == 4){
                    $number = '4';
                }elseif($i == 5){
                    $number = '5';
                }
                echo '
                <div class="col_'.$number.'">
                    <a href="index.php?act=chi_tiet_truyen" class="item_1">
                        <div class="img"><img src="'.$img.'" alt="">
                            <div class="ngay_xb">'.substr($date,0,11).'</div>
                            <div class="text">'.$name.'</div>
                        </div>
                    </a>
                </div>
                ';
                $i+=1;
            }
        ?>
    </div>
    <div class="clear"></div>
    <!--Truyện hot-->
    <div class="truyen_hot">
        <h3><i class="fa-solid fa-star"></i>Truyện hot</h3>
        <div class="rol">
            <a href="#">
                <div class="col">
                    <div class="product">
                        <div class="img"><img src="content/img/truyen_hot/truyen_hot_1.jpg" alt=""></div>
                        <div class="text">
                            <a href="#">
                                <h4>Onepice</h4>
                            </a>
                        </div>
                        <div class="ngay_update">
                            <h5>21/10/2022</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="col">
                    <div class="product">
                        <div class="img"><img src="content/img/truyen_hot/truyen_hot_1.jpg" alt=""></div>
                        <div class="text">
                            <a href="#">
                                <h4>Onepice</h4>
                            </a>
                        </div>
                        <div class="ngay_update">
                            <h5>21/10/2022</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="col">
                    <div class="product">
                        <div class="img"><img src="content/img/truyen_hot/truyen_hot_1.jpg" alt=""></div>
                        <div class="text">
                            <a href="#">
                                <h4>Onepice</h4>
                            </a>
                        </div>
                        <div class="ngay_update">
                            <h5>21/10/2022</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="col">
                    <div class="product">
                        <div class="img"><img src="content/img/truyen_hot/truyen_hot_1.jpg" alt=""></div>
                        <div class="text">
                            <a href="#">
                                <h4>Onepice</h4>
                            </a>
                        </div>
                        <div class="ngay_update">
                            <h5>21/10/2022</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="col">
                    <div class="product">
                        <div class="img"><img src="content/img/truyen_hot/truyen_hot_1.jpg" alt=""></div>
                        <div class="text">
                            <a href="#">
                                <h4>Onepice</h4>
                            </a>
                        </div>
                        <div class="ngay_update">
                            <h5>21/10/2022</h5>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="clear"></div>
    <!--Truyện-->
    <div class="truyen">
        <h3><i class="fa-solid fa-cloud-arrow-down"></i>Truyện mới cập nhật</h3>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="col">
                <div class="img"><img src="content/img/truyen_moi_cap_nhat/nguoi-o-re-bi-ep-thanh-phan-dien_1594777230.jpg" alt="">
                </div>
                <div class="text">
                    <a href="#">
                        <h4>Onepice</h4>
                    </a>
                    <div class="ngay_update">
                        <h5>21/10/2022</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="clear"></div>

    <div class="trang">
        <a href="#">
            << </a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">>></a>
    </div>
</article>
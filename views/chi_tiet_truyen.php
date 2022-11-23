<!--Phần article-->
<article>
    <div class="nen">
        <div class="trangchu_phim">
            <a href="#">Trang chủ</a> / <a href="index.php?act=detail&id=<?= $id ?>"><?= $detail_comic['name'] ?></a>
        </div>
        <div class="col">
            <div class="product">
                <div class="left">
                    <div class="img"><img src="content/uploads/cover_img/<?= $detail_comic['img_name'] ?>" alt="">
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
                            <td><?= $detail_comic['like_comic'] ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-eye"></i> Lượt xem</td>
                            <td class="kc"></td>
                            <td><?= $detail_comic['view'] ?></td>
                        </tr>
                    </table>
                    <div class="loai_truyen">
                        <a href="index.php?act=loai&ma_loai=<?= $detail_comic['category_id'] ?>"><?= $detail_comic['ca_name'] ?></a>

                    </div>
                    <div class="clear"></div>
                    <div class="chon flex items-center">
                        <a href="index.php?act=doc_truyen&id=<?= $id ?>">Đọc truyện</a>

                        <?php
                        if (isset($_SESSION['auth'])) {


                            if (check_love_comic($detail_comic['id'], $_SESSION['auth']['id']) == "") {
                        ?>
                                <form action="" method="POST">
                                    <a href=""><button name="love_comic">Yêu thích</button></a>
                                </form>
                            <?php
                            } else {
                            ?>
                                <form action="" method="POST">
                                    <a href=""><button name="delete_love_comic">Bỏ Yêu thích</button></a>
                                </form>
                        <?php
                            }
                        }else{
                            ?>
                            <form action="" method="POST">
                                    <a href=""><button name="love_comic">Yêu thích</button></a>
                                </form>
                            <?php
                        }
                        ?>
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
        <div class="binh_luan w-[500px]">
            <h3><i class="fa-regular fa-comments"></i>Bình luận</h3>

            <?php foreach ($load_cmt as $key => $value) {
                extract($value) ?>
                <div class="flex">
                    <p class="font-medium p-2 text-lg ">Tên:</p>
                    <p class="font-medium p-2 text-lg text-red-400"><?= $u_name ?></p>
                </div>
                <div class="flex">
                    <p class="font-medium p-2 text-lg ">Nội dung:</p>
                    <p class="font-medium p-2 "> <?= $detail ?></p>
                </div>
                <div class="flex">
                    <p class="font-medium p-2 text-lg ">Ngày giờ:</p>
                    <p class="p-2 "><?= $date ?></p>
                </div>
                <hr>
            <?php } ?>

            <form action="" method="POST">
                <div class="flex p-2 gap-2">
                    <input type="text" name='text_cmt' class="border border-solid border-zinc-400 h-10 w-[300px] rounded-md border-yellow-400" placeholder="<?php echo isset($_SESSION['err_cmt']) ? $_SESSION['err_cmt'] : '' ?>">
                    <button name="cmt" class="p-2 px-4 rounded-lg bg-orange-400 border-2 border-solid hover:bg-white hover:text-orange-500 text-white border-yellow-400">Bình luận</button>
                </div>

            </form>
        </div>
    </div>
    <div class="truyen">
        <h3> <i class="fa-solid fa-flag"></i>Truyện cùng thể loại</h3>
        <div class="flex flex-wrap">
            <?php
            $truyen_tuong_tu = all_comic_by_categoryid($detail_comic['ca_id']);
            foreach ($truyen_tuong_tu as $key => $value) {
                extract($value);
            ?>
                <a href="index.php?act=detail&id=<?= $id ?>">
                    <div class="col">
                        <div class="img"><img src="content/uploads/cover_img/<?= $img_name ?>" alt="">
                        </div>
                        <div class="text">
                            <a href="#">
                                <h4><?= $name ?></h4>
                            </a>
                            <div class="ngay_update">
                                <h5><?= substr($date, 0, 11) ?></h5>
                            </div>
                        </div>
                    </div>
                </a>
            <?php  } ?>
        </div>


    </div>
</article>
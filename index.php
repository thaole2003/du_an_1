<?php
    include "views/header_home_footer/header.php";

    //Controller
    if (isset($_GET['act']) && $_GET['act'] != "") {
        $act = $_GET['act'];

        switch($act){
            //Xem chi tiết truyện
            case 'chi_tiet_truyen':
                include "views/chi_tiet_truyen.php";
                break;
            //Đọc truyện
            case 'doc_truyen':
                include "views/doc_truyen.php";
                break;
            //Mục yêu thích
            case 'truyen_yeu_thich':
                include "views/love.php";
                break;
            //Lịch sử
            case 'truyen_da_doc':
                include "views/history.php";
                break;
            default:
                include "views/header_home_footer/home.php";
                break;
        }
    }else{
        include "views/header_home_footer/home.php";
    }

    include "views/header_home_footer/footer.php";

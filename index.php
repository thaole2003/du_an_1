<?php
session_start();
include_once "./DAO/comic.php";
include_once "./DAO/pdo.php";
include_once "./DAO/loai.php";
$list_all_loai = load_all_loai();
include_once "views/header_home_footer/header.php";
//Controller
//Tìm kiếm
if (isset($_POST['search'])) {

    $length = strlen($_POST['textsearch']);

    if ($length != 0) {
        $textsearch = $_POST['textsearch'];
        $all_search = search_all($textsearch);
        include_once 'views/search.php';
        include_once './views/header_home_footer/footer.php';
        die;
    }
}



if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];

    switch ($act) {
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
         //danh mục
         case 'loai';
         if (isset($_GET['ma_loai']) && $_GET['ma_loai'] > 0) {
            $id_ma_loai = $_GET['ma_loai'];
         }
         if(isset($id_ma_loai)){
          $all_comic_by_categoryid=  all_comic_by_categoryid($id_ma_loai);
          include "./views/loai.php";
         }
         break;

        default:
            include "views/header_home_footer/home.php";
            break;
    }
} else {
    include "views/header_home_footer/home.php";
}
include "views/header_home_footer/footer.php";

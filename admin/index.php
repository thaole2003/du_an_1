<?php
    include "header.php";
    require_once "../DAO/pdo.php";
    require_once "../DAO/loai.php";
    
    //Controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            //Controller danh mục
            case 'list_loai':
                include "danh_muc/listcategories.php";
                break;
            //Controller truyện
            case 'list_truyen':
                include "truyen/comic.php";
                break;
            //Controller người dùng
            case 'list_kh':
                include "user/users.php";
                break;
            //Controller bình luận
            case 'list_bl':
                include "binh_luan/comment.php";
                break;
            //Controller thống kê
            case 'list_tk':
                include "thong_ke/thongke.php";
                break;   
            //add loai
            case 'add_loai':
                if(isset($_POST['btn-add'])){
                    $ten_loai=$_POST['name-loai'];
                   insert_loai_hang($ten_loai);
                }
                include "danh_muc/addloai.php";
                break;   
            // sua loai
            case 'edit_loai':
                include "danh_muc/editcategory.php";
                break;   
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }

    include "footer.php";
?>
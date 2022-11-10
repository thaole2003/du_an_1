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
                $is_valid = true;
                $list_loai=load_all_loai();
                if(isset($_POST['btn-add'])){
                    $ten_loai=trim($_POST['name-loai']);
                    foreach($list_loai as $key=>$value){
                        if($ten_loai ==""||$ten_loai==$value['name']){
                            $thong_bao="Tên loại không được để trùng hoặc trống";
                            $is_valid = false;
                            break;
                        }
                    }
                    if ($is_valid){
                        insert_loai($ten_loai);
                    }
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

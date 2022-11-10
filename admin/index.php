<?php
    include "header.php";
    require_once "../DAO/pdo.php";
    require_once "../DAO/loai.php";
    
    //Controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            //Controller danh mục
            //add loại
            case 'add_loai':
                if(isset($_POST['btn-add'])){
                    $ten_loai=$_POST['name-loai'];
                    insert_loai_hang($ten_loai);
                    $thong_bao = "Thêm mới thành công";
                }
                include "danh_muc/addloai.php";
                break; 
            //list loại
            case 'list_loai':
                $list_all_loai = load_all_loai();
                include "danh_muc/listcategories.php";
                break;  
            // sua loai
            case 'sua_loai':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                    $loai_one = load_one_loai($id);
                }
                include "danh_muc/editcategory.php";
                break;  
            //ngược lại không tồn tại act thì include "home.php"; 
            default:
                include "home.php";
                break;
        }
    }else{
        include "home.php";
    }

    include "footer.php";

<?php
include "header.php";
require_once "../DAO/pdo.php";
require_once "../DAO/loai.php";
require_once "../DAO/comic.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
//Controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            //Controller danh mục
            //add loại

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
            //Cập nhật
        case 'cap_nhat_loai':
            if (isset($_POST['cap_nhat'])) {
                $name = $_POST['name'];
                $id = $_POST['id'];
                update_loai($id,$name);
            }
            $list_all_loai = load_all_loai();
            include "danh_muc/listcategories.php";
            //xóa loại
            case 'xoa_loai';
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                delete_loai_hang($id);
                $list_all_loai = load_all_loai();
                include_once 'danh_muc/listcategories.php';
                $thong_bao='Xóa thành công';

            } 
            break;
            //load truyện
            case 'list_truyen';
            $load_all_truyen = comic_select_all();
            include_once "../admin/truyen/comic.php";
            break;
            //thêm truyện
            case 'add_comic';
       
            $list_all_loai = load_all_loai();

            if(isset($_POST['btnAdd'])){
                $all_name_comic =comic_select_all_name();
                $flag = true;
                $date = date('m/d/Y h:i:s a', time());
                  $namee =$_POST['name_comic'];
                  $length2 = strlen($namee);
                  $detail = $_POST['detail'];
                  $author = $_POST['author'];
                  $intro = $_POST['intro'];
                  $view = 0;
                  $like=0;
                  $category = $_POST['category'];
                  $img_id = $_POST['images'];
                  foreach($all_name_comic as $key => $value){
                   
                    if( $length2 == 0 ){
                        $thongbao = 'không được để trống';
                        $flag = false;
                    }
                    if($namee==$value['name']){
                        $thongbao = 'tên truyện đã tồn tại';
                        $flag = false;
                        break;
                    }
                  
                  }
                  if($flag==true){
                    comic_insert($namee,$detail,$author,$date,$intro,$view,$like,$category,$img_id);      
                  }
              }
            include_once './truyen/addcomic.php';
            break;
            //ngược lại không tồn tại act thì include "home.php"; 
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";

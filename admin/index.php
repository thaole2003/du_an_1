<?php
session_start();

include_once "header.php";
include_once  "../DAO/user.php";
require_once "../DAO/pdo.php";
require_once "../DAO/loai.php";
require_once "../DAO/comic.php";
if(check_admin_role() == false){
    header("location:views/login&msg=bạn không có quyền truy cập");
    die;
}
date_default_timezone_set('Asia/Ho_Chi_Minh');

//Controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            //Controller danh mục
            //add loại

        case 'add_loai':
            $is_valid = true;
            $list_loai = load_all_loai();
            if (isset($_POST['btn-add'])) {
                $ten_loai = trim($_POST['name-loai']);
                foreach ($list_loai as $key => $value) {
                    if ($ten_loai == "" || $ten_loai == $value['name']) {
                        $thong_bao = "Tên loại không được để trùng hoặc trống";
                        $is_valid = false;
                        break;
                    }
                }
                if ($is_valid) {
                    insert_loai($ten_loai);
                    $thong_bao = "Thêm mới thành công";
                }
            }
            include_once "danh_muc/addloai.php";
            break;
            //list loại
        case 'list_loai':
            $list_all_loai = load_all_loai();
            include_once "danh_muc/listcategories.php";
            break;
            // sua loai

        case 'sua_loai':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $loai_one = load_one_loai($id);
            }
            include_once "danh_muc/editcategory.php";
            break;
            //Cập nhật
        case 'cap_nhat_loai':
            if (isset($_POST['cap_nhat'])) {
                $name = $_POST['name'];
                $id = $_POST['id'];
                $ten_cu = load_one_loai($id)['name'];
                $ten_cac_loai_khac = load_all_loai_edit($ten_cu);
                $allowUpload = true;

                if ($name == "") {
                    $_SESSION['trong_loai'] = "Không được để trống tên loại!";
                    $allowUpload = false;
                } else {
                    unset($_SESSION['trong_loai']);
                }

                foreach ($ten_cac_loai_khac as $value) {
                    if ($name == $value['name']) {
                        $_SESSION['trung_loai'] = "Bạn đã bị trùng tên loại!";
                        $allowUpload = false;
                        break;
                    } else {
                        unset($_SESSION['trung_loai']);
                    }
                }

                if ($allowUpload == true) {
                    update_loai($id, $name);
                } else {
                    header('location:index.php?act=sua_loai&id=' . $id);
                }
            }
            $list_all_loai = load_all_loai();
            include_once "danh_muc/listcategories.php";
            //xóa loại
        case 'xoa_loai':
            if (isset($_GET['id'])) {

                $id = $_GET['id'];
                delete_fk_comic($id);
                delete_loai_hang($id);
                $list_all_loai = load_all_loai();
                include_once  'danh_muc/listcategories.php';
                $thong_bao = 'Xóa thành công';
            }
            break;
            //load truyện
        case 'list_truyen':
            $list_all_loai = load_all_loai();
            $load_all_truyen = comic_select_all();
            include_once  "../admin/truyen/comic.php";
            break;
        case 'list_truyen_search':
            if (isset($_POST['btn_search'])) {
                $key = $_POST['key_search'];
                $category_id = $_POST['category_id'];
            } else {
                $key = '';
                $category_id = 0;
                $load_all_truyen = comic_select_all();
            }
            $list_all_loai = load_all_loai();
            $load_all_truyen = comic_select_all_search($key,$category_id);
            include_once  "../admin/truyen/comic.php";
            break;
            //thêm truyện
            case 'add_comic':
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
            include_once  './truyen/addcomic.php';
            break;
            // DELETE Truyện
        case 'xoa_truyen':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_comic($id);
                $load_all_truyen = comic_select_all();
                include_once  "../admin/truyen/comic.php";
            }
            break;
            //Sửa truyện
        case 'sua_truyen':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $load_all_comic = comic_select_one($id);
            }
            $list_all_images = load_all_image();
            $list_all_loai = load_all_loai();
            include_once  'truyen/editcomic.php';
            break;
        case 'update_truyen':
            if (isset($_POST['btn-update'])) {
                $date = date('m/d/Y h:i:s a', time());
                $id = $_POST['id'];
                $name = $_POST['name'];
                $detail = $_POST['detail'];
                $author = $_POST['author'];
                $intro = $_POST['intro'];
                $category_id = $_POST['category_id'];
                $images_id = $_POST['images'];
                $name_cu = comic_select_one($id)['name'];
                $ten_cu = load_all_comic_edit($name_cu);
                $allowUpload = true;

                if ($name == "") {
                    $_SESSION['trong_truyen'] = "Không được để trống tên truyện!";
                    $allowUpload = false;
                } else {
                    unset($_SESSION['trong_truyen']);
                }

                foreach ($ten_cu as $value) {
                    if ($name == $value['name']) {
                        $_SESSION['trung_ten'] = "Bạn đã bị trùng tên truyện!";
                        $allowUpload = false;
                        break;
                    } else {
                        unset($_SESSION['trung_ten']);
                    }
                }

                if ($allowUpload == true) {
                    update_comic($id, $name, $detail, $author, $date, $intro, $category_id, $images_id);
                } else {
                    header('location:index.php?act=sua_truyen&id=' . $id);
                }
            }
            $load_all_truyen = comic_select_all();
            $list_all_loai = load_all_loai();
            include_once  'truyen/comic.php';
            break;
            //ngược lại không tồn tại act thì include_once "home.php"; 
        default:
            include_once "home.php";
            break;
    }
} else {
    include_once "home.php";
}

include_once "footer.php";

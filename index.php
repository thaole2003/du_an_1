<?php
session_start();

include_once "./DAO/comic.php";
include_once "./DAO/pdo.php";
include_once "./DAO/loai.php";
$list_all_loai = load_all_loai();
include_once "./DAO/user.php";
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
            //login
        case 'login':
            if (isset($_POST['loginn'])) {
                $email_login = trim($_POST['email_login']);
                $length_email = strlen($email_login);
                $pass_login = trim($_POST['password_login']);
                $length_pass = strlen($pass_login);
                $flag_login = true;
                if ($length_email == 0) {
                    $flag_login = false;
                    $err_email_login = 'bạn chưa nhập email';
                }
                if ($length_pass == 0) {
                    $flag_login = false;
                    $err_pass_login = 'bạn chưa nhập password';
                }
            
                if ($flag_login == true) {
                    //lay xem co email nào khớp với email đã nhập k.
                    $user_check = get_one_user_by_email($email_login);            
                    if ($user_check != "") {
                        if ($pass_login == $user_check['password']) {
                            $_SESSION['auth'] = [
                                'email' => $user_check['email'],
                                'name' => $user_check['name'],
                                'role' => $user_check['role'],
                                'role_name' => $user_check['role_name']
                            ];   
                            unset($_SESSION['khong_ton_tai_tk']);
                            unset($_SESSION['sai_mk']);
                            setcookie("susecdangnhap","Đăng nhập thành công",time()+2);
                        }else{
                            $_SESSION['sai_mk']='sai mật khẩu';
                            unset($_SESSION['khong_ton_tai_tk']);
                           
                        }
                    }else{
                        unset($_SESSION['sai_mk']);
                        $_SESSION['khong_ton_tai_tk']='tài khoản không tồn tại';
                    }
                  
                 
                }
           
            }
            include_once './views/login.php';
            break;
            //danh mục
        case 'loai':
            if (isset($_GET['ma_loai']) && $_GET['ma_loai'] > 0) {
                $id_ma_loai = $_GET['ma_loai'];
            }
            if (isset($id_ma_loai)) {
                $all_comic_by_categoryid =  all_comic_by_categoryid($id_ma_loai);
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

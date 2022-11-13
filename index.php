<?php
include_once "./DAO/user.php";
session_start();
include_once "./DAO/pdo.php";
include_once "./DAO/loai.php";
include_once "./DAO/comic.php";
$list_all_loai = load_all_loai();
include_once  "./DAO/user.php";
include_once  "views/header_home_footer/header.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');
$comic_by_view = comic_by_view();
$comic_by_date = comic_by_date();

//Controller
//Tìm kiếm
if (isset($_SESSION['okokok'])) {
    unset($_SESSION['okokok']);
}
if(isset($_SESSION['dang_xuat'])){
    unset($_SESSION['dang_xuat']);
}
if (isset($_POST['search'])) {

    $length = strlen($_POST['textsearch']);

    if ($length != 0) {
        $textsearch = $_POST['textsearch'];
        $all_search = search_all($textsearch);
        include_once  'views/search.php';
        include_once  './views/header_home_footer/footer.php';
        die;
    }
}

// Đăng ký user
$list_email = select_email_user();
// echo "<pre>";
// var_dump($list_email);
// echo "<pre>";
if (isset($_POST['dang_ky'])) {
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $password = trim($_POST['pass']);
    $re_password = trim($_POST['password']);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $role = 2;
    $flag_register = true;
    // validate email 
    if ($email == "") {
        $flag_register = false;
        $err_email = "Email không được để trống";
    } elseif (!emailValid($email)) {
        $flag_register = false;
        $err_email = "Email chưa đúng định dạng mail";
    } else {
        foreach ($list_email as $key => $value) {
            if ($email == $value['email']) {
                $flag_register = false;
                $err_email = "Email đã tồn tại";
            }
        }
    }
    // validate name
    if ($name == "") {
        $flag_register = false;
        $err_name = "Name không được để trống";
    }
    //validate phone
    if ($phone == "") {
        $flag_register = false;
        $err_phone = "Số điện thoại không được để trống";
    } elseif (!isVietnamesePhoneNumber($phone)) {
        $flag_register = false;
        $err_phone = "Số điện thoại chưa đúng định dạng";
    }
    // validate địa chỉ
    if ($address == "") {
        $flag_register = false;
        $err_address = "Địa chỉ không được để trống";
    }
    // validate password
    if ($password == "") {
        $flag_register = false;
        $err_pass = "Mật khẩu không được để trống";
    } elseif (!isPassword($password)) {
        $flag_register = false;
        $err_pass = "Mật khẩu phải tối thiểu 8 ký tự và ít nhất 1 chữ cái, 1 số";
    }
    if ($re_password == "") {
        $flag_register = false;
        $err_repassword = "Mật khẩu nhập lại không được để trống";
    } elseif ($password != $re_password) {
        $flag_register = false;
        $err_repassword = "Mật khẩu và mật khẩu nhập lại phải trùng nhau";
    }
    if ($flag_register) {
        insert_khach_hang($email, $hash_password, $name, $phone, $address, $role);
        $thongbao = "Thêm người dùng thành công";
    } else {
        $thongbao = "Thêm người dùng thất bại";
    }
}


if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];

    switch ($act) {
            //Xem chi tiết truyện
        case 'chi_tiet_truyen':
            include_once "views/chi_tiet_truyen.php";
            break;
            //Đọc truyện
        case 'doc_truyen':
            include_once "views/doc_truyen.php";
            break;
            //Mục yêu thích
        case 'truyen_yeu_thich':
            include_once "views/love.php";
            break;
            //Lịch sử
        case 'truyen_da_doc':
            include_once "views/history.php";
            break;
            //login
        case 'login':
            unset($_SESSION['khong_ton_tai_tk']);
            unset($_SESSION['sai_mk']);
            if (isset($_POST['loginn'])) {
                $email_login = trim($_POST['email_login']);
                $length_email = strlen($email_login);
                $pass_login = trim($_POST['password_login']);
                $length_pass = strlen($pass_login);
                $flag_login = true;
                if ($length_email == 0) {
                    $flag_login = false;
                    unset($_SESSION['khong_ton_tai_tk']);
                    $err1_email_login = 'bạn chưa nhập email';
                } elseif (!emailValidate($email_login)) {
                    unset($_SESSION['khong_ton_tai_tk']);
                    $flag_login = false;
                    $err1_email_login = 'email không đúng định dạng';
                }
                if ($length_pass == 0) {
                    $flag_login = false;
                    $err_pass_login = 'bạn chưa nhập password';
                }

                if ($flag_login == true) {
                    //lay xem co email nào khớp với email đã nhập k.
                    $user_check = get_one_user_by_email($email_login);
                    if ($user_check != "") {
                        // if(password_verify($pass_login, $user_check['password']))
                        if (password_verify($pass_login, $user_check['password'])) {
                            $_SESSION['auth'] = [
                                'email' => $user_check['email'],
                                'name' => $user_check['name'],
                                'role' => $user_check['role'],
                                'role_name' => $user_check['role_name']
                            ];
                            unset($_SESSION['khong_ton_tai_tk']);
                            unset($_SESSION['sai_mk']);
                            $_SESSION['okokok'] = 'đăng nhập thành công';
                            header('location:index.php');
                        } else {
                            unset($_SESSION['khong_ton_tai_tk']);
                            $_SESSION['sai_mk'] = 'sai mật khẩu';
                        }
                    } else {
                        unset($_SESSION['sai_mk']);
                        $_SESSION['khong_ton_tai_tk'] = 'tài khoản không tồn tại';
                    }
                }
            }
            include_once  './views/login.php';
            break;
            //log-out
        case 'dang_xuat':
            session_unset();
            $_SESSION['dang_xuat'] = "Bạn đã đăng xuất";
            session_destroy();
            header('location:index.php');
            break;
            //danh mục
        case 'loai':
            if (isset($_GET['ma_loai']) && $_GET['ma_loai'] > 0) {
                $id_ma_loai = $_GET['ma_loai'];
            }
            if (isset($id_ma_loai)) {
                $all_comic_by_categoryid =  all_comic_by_categoryid($id_ma_loai);
                include_once "./views/loai.php";
            }
            break;
            // dang ky
        case 'register':
            include "views/register.php";
            break;
            //danh mục
        case 'loai';
            if (isset($_GET['ma_loai']) && $_GET['ma_loai'] > 0) {
                $id_ma_loai = $_GET['ma_loai'];
            }
            if (isset($id_ma_loai)) {
                $all_comic_by_categoryid =  all_comic_by_categoryid($id_ma_loai);
                include "./views/loai.php";
            }
            break;
        default:
            include_once "views/header_home_footer/home.php";
            break;
    }
} else {
  
    include_once "views/header_home_footer/home.php";
}
include_once "views/header_home_footer/footer.php";

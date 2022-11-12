<?php
include_once "./DAO/user.php";
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
// Đăng ký user
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
    }elseif(!emailValid($email)){
        $flag_register=false;
        $err_email="Email chưa đúng định dạng mail";
    }
    // validate name
    if ($name == "") {
        $flag_register = false;
        $err_name = "Name không được để trống";
    }
    //validate phone
    if ($phone == ""){
        $flag_register = false;
        $err_phone = "Số điện thoại không được để trống";
    }elseif(!isVietnamesePhoneNumber($phone)){
        $flag_register=false;
        $err_phone="Số điện thoại chưa đúng định dạng";
    }
    // validate địa chỉ
    if($address == "") {
        $flag_register = false;
        $err_address = "Địa chỉ không được để trống";
    }
    // validate password
    if($password == "") {
        $flag_register = false;
        $err_pass = "Mật khẩu không được để trống";
    }elseif(!isPassword($password)){
        $flag_register=false;
        $err_pass="Mật khẩu phải tối thiểu 8 ký tự và ít nhất 1 chữ cái, 1 số";
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
            // dang ky
        case 'register';
            include "views/register.php";
            break;


        default:
            include "views/header_home_footer/home.php";
            break;
    }
} else {
    include "views/header_home_footer/home.php";
}

include "views/header_home_footer/footer.php";

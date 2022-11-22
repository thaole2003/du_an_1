<?php
session_start();
include_once "./content/PHPMailer-master/src/Exception.php";
include_once "./content/PHPMailer-master/src/OAuth.php";
include_once "./content/PHPMailer-master/src/PHPMailer.php";
include_once "./content/PHPMailer-master/src/SMTP.php";
include_once "./content/PHPMailer-master/src/POP3.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once "./DAO/comment.php";
include_once "./DAO/user.php";
include_once "./DAO/pdo.php";
include_once "./DAO/loai.php";
include_once "./DAO/comic.php";
$list_all_loai = load_all_loai();
include_once  "./DAO/user.php";
include_once  "views/header_home_footer/header.php";
include "global.php";
date_default_timezone_set('Asia/Ho_Chi_Minh');

$like_comic = load_all_truyen_like();
$comic_by_view = comic_by_view();
$comic_by_date = comic_by_date();
//Controller
//Tìm kiếm
if (isset($_SESSION['okokok'])) {
    unset($_SESSION['okokok']);
}
if (isset($_SESSION['dang_xuat'])) {
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
    $count_email = count_email_input($email);
    $flag_register = true;
    // validate email 
    if ($email == "") {
        $flag_register = false;
        $err_email = "Email không được để trống";
    } elseif (!emailValid($email)) {
        $flag_register = false;
        $err_email = "Email chưa đúng định dạng mail";
    } elseif ($count_email != 0) {
        $flag_register = false;
        $err_email = "Email đã tồn tại";
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
        $thongbao = "Đăng ký tài khoản thành công";
    } else {
        $thongbao = "Đăng ký tài khoản thất bại";
    }
}


if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];

    switch ($act) {

            //Đọc truyện
        case 'doc_truyen':

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
            }
            update_view($id);
           
            $doc_truyen = img_comic($id);
            if(isset($_SESSION['auth'])){
                $update= true;
                $history_comic_byuser =select_history_comic_by_user($_SESSION['auth']['id']);
                foreach($history_comic_byuser as $key => $value){
                if($value['id_comic'] == $id){
                    $update= false;

                }
             
}
if($update==true){
    update_history_comic($id,$_SESSION['auth']['id']);
}


                
            }
            include_once "views/doc_truyen.php";
            break;
            //Mục yêu thích
        case 'truyen_yeu_thich':
            $all_love = all_comic_by_love();
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
                                'id' => $user_check['id'],
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
            //thay đổi mật khẩu
        case 'changepass':
            // if(isset($_SESSION['err_pb'])){
            //     unset($_SESSION['err_pb']);
            // }
            // if(isset($_SESSION['passw_new'])){
            //     unset($_SESSION['passw_new']);

            // }
            // if(isset($_SESSION['repass'])){
            //     unset($_SESSION['repass']);
            // }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            unset($_SESSION['passw_new']);
            unset($_SESSION['err_pb']);
            unset($_SESSION['repass']);
            $flag_change = true;
            $select_pass = select_pass($id);
            if (isset($_POST['dmk'])) {
                if (strlen($_POST['pass_befor']) == 0) {
                    $flag_change = false;
                    $_SESSION['err_pb'] = 'yêu cầu nhập mật khẩu';
                } else {
                    if (password_verify($_POST['pass_befor'], $select_pass['password'])) {
                        $flag_change = true;
                    } else {
                        $_SESSION['err_pb'] = 'mật khẩu cũ không đúng';
                        unset($_SESSION['err_pw']);
                        unset($_SESSION['err_rp']);
                    }
                }

                if (strlen($_POST['passw_new']) == 0) {
                    $flag_change = false;
                    $_SESSION['err_pw'] = 'yêu cầu nhập mật khẩu mới';
                }
                if (strlen($_POST['repass']) == 0) {
                    $flag_change = false;
                    $_SESSION['err_rp'] = 'yêu cầu nhập lại mật khẩu';
                }
                if (strlen($_POST['passw_new']) != 0) {
                    if (!isPassword($_POST['passw_new'])) {
                        $flag_change = false;
                        $_SESSION['err_pw'] = 'mật khẩu phải đúng định dạng';
                    }
                }


                if (strlen($_POST['repass']) != 0) {
                    if ($_POST['repass'] != $_POST['passw_new']) {
                        $flag_change = false;
                        $_SESSION['err_rp'] = 'mật khẩu mới phải trùng nhau';
                    }
                }
                if ($flag_change == true) {
                    $pass_up = password_hash($_POST['passw_new'], PASSWORD_DEFAULT);
                    update_password($id, $pass_up);
                    unset($_SESSION['passw_new']);
                    unset($_SESSION['err_pb']);
                    unset($_SESSION['repass']);
                    $_SESSION['susess_change'] = 'ban da doi mat khau!';
                    header('location:index.php');
                }
            }

            include_once './views/changepass.php';
            break;
            //log-out
        case 'dang_xuat':
            $_SESSION['dang_xuat'] = "Bạn đã đăng xuất";
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
            //forgot password
        case 'forgotpw':
            if (isset($_SESSION['err_pw_em'])) {
                unset($_SESSION['err_pw_em']);
            }
            $flag_pw = true;
            if (isset($_POST['fg_pw'])) {


                if (strlen($_POST['email_fg']) == 0) {
                    $flag_pw = false;
                    $_SESSION['err_pw_em'] = 'không được để trống';
                } else {
                    if (!emailValidate($_POST['email_fg'])) {
                        $flag_pw = false;
                        $_SESSION['err_pw_em'] = 'email chưa đúng định dạng';
                    }
                    if ($flag_pw == true) {
                        $check_user = get_one_user_by_email($_POST['email_fg']);
                        if ($check_user != '') {
                            $id = $check_user['id'];
                            $email = $check_user['email'];
                            $name_user = $check_user['name'];
                            $pass_new = generateRandomString();
                            setcookie("pass_new", $pass_new, time() + 300);
                            $hash_pw = password_hash($pass_new, PASSWORD_DEFAULT);
                            update_password($id, $hash_pw);
                            $mail = new PHPMailer(true);
                            try {
                                //Server settings
                                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                                $mail->isSMTP();                                      // Set mailer to use SMTP
                                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                                $mail->Username = 'lmt.3102003@gmail.com';                 // SMTP username
                                $mail->Password = 'kqiiyqidfgvllter ';                           // SMTP password
                                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                                $mail->Port = 587;                                    // TCP port to connect to

                                //Recipients
                                $mail->setFrom('lmt.3102003@gmail.com ', 'Mailer');
                                $mail->addAddress($email, $name_user);     // Add a recipient
                                // $mail->addAddress('vietnqph27022@fpt.edu.vn','việt sếch');               // Name is optional
                                // $mail->addReplyTo('info@example.com', 'Information');
                                $mail->addCC('lmt.3102003@gmail.com');
                                // $mail->addBCC('bcc@example.com');

                                //Attachments
                                // $mail->addent('/vAttachmar/tmp/file.tar.gz');         // Add attachments
                                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                                //Content
                                $mail->isHTML(true);                                  // Set email format to HTML
                                $mail->Subject = 'Mật khẩu mới của bạn';
                                $mail->Body    = 'Đây là mật khẩu mới của bạn,có hiệu lực 5 phút kể từ khi bạn click tìm mật khẩu ' . $pass_new;
                                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 

                                $mail->send();
                                $_SESSION['succes_pw'] = 'Mật khẩu mới đã được gửi trong email của bạn.';
                                header('location:index.php');
                            } catch (Exception $e) {
                                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                            }
                        }
                    }
                }
            }
            include_once "./views/forgotpassword.php";
            break;
            //detail
        case 'detail':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            if (isset($_POST['like'])) {
                update_like($id);
            }
            if (isset($_SESSION['err_not_dn'])) {
                unset($_SESSION['err_not_dn']);
            }
            $detail_comic = detail_comic($id);
            $load_cmt = load_all_comic_byid($id);
            if (isset($_POST['cmt'])) {
                if (isset($_SESSION['auth'])) {
                    unset($_SESSION['err_not_dn']);
                    $flag_cmt = true;
                    $date = date('m/d/Y h:i:s a', time());
                    $id_u = $_SESSION['auth']['id'];

                    if (strlen($_POST['text_cmt']) == 0) {
                        $flag_cmt = false;
                        $_SESSION['err_cmt'] = 'Bạn chưa viết comment';
                    }
                    if ($flag_cmt == true) {
                        insert_binh_luan($date, $_POST['text_cmt'], $id, $id_u);
                        unset($_SESSION['err_cmt']);
                        header("location: " . $_SERVER['HTTP_REFERER']);
                    }
                } else {
                    $_SESSION['err_not_dn'] = 'Bạn hãy đăng nhập để comment';
                    header("location: " . $_SERVER['HTTP_REFERER']);
                }

                // $detail_comic = detail_comic($id);
                // $load_cmt = load_all_comic_byid($id);
                // if (isset($_POST['cmt'])) {
                //     $flag_cmt = true;
                //     $date = date('m/d/Y h:i:s a', time());
                //     if (isset($_SESSION['auth'])) {
                //         $id_u = $_SESSION['auth']['id'];
                //     }
                //     if (strlen($_POST['text_cmt']) == 0) {
                //         $flag_cmt = false;
                //         $_SESSION['err_cmt'] = 'ban chua viet comment';
                //     }
                //     if ($flag_cmt == true) {
                //         insert_binh_luan($date, $_POST['text_cmt'], $id, $id_u);
                //         unset($_SESSION['err_cmt']);
                //         header("location: " . $_SERVER['HTTP_REFERER']);
                //     };
                // }
                // include_once './views/chi_tiet_truyen.php';
                // break;
            }
            include_once './views/chi_tiet_truyen.php';
            break;
            // dang ky
        case 'register':
            include "views/register.php";
            break;
        default:
            include_once "views/header_home_footer/home.php";
            break;
    }
} else {

    include_once "views/header_home_footer/home.php";
}
include_once "views/header_home_footer/footer.php";

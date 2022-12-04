<?php
session_start();

include_once "header.php";
include_once  "../DAO/user.php";
require_once "../DAO/pdo.php";
require_once "../DAO/loai.php";
require_once "../DAO/comic.php";
require_once "../DAO/bill.php";
require_once "../DAO/comment.php";
include "../global.php";
include_once "../content/PHPMailer-master/src/Exception.php";
include_once "../content/PHPMailer-master/src/OAuth.php";
include_once "../content/PHPMailer-master/src/PHPMailer.php";
include_once "../content/PHPMailer-master/src/SMTP.php";
include_once "../content/PHPMailer-master/src/POP3.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (check_admin_manager_role() == false) {
    header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
    die;
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$name_id_comic = select_name_comic();

//Controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            //Controller danh mục
            //add loại
        case 'add_loai':

            if (isset($_POST['btn-add'])) {
                $ten_loai = trim($_POST['name-loai']);
                $is_valid = true;
                $count_category = count_category($ten_loai);


                if ($ten_loai == "") {
                    $thong_bao = "Tên loại không được để trống";
                    $is_valid = false;
                } elseif ($count_category != 0) {
                    $thong_bao = "Tên loại đã tồn tại";
                    $is_valid = false;
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
            //search loại
        case 'search_category':
            if (isset($_POST['btn_search'])) {
                $key = $_POST['key_search'];
            } else {
                $key = '';
                $list_all_loai = load_all_loai();
            }
            $list_all_loai = load_all_loai_search($key);
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
                $id_category = $_GET['id'];
                $all = load_all_loai_fk($id_category);
                $all_comment = load_all_comment($id_category);
                $all_love = load_all_love($id_category);
                $all_his = load_all_history($id_category);

                if ($all_his) {
                    foreach ($all_his as $value) {
                        extract($value);
                        delete_img_history($id_history);
                    }
                }

                if ($all_love) {
                    foreach ($all_love as $value) {
                        extract($value);
                        delete_img_love($id_love);
                    }
                }

                if ($all_comment) {
                    foreach ($all_comment as $value) {
                        extract($value);
                        delete_img_comment($id_cmt);
                    }
                }

                if ($all) {
                    foreach ($all as $value) {
                        extract($value);
                        delete_comic_img($id_chapter);
                    }
                    foreach ($all as $value) {
                        extract($value);
                        delete_comic_chapter($id_comic);
                    }
                    delete_fk_comic($id_category);
                }
                delete_loai($id_category);
                header("location: index.php?act=list_loai");
                // $list_all_loai = load_all_loai();
            }
            break;
            //add user
        case 'add_user':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            $list_role = select_role();
            if (isset($_POST['add'])) {
                $email = trim($_POST['email']);
                $name = trim($_POST['name']);
                $phone = trim($_POST['phone']);
                $address = trim($_POST['address']);
                $password = trim($_POST['pass']);
                $re_password = trim($_POST['password']);
                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                $role = trim($_POST['role_id']);
                $flag_register = true;
                // validate email
                $count_email = count_email_input($email);
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
                    $thongbao = "Thêm người dùng thành công";
                    $all_user = all_user();
                } else {
                    $thongbao = "Thêm người dùng thất bại";
                }
            }
            include_once './user/adduser.php';
            break;
            //LIST USER
        case 'list_kh':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            $all_user = all_user();
            $role = load_all_roll();
            // echo '<pre>';
            // print_r($all_user);
            // die;
            include_once './user/users.php';
            break;
            //search user
        case 'search_user':
            if (isset($_POST['btn_search'])) {
                $key = $_POST['key_search'];
                $role = $_POST['role'];
            } else {
                $key = '';
                $role = 0;
                $all_user = all_user();
            }
            $all_user = all_user_searh($key, $role);
            include_once './user/users.php';
            break;
            //DELETE_USER
        case 'delete_user':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_user($id);
                $all_user = all_user();
                include_once './user/users.php';
            }
            break;
            //edit USER
        case 'edit_user':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $list_role = select_role();
                $user_id = select_User_Id($id);

                if (isset($_POST['update'])) {
                    $name = trim($_POST['name']);
                    $phone = trim($_POST['phone']);
                    $address = trim($_POST['address']);
                    $role = trim($_POST['role_id']);
                    $flag_register = true;
                    $list_email = select_email_user();
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
                    if ($flag_register) {
                        update_user($id, $name, $phone, $address, $role);

                        header('location:index.php?act=list_kh');
                    } else {
                        $thongbao = "UPDATE người dùng thất bại ";
                    }
                }

                include_once 'user/editusers.php';
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
            $load_all_truyen = comic_select_all_search($key, $category_id);
            include_once  "../admin/truyen/comic.php";
            break;
            //phê duyệt truyện
        case 'agree':
            $comic_select_all_bystatus = comic_select_all_bystatus();
            include_once '../admin/agree/list_agree.php';
            break;
        case 'search_agree':
            if (isset($_POST['btn_search'])) {
                $key = $_POST['key_search'];
            } else {
                $key = '';
                $comic_select_all_bystatus = comic_select_all_bystatus();
            }
            $comic_select_all_bystatus = comic_select_all_bystatus_search($key);
            include_once '../admin/agree/list_agree.php';
            break;
            //đồng ý phê duyệt
        case 'yes':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                update_status_yes($id);
                header('location:index.php?act=agree');
                $_SESSION['yess'] = 'truyện đã được phê duyệt';
            }
            break;
            //không đồng ý phê duyệt
        case 'no':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $email_agree = select_email_agree($id);

            if (isset($_POST['disagree'])) {
                $flag_no = true;
                if (isset($_POST['lido'])) {
                    if (strlen($_POST['lido']) == 0) {
                        $flag_no = false;
                    }

                    if ($flag_no == true) {
                        update_status_no($id);

                        $mail = new PHPMailer(true);
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'nqv31032003@gmail.com';                 // SMTP username
                            $mail->Password = 'xaylurdindyluteq';                         // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to

                            //Recipients
                            $mail->setFrom('nqv31032003@gmail.com', 'Mailer');
                            $mail->addAddress($email_agree['email'], $email_agree['name']);     // Add a recipient
                            // $mail->addAddress('vietnqph27022@fpt.edu.vn','việt sếch');               // Name is optional
                            // $mail->addReplyTo('info@example.com', 'Information');
                            $mail->addCC('nqv31032003@gmail.com');
                            // $mail->addBCC('bcc@example.com');

                            //Attachments
                            // $mail->addent('/vAttachmar/tmp/file.tar.gz');         // Add attachments
                            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                            //Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = 'Truyện của bạn không được phê duyệt';
                            $mail->Body    = 'Truyện của bạn không được phê duyệt với lí do ' . $_POST['lido'];
                            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 

                            $mail->send();
                            $_SESSION['succes_disagree'] = 'Đã gửi lí do đến người đăng.';
                            header('location:index.php?act=agree');
                        } catch (Exception $e) {
                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                        }
                    }
                }
            }
            include_once '../admin/agree/disagree.php';
            break;
        case 'wait':
            $comic_select_all_bystatus_3 = comic_select_all_bystatus_3();
            include_once "../admin/agree/waitagree.php";
            break;
        case 'again':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                update_status_again($id);
                header('location:index.php?act=wait');
                $_SESSION['again'] = 'truyện đã được gửi phê duyệt lại';
            }
            break;
            //thêm truyện
        case 'add_comic':
            $list_all_loai = load_all_loai();
            if (isset($_POST['btnAdd'])) {
                $all_name_comic = comic_select_all_name();
                $flag = true;
                $date = date('m/d/Y h:i:s a', time());
                $namee = $_POST['name_comic'];
                $length2 = strlen($namee);
                $detail = $_POST['detail'];
                $author = $_POST['author'];
                $intro = $_POST['intro'];
                $view = 0;
                $like = 0;
                $category = $_POST['category'];
                $number_chapter = $_POST['number_chapter'];
                $noi_dung = $_POST['noi_dung'];
                $allowUpload = true;

                if ($_POST['vip'] == 0) {
                    $price_comic = 0;
                    $vip = 0;
                } else {
                    $price_comic = $_POST['price_comic'];
                    if($price_comic < 0){
                        $tien_nho_hon_0 = 'Giá tiền phải là dương!';
                        $allowUpload = false;
                    }
                    $vip = 1;
                }

                if ($noi_dung == "") {
                    $noi_dung_trong = 'Không được để trống nội dung tập';
                    $allowUpload = false;
                }
                if (isset($_SESSION['auth']['id'])) {
                    if ($_SESSION['auth']['role'] == 1) {
                        $st = 2;
                    } elseif ($_SESSION['auth']['role'] == 3) {
                        $st = 1;
                    }
                }
                $po =  $_SESSION['auth']['id'];
                if ($length2 == 0) {
                    $rong_ten = 'Không được để trống tên truyện';
                    $allowUpload = false;
                }

                foreach ($all_name_comic as $key => $value) {
                    if ($namee == $value['name']) {
                        $trung_ten = 'Tên truyện đã tồn tại';
                        $allowUpload = false;
                    }
                }

                if ($_FILES["cover_image"]['name'] == "") {
                    $khong_tt = 'Không tồn tại file để upload';
                    $allowUpload = false;
                } else {
                    //Đường dẫn đích
                    $target_dir = "../content/" . $url_img . "cover_img/";

                    //Đường dẫn vào file đích
                    $target_file = $target_dir . $_FILES["cover_image"]["name"];

                    //lấy phần mở rộng của file (là đuôi file, định dạng) vd: png, jpg,...
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    //định dạng được chấp nhận
                    $allowtype = ["jpg", "jpeg", "JPG", "JPEG"];

                    //kiểm tra xem phải ảnh ko nếu là ảnh thì trả về true ngược lại
                    //ko là ảnh trả về false
                    $check = getimagesize($_FILES["cover_image"]["tmp_name"]);
                    if ($check == false) {
                        $khong_phai_anh = "Đây không phải là file ảnh";
                        $allowUpload = false;
                    }

                    //kiểm tra kiêu file không làm trong định dạng cho phép
                    if (!in_array($imageFileType, $allowtype)) {
                        $loi_dinh_dang = "Không được upload những ảnh có định dạng ipg, jpeg";
                        $allowUpload = false;
                    }

                    if ($allowUpload == true) {
                        //xử lý di chuyển file tạm vào thư mục cần lưu trữ
                        $name_img = $_FILES["cover_image"]["name"];
                        // Upload file
                        move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_dir . $name_img);
                    }
                }

                if ($_FILES["file"]["name"][0] == "") {
                    $khong_tt_f = 'Không tồn tại file để upload';
                    $allowUpload = false;
                } else {
                    //đếm phần tử trong file
                    $countfiles = count($_FILES['file']['name']);

                    //Đường dẫn đích
                    $target_dir = "../content/" . $url_img . "img_cua_comic/";

                    //Đường dẫn vào file đích
                    for ($i = 0; $i < $countfiles; $i++) {
                        $target_file = $target_dir . $_FILES["file"]["name"][$i];
                    }

                    //lấy phần mở rộng của file (là đuôi file, định dạng) vd: png, jpg,...
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    //định dạng được chấp nhận
                    $allowtype = ["jpg", "jpeg"];

                    //kiểm tra xem phải ảnh ko nếu là ảnh thì trả về true ngược lại
                    //ko là ảnh trả về false
                    for ($i = 0; $i < $countfiles; $i++) {
                        $check = getimagesize($_FILES["file"]["tmp_name"][$i]);
                        if ($check == false) {
                            $khong_phai_anh_f = "Đây không phải là file ảnh";
                            $allowUpload = false;
                            break;
                        }
                    }

                    //kiểm tra kiêu file không làm trong định dạng cho phép
                    if (!in_array($imageFileType, $allowtype)) {
                        $loi_dinh_dang_f = "Không được upload những ảnh có định dạng ipg, jpeg";
                        $allowUpload = false;
                    }
                }

                if ($allowUpload == true) {
                    $id_comic = comic_insert($namee, $detail, $author, $date, $intro, $view, $like, $category, $name_img, $st, $po, $vip, $price_comic);

                    $id_chapter = isert_chapter($number_chapter, $noi_dung, $id_comic, $date);
                    //xử lý di chuyển file tạm vào thư mục cần lưu trữ
                    for ($i = 0; $i < $countfiles; $i++) {
                        $filename = $_FILES["file"]["name"][$i];
                        // Upload file
                        move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_dir . $filename);
                        up_load_img($filename, $id_chapter);
                    }
                    $upload_ok = "Upload thành công";
                }
            }
            include_once  'truyen/addcomic.php';
            break;
        case 'add_chapter':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $id_chapter = $_GET['add'];
                $date = date('m/d/Y h:i:s a', time());
                $count_chapter = count_chapter($id);

                if (isset($_POST['btnAdd'])) {
                    $number_chapter = $_POST['number_chapter'];
                    $noi_dung = $_POST['noi_dung'];
                    $allowUpload = true;
                    if ($noi_dung == "") {
                        $noi_dung_trong = 'Không được để trống nội dung tập';
                        $allowUpload = false;
                    }

                    if ($_FILES["file"]["name"][0] == "") {
                        $khong_tt_f = 'Không tồn tại file để upload';
                        $allowUpload = false;
                    } else {
                        //đếm phần tử trong file
                        $countfiles = count($_FILES['file']['name']);

                        //Đường dẫn đích
                        $target_dir = "../content/" . $url_img . "img_cua_comic/";

                        //Đường dẫn vào file đích
                        for ($i = 0; $i < $countfiles; $i++) {
                            $target_file = $target_dir . $_FILES["file"]["name"][$i];
                        }

                        //lấy phần mở rộng của file (là đuôi file, định dạng) vd: png, jpg,...
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                        //định dạng được chấp nhận
                        $allowtype = ["jpg", "jpeg"];

                        //kiểm tra xem phải ảnh ko nếu là ảnh thì trả về true ngược lại
                        //ko là ảnh trả về false
                        for ($i = 0; $i < $countfiles; $i++) {
                            $check = getimagesize($_FILES["file"]["tmp_name"][$i]);
                            if ($check == false) {
                                $khong_phai_anh_f = "Đây không phải là file ảnh";
                                $allowUpload = false;
                                break;
                            }
                        }

                        //kiểm tra kiêu file không làm trong định dạng cho phép
                        if (!in_array($imageFileType, $allowtype)) {
                            $loi_dinh_dang_f = "Không được upload những ảnh có định dạng ipg, jpeg";
                            $allowUpload = false;
                        }
                    }

                    if ($allowUpload == true) {
                        $id_chapter = isert_chapter($number_chapter, $noi_dung, $id, $date);
                        //xử lý di chuyển file tạm vào thư mục cần lưu trữ
                        for ($i = 0; $i < $countfiles; $i++) {
                            $filename = $_FILES["file"]["name"][$i];
                            // Upload file
                            move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_dir . $filename);
                            up_load_img($filename, $id_chapter);
                        }
                        header('location:index.php?act=sua_truyen&id=' . $id);
                    }
                }
            }
            $list_all_images = load_all_image();
            $list_all_loai = load_all_loai();
            include_once  'truyen/add_chapter.php';
            break;
            // DELETE Truyện
        case 'xoa_truyen':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $id_chapter = id_images_comic($id);

                delete_img_history($id);
                delete_img_love($id);
                delete_img_comment($id);
                foreach($id_chapter as $value){
                    extract($value);
                    delete_comic_img($id_chapter);
                }
                delete_comic_chapter($id);
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
                $count_chapter = count_chapter($id);
                $all_chapter = load_all_chapter($id);
            }
            $list_all_images = load_all_image();
            $list_all_loai = load_all_loai();
            include_once  'truyen/editcomic.php';
            break;
            //Xóa chapter
        case 'xoa_chapter':
            if (isset($_GET['id_chapter'])) {
                $id_chapter = $_GET['id_chapter'];
                $id = $_GET['id'];
                $number_chapter = $_GET['number_chapter'];
                $count = count_chapter_delete($id);
                delete_comic_img($id_chapter);
                $limit = select_limit_chapter($number_chapter, $id,$count);
                foreach ($limit as $value) {
                    extract($value);
                    tru_chapter($value['number_chapter'], $id);
                }
                delete_chapter($id_chapter);
                header('location:index.php?act=sua_truyen&id=' . $id);
            }
            break;
        case 'sua_chapter':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $id_chapter = $_GET['id_chapter'];
                $img_comic = img_comic($id, $id_chapter);
                $load_one = load_one_chapter($id, $id_chapter);
                $count_chapter = count_chapter($id);
                $noi_dung_id = load_one_noi_dung_chapter($id, $id_chapter);

                if (isset($_POST['btn-update'])) {
                    $noi_dung = $_POST['noi_dung'];
                    $allowUpload = true;

                    if ($_FILES["file"]["name"][0] == "") {
                        $allowUpload = true;
                    } else {
                        $allowUpload = true;
                        //đếm phần tử trong file
                        $countfiles = count($_FILES['file']['name']);

                        //Đường dẫn đích
                        $target_dir = "../content/" . $url_img . "img_cua_comic/";

                        //Đường dẫn vào file đích
                        for ($i = 0; $i < $countfiles; $i++) {
                            $target_file = $target_dir . $_FILES["file"]["name"][$i];
                        }

                        //lấy phần mở rộng của file (là đuôi file, định dạng) vd: png, jpg,...
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                        //định dạng được chấp nhận
                        $allowtype = ["jpg", "jpeg"];

                        //kiểm tra xem phải ảnh ko nếu là ảnh thì trả về true ngược lại
                        //ko là ảnh trả về false
                        for ($i = 0; $i < $countfiles; $i++) {
                            $check = getimagesize($_FILES["file"]["tmp_name"][$i]);
                            if ($check == false) {
                                $khong_phai_anh_f = "Đây không phải là file ảnh";
                                $allowUpload = false;
                                break;
                            }
                        }

                        //kiểm tra kiêu file không làm trong định dạng cho phép
                        if (!in_array($imageFileType, $allowtype)) {
                            $loi_dinh_dang_f = "Không được upload những ảnh có định dạng ipg, jpeg";
                            $allowUpload = false;
                        }
                    }

                    if ($allowUpload == true) {
                        update_chapter($noi_dung, $noi_dung_id['id_ch']);
                        if ($_FILES["file"]["name"][0] != "") {
                            for ($i = 0; $i < $countfiles; $i++) {
                                //xử lý di chuyển file tạm vào thư mục cần lưu trữ
                                $filename = $_FILES["file"]["name"][$i];
                                // Upload file
                                move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_dir . $filename);
                                up_load_img($filename, $noi_dung_id['id_ch']);
                            }
                        }
                        header("location: " . $_SERVER['HTTP_REFERER']);
                    }
                }
            }
            $list_all_images = load_all_image();
            $list_all_loai = load_all_loai();
            include_once  'truyen/edit_chapter.php';
            break;
            //Update_truyen
        case 'update_truyen':
            if (isset($_POST['btn-update'])) {
                $date = date('m/d/Y h:i:s a', time());
                $id = $_POST['id'];
                $name = $_POST['name'];
                $detail = $_POST['detail'];
                $author = $_POST['author'];
                $intro = $_POST['intro'];
                $category_id = $_POST['category_id'];
                $name_cu = comic_select_one($id)['name'];
                $ten_cu = load_all_comic_edit($name_cu);

                $allowUpload = true;

                if ($_POST['vip'] == 0) {
                    $price_comic = 0;
                    $vip = 0;
                } else {
                    $price_comic = $_POST['price_comic'];
                    if($price_comic < 0){
                        $_SESSION['tien_nho'] = 'Giá tiền phải là dương!';
                        $allowUpload = false;
                    }
                    $vip = 1;
                }

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

                if ($_FILES["cover_image"]['name'] == "") {
                    $name_img = name_comic($id)['cover_image'];
                } else {
                    //Đường dẫn đích
                    $target_dir = "../content/" . $url_img . "cover_img/";

                    //Đường dẫn vào file đích
                    $target_file = $target_dir . $_FILES["cover_image"]["name"];

                    //lấy phần mở rộng của file (là đuôi file, định dạng) vd: png, jpg,...
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    //định dạng được chấp nhận
                    $allowtype = ["jpg", "jpeg"];

                    //kiểm tra xem phải ảnh ko nếu là ảnh thì trả về true ngược lại
                    //ko là ảnh trả về false
                    $check = getimagesize($_FILES["cover_image"]["tmp_name"]);
                    if ($check == false) {
                        $khong_phai_anh = "Đây không phải là file ảnh";
                        $allowUpload = false;
                    }

                    //kiểm tra kiêu file không làm trong định dạng cho phép
                    if (!in_array($imageFileType, $allowtype)) {
                        $loi_dinh_dang = "Không được upload những ảnh có định dạng ipg, jpeg";
                        $allowUpload = false;
                    }

                    if ($allowUpload == true) {
                        //xử lý di chuyển file tạm vào thư mục cần lưu trữ
                        $name_img = $_FILES["cover_image"]["name"];
                        // Upload file
                        move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_dir . $name_img);
                    }
                }

                if ($allowUpload == true) {
                    update_comic($id, $name, $name_img, $detail, $author, $date, $intro, $category_id, $vip, $price_comic);
                } else {
                    header('location:index.php?act=sua_truyen&id=' . $id);
                }
            }
            $load_all_truyen = comic_select_all();
            $list_all_loai = load_all_loai();
            include_once  'truyen/comic.php';
            break;
            //xóa truyện trong update
        case 'xoa_img_comic':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $id_comic = $_GET['id_comic'];
                $id_chapter = $_GET['id_chapter'];
                delete_img_comic($id);
                header('location: index.php?act=sua_chapter&id=' . $id_comic . '&id_chapter=' . $id_chapter);
            }
            break;
            //list_coment
        case 'list_bl':
            $list_comment = select_comment();
            include_once  'binh_luan/comment.php';
            break;
            //list_coment search
        case 'search_bl':
            if (isset($_POST['btn_search'])) {
                $key = $_POST['key_search'];
                $id_comic = $_POST['id_comic'];
                // echo '<pre>';
                // echo $key;
                // echo $id_comic;
                // die;
            } else {
                $key = '';
                $id_comic = 0;
                $list_comment = select_comment();
            }
            $list_comment = select_comment_search($key, $id_comic);
            include_once  'binh_luan/comment.php';
            break;
            //xoa binh luan
        case 'xoa_comment':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_comment($id);
                $list_comment = select_comment();
                include_once  'binh_luan/comment.php';
            }
            break;
            //thong ke
        case 'list_tk':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            $statistical = statistical_truyen();
            $statistical_coin = thong_ke_coin();
            $top_coin = select_top_coin();
            include_once 'thong_ke/thongke.php';
            break;
            //biểu đồ
        case 'search_tk_dm':
            if (isset($_POST['btn_search'])) {
                $key = $_POST['key_search'];
            } else {
                $key = '';
                $statistical = statistical_truyen();
                $statistical_coin = thong_ke_coin();
                $top_coin = select_top_coin();
            }
            $statistical = statistical_truyen_search($key);
            $statistical_coin = thong_ke_coin();
            $top_coin = select_top_coin();
            include_once 'thong_ke/thongke.php';
            break;
        case 'bieu_do':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            $statistical = statistical_truyen();
            include_once './thong_ke/bieu_do.php';
            break;
            //list_bill
        case 'lisk_bill':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            $list_bill = load_bill();
            include_once '../admin/bill/list_bill.php';
            break;
        case 'search_bill':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            if (isset($_POST['btn_search'])) {
                $key = $_POST['key_search'];
                $status = $_POST['status'];
            } else {
                $key = '';
                $status = 3;
                $list_bill = load_bill();
            }
            $list_bill = search_bill($key, $status);
            include_once  "../admin/bill/list_bill.php";
            break;
            //xóa bill
        case 'delete_bill':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_gd($id);
                $list_bill = load_bill();
                include_once  '../admin/bill/list_bill.php';
                $thong_bao = 'Xóa thành công';
            }
            break;
            //edit_bill
        case 'edit_bill':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $bill_one = load_one_bill($id);
            }
            include_once '../admin/bill/edit_bill.php';
            break;
        case 'update_bill':
       
            if (isset($_POST['cap_nhat'])) {
                $status = $_POST['status'];
                $id = $_POST['id'];
                $price = $_POST['price'];
                $id_user = $_POST['id_user'];
                $date = date('m/d/Y h:i:s a', time());
                if ($status == 1) {
                    if ($price == 20000) {
                        $coin = 20000;
                    }
                    if ($price == 50000) {
                        $coin = 50000;
                    }
                    if ($price == 100000) {
                        $coin = 120000;
                    }
                    if ($price == 200000) {
                        $coin = 240000;
                    }
                    if ($price == 500000) {
                        $coin = 550000;
                    }
                    $content = 'bạn đã được cộng ' . $coin . 'coin';
                    update_bill($id, $status);
                    update_coin($id_user, $coin);
                    insert_tb($id_user, $content, $date);
                    $user = get_one_user($id_user);
                    $_SESSION['auth'] = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'name' => $user['name'],
                        'role' => $user['role'],
                        'role_name' => $user['role_name'],
                        'coin' => $user['coin'],
                        'phone' => $user['phone'],
                        'address' => $user['address']
                    ];
                } else if ($status == 2) {
                    if (strlen(trim($_POST['why_not'])) != 0) {

                        $content = 'bạn không được duyệt với lí do ' . $_POST['why_not'];
                        insert_tb($id_user, $content, $date);
                        update_bill($id, $status);
                    } else {
                        $_SESSION['err_whynot'] = 'yêu cầu nhập lí do';
                        header('location:index.php?act=edit_bill&id=' . $id);
                    }
                } else if ($status == 0) {
                    update_bill($id, $status);
                }
            }

            $list_bill = load_bill();
            include_once '../admin/bill/list_bill.php';
            break;
            //list ý kiến
        case 'list_contact':
            $list_contact = select_contact();
            include_once '../admin/contact.php';
            break;
        case 'search_y_kien':
            if (isset($_POST['btn_search'])) {
                $key = $_POST['key_search'];
            } else {
                $key = '';
                $list_contact = select_contact();
            }
            $list_contact = select_contact_search($key);
            include_once '../admin/contact.php';
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

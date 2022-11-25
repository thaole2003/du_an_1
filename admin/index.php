<?php
session_start();

include_once "header.php";
include_once  "../DAO/user.php";
require_once "../DAO/pdo.php";
require_once "../DAO/loai.php";
require_once "../DAO/comic.php";
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
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
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
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            $list_all_loai = load_all_loai();
            include_once "danh_muc/listcategories.php";
            break;
            // sua loai

        case 'sua_loai':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $loai_one = load_one_loai($id);
            }
            include_once "danh_muc/editcategory.php";
            break;
            //Cập nhật
        case 'cap_nhat_loai':
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
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
            if (check_admin_role() == false) {
                header("location:../index.php?act=login&msg= Bạn không có quyền truy cập");
                die;
            }
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_fk_comic($id);
                delete_loai($id);
                $list_all_loai = load_all_loai();
                include_once  'danh_muc/listcategories.php';
                $thong_bao = 'Xóa thành công';
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
            //đồng ý phê duyệt
        case 'yes':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                update_status_yes($id);
                header('location:index.php?act=agree');
                $_SESSION['yess'] = 'truyện đã được phê duyệt';
            }
            break;
            //không đồng ý phê duyệt
        case 'no':
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
                        delete_comic_img($id);
                        delete_comic($id);

                        $mail = new PHPMailer(true);
                        try {
                            //Server settings
                            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'lmt.3102003@gmail.com';                 // SMTP username
                            $mail->Password = 'qukhpoglcowqybog';                           // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to

                            //Recipients
                            $mail->setFrom('lmt.3102003@gmail.com ', 'Mailer');
                            $mail->addAddress($email_agree['email'], $email_agree['name']);     // Add a recipient
                            // $mail->addAddress('vietnqph27022@fpt.edu.vn','việt sếch');               // Name is optional
                            // $mail->addReplyTo('info@example.com', 'Information');
                            $mail->addCC('lmt.3102003@gmail.com');
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
                if ($_POST['vip'] == 0) {
                    $price_comic = 0;
                    $vip = 0;
                }else{
                    $price_comic = $_POST['price_comic'];
                    $vip = 1;
                }
                $allowUpload = true;
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

                    //kiểm tra nếu như file đã tồn tại thì sẽ ko cho phép up nữa a
                    if (file_exists($target_file)) {
                        $file_ton_tai_f = "Tên file đã tồn tại trên server ko được ghi đè";
                        $allowUpload = false;
                    }

                    //kiểm tra kiêu file không làm trong định dạng cho phép
                    if (!in_array($imageFileType, $allowtype)) {
                        $loi_dinh_dang_f = "Không được upload những ảnh có định dạng ipg, jpeg";
                        $allowUpload = false;
                    }
                }

                if ($allowUpload == true) {
                    $id = comic_insert($namee, $detail, $author, $date, $intro, $view, $like, $category, $name_img, $st, $po, $vip, $price_comic);
                    //xử lý di chuyển file tạm vào thư mục cần lưu trữ
                    for ($i = 0; $i < $countfiles; $i++) {
                        $filename = $_FILES["file"]["name"][$i];
                        // Upload file
                        move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_dir . $filename);
                        up_load_img($id, $filename);
                    }
                    $upload_ok = "Upload thành công";
                }
            }
            include_once  'truyen/addcomic.php';
            break;
            // DELETE Truyện
        case 'xoa_truyen':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_img_history($id);
                delete_img_comic($id);
                delete_img_love($id);
                delete_img_comment($id);
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
                $img_comic = img_comic($id);
            }
            $list_all_images = load_all_image();
            $list_all_loai = load_all_loai();
            include_once  'truyen/editcomic.php';
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
                if ($_POST['vip'] == 0) {
                    $price_comic = 0;
                    $vip = 0;
                }else{
                    $price_comic = $_POST['price_comic'];
                    $vip = 1;
                }

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

                    //kiểm tra nếu như file đã tồn tại thì sẽ ko cho phép up nữa a
                    if (file_exists($target_file)) {
                        $file_ton_tai_f = "Tên file đã tồn tại trên server ko được ghi đè";
                        $allowUpload = false;
                    }

                    //kiểm tra kiêu file không làm trong định dạng cho phép
                    if (!in_array($imageFileType, $allowtype)) {
                        $loi_dinh_dang_f = "Không được upload những ảnh có định dạng ipg, jpeg";
                        $allowUpload = false;
                    }
                    for ($i = 0; $i < $countfiles; $i++) {
                        //xử lý di chuyển file tạm vào thư mục cần lưu trữ
                        $filename = $_FILES["file"]["name"][$i];
                        // Upload file
                        move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_dir . $filename);
                        up_load_img($id, $filename);
                    }
                    $allowUpload = false;
                }

                if ($allowUpload == true) {
                    update_comic($id, $name, $name_img, $detail, $author, $date, $intro, $category_id,$vip,$price_comic);
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
                delete_img_comic($id);
                header('location: index.php?act=sua_truyen&id=' . $id_comic);
            }
            break;
            //list_coment
        case 'list_bl':
            $list_comment = select_comment();
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
            $statistical = statistical_truyen();
            include_once 'thong_ke/thongke.php';
            break;
        case 'bieu_do':
            // echo "<pre>";
            $statistical = statistical_truyen();
            // var_dump($statistical);
            // echo "</pre>";
            // die();
            include_once './thong_ke/bieu_do.php';
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

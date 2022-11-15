<?php
session_start();

include_once "header.php";
include_once  "../DAO/user.php";
require_once "../DAO/pdo.php";
require_once "../DAO/loai.php";
require_once "../DAO/comic.php";
include "../global.php";
if (check_admin_role() == false) {
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
            //add user
            case 'add_user':
                $list_role=select_role();
                $list_email =select_email_user();
                if(isset($_POST['add'])){
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
                    if ($email == "") {
                        $flag_register = false;
                        $err_email = "Email không được để trống";
                    } elseif (!emailValid($email)) {
                        $flag_register = false;
                        $err_email = "Email chưa đúng định dạng mail";
                    }else{
                        foreach($list_email as $key=>$value){
                            if($email==$value['email']){
                                $flag_register=false;
                                $err_email="Email đã tồn tại";
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
                        $all_user = all_user();
                     
                    } else {
                        $thongbao = "Thêm người dùng thất bại";
                    }
                }
                include_once './user/adduser.php';
                break;
            //LIST USER
            case 'list_kh':
                $all_user = all_user();
                include_once './user/users.php';
                break;
            //DELETE_USER
            case 'delete_user':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    delete_user($id);
                    $all_user = all_user();
                    include_once './user/users.php';
                }
                break;
            //edit USER
            case 'edit_user':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $list_role=select_role();
                    $user_id=select_User_Id($id);

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
                $img_id = $_POST['images'];
                foreach ($all_name_comic as $key => $value) {
                    if ($length2 == 0) {
                        $thongbao = 'không được để trống';
                        $flag = false;
                    }
                    if ($namee == $value['name']) {
                        $thongbao = 'tên truyện đã tồn tại';
                        $flag = false;
                        break;
                    }
                }
                if ($flag == true) {
                    comic_insert($namee, $detail, $author, $date, $intro, $view, $like, $category, $img_id);
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
        case 'list_img':
            include "../admin/comic_img/list_comic.php";
            break;
        case 'add_img_comic':
            if (isset($_POST['btn-submit'])) {
                if (!isset($_FILES["file"])) {
                    $thong_bao = "Không tồn tại file để upload";
                    die();
                } else {
                    $id_comic = $_POST['id_comic'];
                    $thong_bao = "";

                    //đếm phần tử trong file
                    $countfiles = count($_FILES['file']['name']);
                    //Đường dẫn đích
                    $target_dir = "../content/" . $url_img;

                    //Đường dẫn vào file đích
                    for ($i = 0; $i < $countfiles; $i++) {
                        $target_file = $target_dir . $_FILES["file"]["name"][$i];
                    }

                    //đồng ý upload
                    $allowUpload = true;

                    //lấy phần mở rộng của file (là đuôi file, định dạng) vd: png, jpg,...
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                    //định dạng được chấp nhận
                    $allowtype = ["jpg", "jpeg"];

                    //kiểm tra xem phải ảnh ko nếu là ảnh thì trả về true ngược lại
                    //ko là ảnh trả về false
                    for ($i = 0; $i < $countfiles; $i++) {
                        $check = getimagesize($_FILES["file"]["tmp_name"][$i]);
                        if ($check == false) {
                            $khong_phai_anh = "Đây không phải là file ảnh";
                            break;
                        }else{
                            $khong_phai_anh = "";
                        }
                    }

                    //kiểm tra nếu như file đã tồn tại thì sẽ ko cho phép up nữa
                    if (file_exists($target_file)) {
                        $file_ton_tai = "Tên file đã tồn tại trên server ko được ghi đè";
                        $allowUpload = false;
                    }else{
                        $file_ton_tai = "";
                    }

                    //kiểm tra kiêu file không làm trong định dạng cho phép
                    if (!in_array($imageFileType, $allowtype)) {
                        $loi_dinh_dang = "Không được upload những ảnh có định dạng ipg, jpeg";
                        $allowUpload = false;
                    }else{
                        $loi_dinh_dang = "";
                    }

                    if ($allowUpload == true) {
                        //xử lý di chuyển file tạm vào thư mục cần lưu trữ
                        for ($i = 0; $i < $countfiles; $i++) {
                            $filename = $_FILES["file"]["name"][$i];
                            // Upload file
                            move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_dir . $filename);
                            up_load_img($id_comic,$filename);
                            // echo '<pre>';
                            // print_r($filename);
                            // echo '</br>';
                        }
                        $upload_ok = "Upload thành công";
                    }
                }
            }
            include "../admin/comic_img/add_comic.php";
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="../content/uploads/"></a>
</body>

</html>
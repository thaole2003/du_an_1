<?php
// them khach hang 
function insert_khach_hang($email, $pass, $name, $phone, $dia_chi, $role)
{
    $sql = "INSERT into user(email,password,name,phone,address,role) values('$email','$pass','$name','$phone','$dia_chi','$role')";
    pdo_execute($sql);
}
// update khách hàng 
function update_khach_hang($ma_khach_hang, $email, $user, $pass, $dia_chi, $dien_thoai)
{
    $sql = "update khach_hang set 
    email='$email',
    user='$user',
    pass='$pass',
    dia_chi='$dia_chi',
    dien_thoai='$dien_thoai'
    where ma_khach_hang = $ma_khach_hang";
    pdo_execute($sql);
}




// slect khách hàng theo id
function select_User_Id($id)
{
    $sql = "SELECT * from user where id=$id";
    // $sql="SELECT user.*,
    // roles.`name` as rname
    // FROM `user` 
    // join roles
    // ON `user`.role = roles.id
    // WHERE `user`.id =$id";
    return pdo_query_one($sql);
}
// update khách hàng trong admin
function update_user($id, $name, $phone, $address, $role)
{
    $sql = "update user set 
    name='$name',
    phone='$phone',
    address='$address',
    role='$role'
    where id = $id";
    pdo_execute($sql);
}
// xoa khách hàng 
function delete_user($id)
{
    $sql = "DELETE FROM `user` where id=$id";
    pdo_execute($sql);
}

function emailValidate($email)
{
    return (bool)preg_match("/^\\S+@\\S+\\.\\S+$/", $email);
}
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function update_password($id, $pw)
{
    $sql = "update `user` set 
    `password`='$pw'
        where id = $id";
    pdo_execute($sql);
}
function get_one_user_by_email($email)
{
    $sql = "select 
    u.*, 
    r.name as role_name
from user u
join roles r
    on r.id = u.role
where email = '$email'";
    return pdo_query_one($sql);
}
function get_one_user($id)
{
    $sql = "select 
    u.*, 
    r.name as role_name
from user u
join roles r
    on r.id = u.role
where u.id = '$id'";
    return pdo_query_one($sql);
}
function select_pass($id)
{
    $sql = "select 
    u.`password` 
from 
  `user` as u
where id = $id";
    return pdo_query_one($sql);
}
function check_admin_manager_role()
{
    if (isset($_SESSION['auth']) && ($_SESSION['auth']['role'] == 1 || $_SESSION['auth']['role'] == 3)) {
        return true;
    }
    return false;
}

function check_admin_role()
{
    if (isset($_SESSION['auth']) &&  $_SESSION['auth']['role'] == 1) {
        return true;
    }
    return false;
}
//select all user
function all_user()
{
    $sql = "SELECT u.*,
    r.`name` as r_name
    FROM `user` u
    JOIN roles r 
    ON u.role = r.id order by u.id desc";
    return pdo_query($sql);
}
function load_all_roll(){
    $sql = "SELECT * FROM roles";
    return pdo_query($sql);
}
function all_user_searh($key,$role)
{
    $sql = "SELECT u.*,
    r.`name` as r_name
    FROM `user` u
    JOIN roles r 
    ON u.role = r.id where 1";

    if ($key != "") {
        $sql.= " and u.name like '%" . $key . "%'";
    }
    if ($role > 0) {
        $sql .= " and u.role = $role";
    }

    $sql .= " order by u.id desc";
    return pdo_query($sql);
}
// selct table user
function select_email_user()
{
    $sql = "SELECT email from user";
    return pdo_query($sql);
}
// Đếm email theo đầu vào của email
function count_email_input($email)
{
    $sql = "SELECT COUNT(*) from user where email='$email'";
    return pdo_query_value($sql);
}
// kiểm tra email
function emailValid($email)
{
    return (bool)preg_match("/^\\S+@\\S+\\.\\S+$/", $email);
}
// kiểm tra phone number
function isVietnamesePhoneNumber($number)
{
    return (bool)preg_match("/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/", $number);
}
// kiểm tra password
function isPassword($password)
{
    return (bool)preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password);
}
// select bảng role
function select_role()
{
    $sql = "Select * from roles";
    return pdo_query($sql);
}



function add_contact($name, $email, $comment)
{
    $sql = "INSERT into contact(name,email,comment) values('$name','$email','$comment')";
    pdo_execute($sql);
}
function select_contact()
{
    $sql = "SELECT * from contact";
    return pdo_query($sql);
}
function select_contact_search($key)
{
    $sql = "SELECT * from contact where 1";

    if ($key != "") {
        $sql.= " and name like '%" . $key . "%'";
    }
    $sql .= " order by id desc";
    return pdo_query($sql);
}
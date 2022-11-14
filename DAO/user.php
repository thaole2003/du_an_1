<?php 
// them khach hang 
function insert_khach_hang($email, $pass, $name, $phone,$dia_chi,$role){
    $sql = "INSERT into user(email,password,name,phone,address,role) values('$email','$pass','$name','$phone','$dia_chi','$role')";
    pdo_execute($sql);
}
// update khách hàng 
function update_khach_hang($ma_khach_hang,$email,$user,$pass,$dia_chi,$dien_thoai){
    $sql = "update khach_hang set 
    email='$email',
    user='$user',
    pass='$pass',
    dia_chi='$dia_chi',
    dien_thoai='$dien_thoai'
    where ma_khach_hang = $ma_khach_hang";
    pdo_execute($sql);
}
// update khách hàng trong admin 
function update_khach_hang_trong_admin($ma_khach_hang,$email,$user,$pass,$dia_chi,$dien_thoai,$vai_tro){
    $sql = "update khach_hang set 
    email='$email',
    user='$user',
    pass='$pass',
    dia_chi='$dia_chi',
    dien_thoai='$dien_thoai',
    vai_tro='$vai_tro'
    where ma_khach_hang = $ma_khach_hang";
    pdo_execute($sql);
}
// xoa khách hàng 
function delete_khach_hang($id){
    $sql = "delete from khach_hang where ma_khach_hang =".$id;
    pdo_execute($sql);
}

function emailValidate($email)
{
    return (bool)preg_match ("/^\\S+@\\S+\\.\\S+$/", $email);
}
function get_one_user_by_email($email){
    $sql = "select 
    u.*, 
    r.name as role_name
from user u
join roles r
    on r.id = u.role
where email = '$email'";
    return pdo_query_one($sql);
}
function check_admin_role(){
    if(isset($_SESSION['auth']) && $_SESSION['auth']['role'] == 1){
        return true;
    }
    return false;
}

//select all user
function all_user(){
    $sql ="SELECT u.*,
    r.`name` as r_name
    FROM `user` u
    JOIN roles r 
    ON u.role = r.id";
    return pdo_query($sql);
}
// selct table user
function select_email_user(){
    $sql = "SELECT email from user";
    return pdo_query($sql);
}
// kiểm tra email
function emailValid($email)
{
    return (bool)preg_match ("/^\\S+@\\S+\\.\\S+$/", $email);
}
// kiểm tra phone number
function isVietnamesePhoneNumber($number) {
    return (bool)preg_match("/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/",$number);
  }
// kiểm tra password
function isPassword($password){
    return (bool)preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password);
}
// select bảng role
function select_role(){
    $sql="Select * from roles";
    return pdo_query($sql);
}
?>
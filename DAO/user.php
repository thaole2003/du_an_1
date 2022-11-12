<?php 

function insert_khach_hang($email, $user, $pass, $dia_chi, $dien_thoai)
{
    $sql = "insert into khach_hang(email,user,pass,dia_chi,dien_thoai) values('$email','$user','$pass','$dia_chi','$dien_thoai')";
    pdo_execute($sql);
}
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
function delete_khach_hang($id){
    $sql = "delete from khach_hang where ma_khach_hang =".$id;
    pdo_execute($sql);
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
?>
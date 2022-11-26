<?php 
function insert_bill($id_user,$name,$price,$email,$address,$phone,$status,$date){
    $sql = "insert into bill(id_user,name,price,email,address,phone,status,date) values('$id_user','$name','$price','$email','$address','$phone','$status','$date')";
    pdo_execute($sql);
}
function load_all_bill($id_user){
    $sql = "select * from bill where id_user='$id_user' order by id desc";
    $bill = pdo_query($sql);
    return $bill;
}
function load_bill(){
    $sql = "select * from bill order by id desc";
    $bill = pdo_query($sql);
    return $bill;
}
function delete_gd($ma_comic)
{
    $sql = "DELETE FROM bill where id='$ma_comic' ";
    return pdo_execute($sql);
}
function load_one_bill($id){
    $sql = "select * from bill where id='$id' order by id desc";
    $bill = pdo_query_one($sql);
    return $bill;
}
function update_bill($id,$status){
    $sql = "update bill set status='$status' where id = '$id'";
    pdo_execute($sql);
}
function update_coin($id,$coin){
    $sql = "update user set coin=coin+$coin where id = '$id'";
    pdo_execute($sql);
}
function search_bill($key, $status)
{
    $sql = "select * from bill where 1";

    if ($key != "") {
        $sql .= " and name like '%" . $key . "%'";
    }
    if ($status >= 0 && $status < 3) {
        $sql .= " and status = '" . $status . "'";
    }
    $sql .= " order by id desc";
    return pdo_query($sql);
}
function update_tru_coin($id,$coin){
    $sql = "update user set coin=coin-$coin where id = '$id'";
    pdo_execute($sql);
}
function check_his($id_comic,$id_user){
    $sql = "SELECT * FROM history_comic_user WHERE id_comic = $id_comic and id_user = $id_user";
    $his = pdo_query_one($sql);
    return $his;
}
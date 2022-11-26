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
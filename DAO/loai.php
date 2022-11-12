<?php 

 function insert_loai($ten_loai){

    $sql = "insert into category(name) values('$ten_loai')";
    pdo_execute($sql);
}

function delete_loai_hang($id){
    $sql = "delete from category where id =".$id;
    pdo_execute($sql);
}
function update_loai($id,$name){
    $sql = "update category set name='$name' where id = '$id'";
    pdo_execute($sql);
}
function load_all_loai(){
    $sql = "select * from category order by id desc";
    $list_loai = pdo_query($sql);
    return $list_loai;
}
function load_all_loai_edit($name){
    $sql = "select * from category where name != '".$name."'";
    $list_loai = pdo_query($sql);
    return $list_loai;
}
function load_one_loai($id){
    $sql = "select * from category where id = '$id'";
    $lh = pdo_query_one($sql);
    return $lh;
}
?>
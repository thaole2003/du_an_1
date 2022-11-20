<?php 
// them loai
 function insert_loai($ten_loai){
    $sql = "insert into category(name) values('$ten_loai')";
    pdo_execute($sql);
}
// xoa loai
function delete_loai($id){
    $sql = "delete from category where id =".$id;
    pdo_execute($sql);
}
// sua loai
function update_loai($id,$name){
    $sql = "update category set name='$name' where id = '$id'";
    pdo_execute($sql);
}
//select table loai
function load_all_loai(){
    $sql = "select * from category order by id desc";
    $list_loai = pdo_query($sql);
    return $list_loai;
}
//DEM ban ghi theo name category nhap vao
function count_category($name){
    $sql="SELECT COUNT(*) from category where name='$name'";
    return pdo_query_value($sql);
}

// select all loai (dieu kien name!= name loai nhap vao)
function load_all_loai_edit($name){
    $sql = "select * from category where name != '".$name."'";
    $list_loai = pdo_query($sql);
    return $list_loai;
}
//select table loai theo id
function load_one_loai($id){
    $sql = "select * from category where id = '$id'";
    $lh = pdo_query_one($sql);
    return $lh;
}
?>
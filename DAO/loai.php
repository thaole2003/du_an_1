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
function load_all_loai_fk($id){
    $sql = "SELECT A.id,C.id_comic,D.id_chapter FROM comic A INNER JOIN category B on A.category_id = B.id INNER JOIN chapter C ON A.id = C.id_comic INNER JOIN images D ON C.id = D.id_chapter WHERE B.id = $id";
    $all = pdo_query($sql);
    return $all;
}

function load_all_history($id){
    $sql = "SELECT A.id 
    FROM comic A INNER JOIN category B on A.category_id = B.id
    INNER JOIN history_comic_user C on A.id = C.id_comic
    WHERE B.id = $id";
    $all = pdo_query($sql);
    return $all;
}

function load_all_love($id){
    $sql = "SELECT A.id 
    FROM comic A INNER JOIN category B on A.category_id = B.id
    INNER JOIN love C on A.id = C.id_comic
    WHERE B.id = $id";
    $all = pdo_query($sql);
    return $all;
}

function load_all_comment($id){
    $sql = "SELECT A.id 
    FROM comic A INNER JOIN category B on A.category_id = B.id
    INNER JOIN comment C on A.id = C.comic_id
    WHERE B.id = $id";
    $all = pdo_query($sql);
    return $all;
}
?>
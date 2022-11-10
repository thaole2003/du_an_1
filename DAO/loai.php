<?php 
 function insert_loai($ten_loai){
    $sql = "insert into category(name) values('$ten_loai')";
    pdo_execute($sql);
}

function delete_loai_hang($id){
    $sql = "delete from loai_hang where ma_loai =".$id;
    pdo_execute($sql);
}
function update_loai_hang($ma_loai,$ten_loai){
    $sql = "update loai_hang set ten_loai='$ten_loai' where ma_loai = ".$ma_loai;
    pdo_execute($sql);
}
function load_all_loai(){
    $sql = "select * from category order by id desc";
    $list_loai_hang = pdo_query($sql);
    return $list_loai_hang;
}

function load_one_loai_hang($id){
    $sql = "select * from loai_hang where ma_loai = ".$id;
    $lh = pdo_query_one($sql);
    return $lh;
}
?>
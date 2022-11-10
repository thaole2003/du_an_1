<?php 
 function insert_binh_luan($noi_dung,$id_user,$id_pro,$ngay_binh_luan){
    $sql = "insert into binh_luan(noi_dung,id_user,id_pro,ngay_binh_luan) values('$noi_dung','$id_user','$id_pro','$ngay_binh_luan')";
    pdo_execute($sql);
}
function delete_binh_luan($id){
    $sql = "delete from binh_luan where ma_binh_luan =".$id;
    pdo_execute($sql);
}

?>
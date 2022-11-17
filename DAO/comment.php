<?php 
function insert_binh_luan($date,$detail,$comic_id,$user_id){
    $sql = "insert into comment(date,detail,comic_id,user_id) values('$date','$detail','$comic_id','$user_id')";
    echo $sql;
    pdo_execute($sql);
}
function delete_binh_luan($id){
    $sql = "delete from binh_luan where ma_binh_luan =".$id;
    pdo_execute($sql);
}

function load_all_comic_byid($id){
$sql = "SELECT 
c.*,
u.`name` as u_name
FROM comment c
JOIN `user` u
ON u.id = c.user_id
 where comic_id = $id
	order by date desc";
    return pdo_query($sql);
}

?>
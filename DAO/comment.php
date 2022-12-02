<?php 
function insert_binh_luan($date,$detail,$comic_id,$user_id){
    $sql = "insert into comment(date,detail,comic_id,user_id) values('$date','$detail','$comic_id','$user_id')";
    echo $sql;
    pdo_execute($sql);
}
function delete_comment($id){
    $sql = "delete from comment where id =".$id;
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
//select table comment
function select_comment(){
    $sql="SELECT c.*, u.name as u_name, cm.name as comic_name from comment c join user u  ON c.user_id=u.id join comic cm ON c.comic_id=cm.id";
    return pdo_query($sql);
}
function select_comment_search($key,$id_comic)
{
    $sql = "SELECT c.*, u.name as u_name, cm.name as comic_name,cm.id as id_comic from comment c join user u  ON c.user_id=u.id join comic cm ON c.comic_id=cm.id where 1";

    if ($key != "") {
        $sql.= " and u.name like '%" . $key . "%'";
    }
    if ($id_comic > 0) {
        $sql .= " and cm.id = $id_comic";
    }

    $sql .= " order by u.id desc";
    return pdo_query($sql);
}
?>
<?php 
function comic_select_all_name(){
    $sql= 'SELECT * FROM comic';
    return pdo_query($sql);
}
function comic_select_all(){
    $sql = "SELECT 
    c.*, 
    i.name as img_name,
    ca.name as ca_name
from comic c
join images i
on c.images_id = i.comic_id
join category ca
on c.category_id = ca.id
    ";
    return pdo_query($sql);
}

function comic_insert($name, $detail, $author, $date,$intro,$view,$like,$category_id,$images_id){
    $sqlQuery = "INSERT INTO comic (name,detail,author,date,intro,view,like_comic,category_id,images_id) VALUES ('$name','$detail','$author','$date','$intro',$view,$like,$category_id,$images_id)";
    pdo_execute($sqlQuery);
}
function delete_comic($ma_comic){
    $sql ="DELETE FROM comic where id='$ma_comic' ";
    return pdo_execute($sql);
}
function search_all( $text){
    $sql = "SELECT c.name,c.date,
    i.name as img_name
    from comic c
    join images i
    on c.images_id = i.comic_id
    where c.name like '%$text%'
    ";
   
    return pdo_query($sql);
}
?>




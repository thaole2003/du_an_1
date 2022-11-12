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

function comic_select_one($id){
    $sql = "SELECT 
    c.*, 
    i.name as img_name,
    ca.name as ca_name
    from comic c
    join images i
    on c.id = i.comic_id
    join category ca
    on c.id = ca.id
    where c.id = '$id'
    ";
    $truyen = pdo_query_one($sql);
    return $truyen;
}
function load_all_image(){
    $sql = "select * from images order by id desc";
    $list_img = pdo_query($sql);
    return $list_img;
}
function update_comic($id,$name, $detail, $author, $date, $intro, $category_id, $images_id){
    $sql = "update comic set
    name= '".$name."',
    detail='".$detail."',
    author='".$author."',
    date='".$date."', 
    intro='".$intro."', 
    category_id='$category_id', 
    images_id='$images_id'
    where id= '$id'";
    pdo_execute($sql);
}

function comic_insert($name, $detail, $author, $date,$intro,$view,$like,$category_id,$images_id){
    $sqlQuery = "INSERT INTO comic (name,detail,author,date,intro,view,like_comic,category_id,images_id) VALUES ('$name','$detail','$author','$date','$intro',$view,$like,$category_id,$images_id)";
    pdo_execute($sqlQuery);
}
function delete_comic($ma_comic){
    $sql ="DELETE FROM comic where id='$ma_comic' ";
    return pdo_execute($sql);
}
?>




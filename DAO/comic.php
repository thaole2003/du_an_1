<?php 
function comic_select_all_name(){
    $sql= 'SELECT * FROM comic';
    return pdo_query($sql);
}
function comic_select_all(){
    $sql ="SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name
from comic c
join category ca
on c.category_id = ca.id order by c.id desc";
    return pdo_query($sql);
}

function comic_select_all_search($key,$category_id){
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name
from comic c
join category ca
on c.category_id = ca.id 
    where 1";
    if($key != ""){
        $sql.=" and c.name like '%".$key."%'";
    }
    if($category_id > 0){
        $sql.=" and c.category_id = '".$category_id."'";
    }
    $sql.=" order by c.id desc";
    return pdo_query($sql);
}

function comic_select_one($id){
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name
    from comic c
    join category ca
    on c.category_id = ca.id
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
function update_comic($id, $name,$filename, $detail, $author, $date, $intro, $category_id){
    $sql = "update comic set
    name= '".$name."',
    cover_image= '".$filename."',
    detail='".$detail."',
    author='".$author."',
    date='".$date."', 
    intro='".$intro."', 
    category_id='$category_id'
    where id= '$id'";
    pdo_execute($sql);
}
function update_view($id){
$sql = "UPDATE comic SET view = view+1 where id = $id";
pdo_execute($sql);
}
function update_like($id){
    $sql = "UPDATE comic SET like_comic	  = like_comic+1 where id = $id";
    pdo_execute($sql);
    }
function comic_insert($name, $detail, $author, $date,$intro,$view,$like,$category_id,$filename){
    $sqlQuery = "INSERT INTO comic (name,cover_image,detail,author,date,intro,view,like_comic,category_id) VALUES ('$name','$filename','$detail','$author','$date','$intro',$view,$like,$category_id)";
    pdo_execute($sqlQuery);
}
function delete_comic($ma_comic){
    $sql ="DELETE FROM comic where id='$ma_comic' ";
    return pdo_execute($sql);
}
function delete_fk_comic($ma_loai){
    $sql ="DELETE FROM comic where category_id='$ma_loai' ";
    return pdo_execute($sql);
}
function load_all_comic_edit($name){
    $sql = "select * from comic where name != '$name'";
    return pdo_query($sql);
     
}
function all_comic_by_categoryid($id){
$sql = "SELECT 
c.*, 
c.cover_image as img_name,
ca.name as ca_name
from comic c
join category ca
on c.category_id = ca.id
WHERE c.category_id= $id";
return pdo_query($sql);

}
function search_all($text){
    $sql = "SELECT name,date,cover_image as img_name
    from comic 
    where name like '%$text%'
    ";
   
    return pdo_query($sql);
}

function load_all_truyen_like(){
    $sql = "SELECT name, cover_image as img, date,id from comic where 1 order by like_comic desc limit 0,5";
    $truyen_like = pdo_query($sql);
    return $truyen_like;
}
function comic_by_view(){
    $sql = "select 
    *,cover_image as iname
from comic
ORDER BY `view` DESC LIMIT 0,5";
return pdo_query($sql);
}
function detail_comic($id){
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.id as ca_id,
    ca.name as ca_name
    from comic c
    join category ca
    on c.category_id = ca.id
    WHERE c.id= $id";
    return pdo_query_one($sql);
}
function comic_by_date(){
    $sql = "select 
    *,
    cover_image as iname
from comic
ORDER BY `date` DESC";
return pdo_query($sql);
}
function select_name_comic(){
    $sql = "SELECT id,name FROM comic";
    return pdo_query($sql);
}
function up_load_img($id_comic,$name){
    $sql = "INSERT INTO images (name,comic_id) VALUES ('$name','$id_comic')";
    pdo_execute($sql);
}
function name_comic($id){
    $sql = "SELECT cover_image FROM comic where id = '$id'";
    $name = pdo_query_one($sql);
    return $name;
}
function img_comic($id){
    $sql = "SELECT A.`name`,B.`name` as img FROM comic A INNER JOIN images B on A.id = B.comic_id WHERE A.id = 40 order by B.`name` desc limit 0,10";
    $img_comic = pdo_query($sql);
    return $img_comic;
}

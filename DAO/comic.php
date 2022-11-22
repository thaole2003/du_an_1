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
function update_comic($id, $name,$name_img, $detail, $author, $date, $intro, $category_id){
    $sql = "update comic set
    name= '".$name."',
    cover_image= '".$name_img."',
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
function update_history_comic($idc,$idu){
    $sql = "INSERT INTO history_comic_user(id_comic,id_user) VALUES($idc,$idu)";
    pdo_execute($sql);
}
function history_comic($id){
    $sql = "SELECT 
    c.*
     FROM comic c
     join history_comic_user huc
     on huc.id_comic = c.id
    WHERE huc.id_user=$id";
    return pdo_query($sql);
}
function select_history_comic_by_user($id){
$sql = "SELECT 
*
 FROM  history_comic_user where id_user =$id";
 return pdo_query($sql);
}
function update_like($id){
    $sql = "UPDATE comic SET like_comic	  = like_comic+1 where id = $id";
    pdo_execute($sql);
    }
function comic_insert($name, $detail, $author, $date,$intro,$view,$like,$category_id,$name_img){
    $n = 'N';
    $sqlQuery = "INSERT INTO comic (name,cover_image,detail,author,date,intro,view,like_comic,category_id) VALUES ($n'$name',$n'$name_img',$n'$detail',$n'$author',$n'$date',$n'$intro',$view,$like,$category_id)";
    $id = pdo_query_last_id($sqlQuery);
    return $id;
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
function all_comic_by_love(){
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name
    from comic c
    join category ca
    on c.category_id = ca.id 
		ORDER BY like_comic DESC LIMIT 0,8";
    
    return pdo_query($sql);
    


}


function handle_dem_truyen_cung_tl($id){
    $sql= "SELECT COUNT(*) FROM comic
    WHERE category_id = $id";
    return pdo_query_one($sql);
}

function search_all($text){
    $sql = "SELECT id,name,date,cover_image as img_name
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
    $sql = "SELECT A.`name`,B.`name` as img, B.id as id_new FROM comic A INNER JOIN images B on A.id = B.comic_id WHERE A.id = '$id' order by B.`name`";
    $img_comic = pdo_query($sql);
    return $img_comic;
}
function img_comic_theo_id($id){
    $sql = "SELECT name FROM images WHERE comic_id = '$id'";
    $img_comic = pdo_query($sql);
    return $img_comic;
}
function delete_img_comic($id){
    $sql = "DELETE FROM images WHERE id = '$id'";
    $img_comic = pdo_query($sql);
    return $img_comic;
}
// thong ke truyen 
function statistical_truyen(){
    $sql="SELECT 
    category.id as category_id,
    category.name as category_name, 
     COUNT(comic.id) as so_luong, 
     SUM(comic.view) as sum_view, 
     SUM(comic.like_comic) as sum_like, 
     MAX(comic.view) as max_view, 
     MIN(comic.view) as min_view, 
     MAX(comic.like_comic) as max_like, 
     MIN(comic.like_comic) as min_like, 
     AVG(comic.view) as avg_view, 
     AVG(comic.like_comic) as avg_like
   from category 
   INNER JOIN comic
   ON comic.category_id = category.id
   GROUP BY category_id";
    return pdo_query($sql);
}
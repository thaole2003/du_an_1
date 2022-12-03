<?php
function comic_select_all_name()
{
    $sql = 'SELECT * FROM comic';
    return pdo_query($sql);
}

function comic_select_all()
{
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name
from comic c
join category ca
on c.category_id = ca.id
where c.status=2
 order by c.id desc";
    return pdo_query($sql);
}
function update_status_no($id)
{
    $sql = "UPDATE comic SET status	  = 3 where id = $id";
    pdo_execute($sql);
}
function comic_select_all_search($key, $category_id)
{
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name
from comic c
join category ca
on c.category_id = ca.id 
    where 1";
    if ($key != "") {
        $sql .= " and c.name like '%" . $key . "%'";
    }
    if ($category_id > 0) {
        $sql .= " and c.category_id = '" . $category_id . "'";
    }
    $sql .= " order by c.id desc";
    return pdo_query($sql);
}
function comic_select_one($id)
{
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name
    from comic c
    join category ca
    on c.category_id = ca.id
    where c.id = $id
    ";
    $truyen = pdo_query_one($sql);
    return $truyen;
}
function load_all_image()
{
    $sql = "select * from images order by id desc";
    $list_img = pdo_query($sql);
    return $list_img;
}
function update_comic($id, $name, $name_img, $detail, $author, $date, $intro, $category_id, $vip, $price)
{
    $sql = "update comic set
    name= '" . $name . "',
    cover_image= '" . $name_img . "',
    detail='" . $detail . "',
    author='" . $author . "',
    date='" . $date . "', 
    intro='" . $intro . "', 
    category_id='$category_id',
    vip='$vip', 
    price='$price'
    where id= '$id'";
    pdo_execute($sql);
}
function update_view($id)
{
    $sql = "UPDATE comic SET view = view+1 where id = $id";
    pdo_execute($sql);
}
function update_history_comic($idc, $idu)
{
    $sql = "INSERT INTO history_comic_user(id_comic,id_user) VALUES($idc,$idu)";
    pdo_execute($sql);
}
function history_comic($id)
{
    $sql = "SELECT 
    c.*
     FROM comic c
     join history_comic_user huc
     on huc.id_comic = c.id
    WHERE huc.id_user=$id order by huc.id desc";
    return pdo_query($sql);
}
function select_history_comic_by_user($id)
{
    $sql = "SELECT 
*
 FROM  history_comic_user where id_user =$id";
    return pdo_query($sql);
}
function update_like($id)
{
    $sql = "UPDATE comic SET like_comic	  = like_comic+1 where id = $id";
    pdo_execute($sql);
}
function update_dislike($id)
{
    $sql = "UPDATE comic SET like_comic	  = like_comic-1 where id = $id";
    pdo_execute($sql);
}
function comic_insert($name, $detail, $author, $date, $intro, $view, $like, $category_id, $name_img, $st, $po, $vip, $price_comic)
{

    $n = 'N';
    $sqlQuery = "INSERT INTO comic (name,cover_image,detail,author,date,intro,view,like_comic,category_id,status,poster,vip,price) VALUES ($n'$name',$n'$name_img',$n'$detail',$n'$author',$n'$date',$n'$intro',$view,$like,$category_id,$st,$po,$vip,$price_comic)";
    $id = pdo_query_last_id($sqlQuery);
    return $id;
}
function delete_comic($ma_comic)
{
    $sql = "DELETE FROM comic where id='$ma_comic' ";
    return pdo_execute($sql);
}
function delete_fk_comic($ma_loai)
{
    $sql = "DELETE FROM comic where category_id='$ma_loai' ";
    return pdo_execute($sql);
}
function load_all_comic_edit($name)
{
    $sql = "select * from comic where name != '$name'";
    return pdo_query($sql);
}
function all_comic_by_categoryiddetail($id, $id_comic)
{
    $sql = "SELECT 
c.*, 
c.cover_image as img_name,
ca.name as ca_name
from comic c
join category ca
on c.category_id = ca.id

WHERE c.category_id= $id and c.status=2 and c.id != $id_comic";
    return pdo_query($sql);
}
function all_comic_by_categoryid($id)
{
    $sql = "SELECT 
c.*, 
c.cover_image as img_name,
ca.name as ca_name
from comic c
join category ca
on c.category_id = ca.id

WHERE c.category_id= $id and c.status=2 ";
    return pdo_query($sql);
}
function all_comic_by_love()
{
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name
    from comic c
    join category ca
    on c.category_id = ca.id 
    where c.status =2
		ORDER BY like_comic DESC LIMIT 0,8";


    return pdo_query($sql);
}


//lấy truyện để duyệt
function comic_select_all_bystatus()
{
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name,
		u.email as u_email,
        u.name as name_poster
from comic c
join category ca
on c.category_id = ca.id
join user u
on c.poster = u.id
where c.status=1
 order by c.id desc;
";
    return pdo_query($sql);
}
function comic_select_all_bystatus_search($key)
{
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name,
		u.email as u_email,
        u.name as name_poster
from comic c
join category ca
on c.category_id = ca.id
join user u
on c.poster = u.id
where c.status=1";
    if ($key != "") {
        $sql .= " and u.name like '%" . $key . "%'";
    }
    $sql .= " order by c.id desc;
";
    return pdo_query($sql);
}
function comic_select_all_bystatus_3()
{
    $sql = "SELECT 
    c.*, 
    c.cover_image as img_name,
    ca.name as ca_name,
		u.email as u_email,
        u.name as name_poster
from comic c
join category ca
on c.category_id = ca.id
join user u
on c.poster = u.id
where c.status=3
 order by c.id desc;
";
    return pdo_query($sql);
}
function select_email_agree($id)
{
    $sql = "SELECT comic.id,comic.poster ,user.email,user.name
    FROM comic
    join user 
    on comic.poster = user.id
    WHERE comic.id = $id";
    return pdo_query_one($sql);
}
function count_comic()
{
    $sql = "SELECT COUNT(*) as soluong
    FROM comic
    WHERE id > 0;";
    return pdo_query_one($sql);
}
function handle_dem_truyen_cung_tl($id)
{
    $sql = "SELECT COUNT(*) FROM comic

    WHERE category_id = $id";
    return pdo_query_one($sql);
}

function search_all($text)
{
    $sql = "SELECT id,name,date,cover_image as img_name
    from comic 
    where name like '%$text%' and comic.status=2
    ";

    return pdo_query($sql);
}

function load_all_truyen_like()
{
    $sql = "SELECT name, cover_image as img, date,id from comic where 1 order by like_comic desc limit 0,5";
    $truyen_like = pdo_query($sql);
    return $truyen_like;
}

function comic_by_view()
{
    $sql = "SELECT 
    *,cover_image as iname
from comic
WHERE comic.status=2
ORDER BY `view` DESC LIMIT 0,6";
    return pdo_query($sql);
}
function detail_comic($id)
{
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

function comic_by_date($nummber1, $nummber2)
{
    $sql = "SELECT 
    *,
    cover_image as iname
    from comic

    WHERE comic.status=2
    ORDER BY id
    DESC ";
    if ($nummber1 >= 0 && $nummber2 > 0) {
        $sql .= " LIMIT $nummber1,$nummber2";
    } else {
        $sql .= " ";
    }

    return pdo_query($sql);
}
function select_name_comic()
{
    $sql = "SELECT id,name FROM comic";
    return pdo_query($sql);
}
function up_load_img($name, $id_chapter)
{
    $sql = "INSERT INTO images (name,id_chapter) VALUES ('$name',$id_chapter)";
    pdo_execute($sql);
}
function name_comic($id)
{
    $sql = "SELECT cover_image FROM comic where id = '$id'";
    $name = pdo_query_one($sql);
    return $name;
}
function img_comic($id, $id_chapter)
{
    $sql = "SELECT A.`name`,C.`name` as img, C.id as id_new,B.noi_dung FROM 
    comic A INNER JOIN chapter B on A.id = B.id_comic 
    INNER JOIN images C on B.id = C.id_chapter
    WHERE A.id = $id and B.number_chapter = $id_chapter order by C.name";
    $img_comic = pdo_query($sql);
    return $img_comic;
}
function img_comic_theo_id($id)
{
    $sql = "SELECT name FROM images WHERE comic_id = '$id'";
    $img_comic = pdo_query($sql);
    return $img_comic;
}

function delete_img_comic($id)
{
    $sql = "DELETE FROM images WHERE id = '$id'";
    $img_comic = pdo_query($sql);
    return $img_comic;
}
function select_id_chapter($id_comic)
{
    $sql = "SELECT B.id FROM comic A INNER JOIN chapter B ON A.id = B.id_comic 
    INNER JOIN images C ON B.id = C.id_chapter WHERE A.id = $id_comic";
    $id = pdo_query_one($sql);
    return $id;
}
function delete_comic_img($id_chapter)
{
    $sql = "DELETE FROM images where id_chapter = $id_chapter";
    return pdo_execute($sql);
}
function delete_comic_chapter($id_comic)
{
    $sql = "DELETE FROM chapter where id_comic = $id_comic";
    return pdo_execute($sql);
}
function delete_img_history($id)
{
    $sql = "DELETE FROM history_comic_user WHERE id_comic = '$id'";
    $img_comic = pdo_query($sql);
    return $img_comic;
}
function delete_img_love($id)
{
    $sql = "DELETE FROM love WHERE id_comic = '$id'";
    $img_comic = pdo_query($sql);
    return $img_comic;
}
function delete_img_comment($id)
{
    $sql = "DELETE FROM comment WHERE comic_id = '$id'";
    $img_comic = pdo_query($sql);
    return $img_comic;
}

// thong ke truyen 
function statistical_truyen()
{
    $sql = "SELECT 
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

function statistical_truyen_search($key)
{
    $sql = "SELECT 
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
    where 1";
    if ($key != "") {
        $sql .= " and category.name like '%" . $key . "%'";
    }

    $sql .= " GROUP BY category_id";
    return pdo_query($sql);
}
function update_status_yes($id)
{
    $sql = "UPDATE comic SET status	  = 2 where id = $id";
    pdo_execute($sql);
}

function update_status_again($id)
{
    $sql = "UPDATE comic SET status	  = 1 where id = $id";
    pdo_execute($sql);
}

//Truyện yêu thích
function check_love_comic($id_comic, $id_user)
{
    $sql = "SELECT * FROM love WHERE id_comic = '$id_comic' and id_user = '$id_user'";
    $check_love = pdo_query_one($sql);
    return $check_love;
}

function isert_comic($id_comic, $id_user)
{
    $sql = "INSERT INTO love (id_comic,id_user) VALUES ('$id_comic','$id_user')";
    pdo_execute($sql);
}

function delete_love_comic($id_comic, $id_user)
{
    $sql = "DELETE FROM love WHERE id_comic = '$id_comic' and id_user = '$id_user'";
    $img_comic = pdo_query($sql);
    return $img_comic;
}

function load_all_love_comic($id_user)
{
    $sql = "SELECT A.id,A.`name`,A.date,A.cover_image FROM comic A INNER JOIN love B ON A.id = B.id_comic WHERE B.id_user = '$id_user' order by B.id_comic asc";
    $love_comic = pdo_query($sql);
    return $love_comic;
}
//load truyện theo svip
function load_comic_svip()
{
    $sql = "SELECT * from comic where vip = 1 and status =2  ORDER BY id DESC LIMIT 0,6";
    return pdo_query($sql);
}
//chapter
function isert_chapter($number_chapter, $noi_dung, $id_comic, $date)
{
    $n = 'N';
    $sql = "INSERT INTO chapter (number_chapter,noi_dung,date,id_comic) VALUES ('$number_chapter',$n'$noi_dung',$n'$date','$id_comic')";
    $id = pdo_query_last_id($sql);
    return $id;
}
function count_chapter($id_comic)
{
    $sql = "SELECT COUNT(*) as sl,B.noi_dung
    FROM comic A INNER JOIN chapter B
    ON A.id = B.id_comic
    WHERE B.id_comic = $id_comic";
    $count = pdo_query_one($sql);
    return $count;
}
function load_all_chapter($id_comic)
{
    $sql = "SELECT B.number_chapter
    FROM comic A INNER JOIN chapter B
    ON A.id = B.id_comic
    WHERE B.id_comic = $id_comic";
    $chapter = pdo_query($sql);
    return $chapter;
}
function load_one_chapter($id, $id_chapter)
{
    $sql = "SELECT A.`name`,C.`name` as img, C.id as id_new,B.id as id_ch,B.noi_dung FROM 
    comic A INNER JOIN chapter B on A.id = B.id_comic 
    INNER JOIN images C on B.id = C.id_chapter
    WHERE A.id = $id and B.number_chapter = $id_chapter order by C.name";
    $img_comic = pdo_query_one($sql);
    return $img_comic;
}
function load_one_noi_dung_chapter($id, $id_chapter)
{
    $sql = "SELECT B.noi_dung, B.id as id_ch FROM 
    comic A INNER JOIN chapter B on A.id = B.id_comic 
    WHERE A.id = $id and B.number_chapter = $id_chapter order by B.number_chapter";
    $img_comic = pdo_query_one($sql);
    return $img_comic;
}
function update_chapter($noi_dung, $id)
{
    $sql = "UPDATE chapter SET noi_dung='$noi_dung' where id= $id";
    pdo_execute($sql);
}
function delete_chapter($id)
{
    $sql = "DELETE FROM chapter WHERE id = '$id'";
    $img_comic = pdo_query($sql);
    return $img_comic;
}
function select_limit_chapter($number_chapter, $id_comic, $number)
{
    $sql = "SELECT number_chapter FROM `chapter` WHERE id_comic = '$id_comic' LIMIT $number_chapter,$number";
    $number_chapter = pdo_query($sql);
    return $number_chapter;
}
function tru_chapter($number_chapter, $id)
{
    $sql = "UPDATE chapter SET number_chapter=number_chapter-1 where number_chapter= $number_chapter and id_comic = $id";
    $number_chapter = pdo_query($sql);
    return $number_chapter;
}
//client chapter
function client_chapter($id)
{
    $sql = "SELECT A.id as id_comic, B.*
    FROM comic A INNER JOIN chapter B ON A.id = B.id_comic
    WHERE A.id = $id";
    $chapter = pdo_query($sql);
    return $chapter;
}
//count chapter
function count_chapter_delete($id_comic){
    $sql = "SELECT count(number_chapter)
    FROM comic A INNER JOIN chapter B 
    ON A.id = B.id_comic
    WHERE B.id_comic =  $id_comic";
    $count = pdo_query_value($sql);
    return $count;
}
//delte_comic
function id_images_comic($id_comic)
{
    $sql = "SELECT C.id_chapter
    FROM comic A INNER JOIN chapter B ON A.id = B.id_comic 
    INNER JOIN images C ON B.id = C.id_chapter 
    WHERE A.id = $id_comic";
    $all = pdo_query($sql);
    return $all;
}
//load all svip
function all_svip(){
    $sql = "SELECT * FROM comic WHERE vip = 1";
    return pdo_query($sql);
}
//Count ảnh
function count_images($id_comic,$id_chapter){
    $sql = "SELECT count(C.name) FROM 
    comic A INNER JOIN chapter B on A.id = B.id_comic 
    INNER JOIN images C on B.id = C.id_chapter
    WHERE A.id = $id_comic and B.number_chapter = $id_chapter order by C.name";
    return pdo_query_value($sql);
}
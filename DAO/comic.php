<?php 

function comic_select_all(){
    $sql = "SELECT 
    c.*, 
    i.name as img_name,
    ca.name as ca_name
from comic c
join images i
on c.id = i.comic_id
join category ca
on c.id = ca.id
    ";

    return pdo_query($sql);
}
?>
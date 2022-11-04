<?php 
$sql = 'SELECT * FROM user';
include_once 'pdo.php';
$sq=pdo_query($sql);
echo '<pre>';
//đức
print_r($sq);
?>
<?php 
$sql = 'SELECT * FROM user';
include_once 'pdo.php';
$sq=pdo_query($sql);
echo '<pre>';
print_r($sq);
?>
<?php 
$sql = 'SELECT * FROM user';
include_once 'pdo.php';
$sq=pdo_query($sql);
print_r($sq);
?>
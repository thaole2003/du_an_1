<?php
/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection(){
    //hàm kết nối cơ sở dữ liệu

    $conn = new PDO(
    "mysql:host=202.92.5.49;dbname=fumpddnwhosting_duan1;charset=utf8",
    'fumpddnwhosting_duan1',
    '3eSKHX7pszLl',
    );
    return $conn;
}

function pdo_execute($sql){
    $connect = pdo_get_connection();
    $inputData = array_slice(func_get_args(), 1);
    $stmt = $connect->prepare($sql);
    $stmt->execute($inputData);
}

function pdo_query($sql){
    $connect = pdo_get_connection();
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function pdo_query_one($sql){
    $connect = pdo_get_connection();
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetch();
}
?>
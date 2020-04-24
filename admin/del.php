<?php
include '../inc/conn.php';
$id = $_GET['id'];
$sql = "delete from wish_content where id = '$id'";
$res = mysqli_query($link, $sql);

if ($res == true)
    
    echo "<script>alert('删除成功');location.href='article-list.php'; </script>";
else
    echo "<script>alert('失败');location.href='article-list.php' </script>";

?>
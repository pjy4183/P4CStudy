<?php
include 'sql_connection.php';
session_start();
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];
$userid = $_SESSION['userid'];
$sqlquery = "SELECT username FROM tb_user WHERE userid='$userid'";
$data = mysqli_query($conn, $sqlquery);
$result = mysqli_fetch_array($data);
$user = $result[0];

$file = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];

$folder = "./image/".$file_name;




if(move_uploaded_file($file, $folder))
{
    $sql = "INSERT INTO tb_board (category, title,description,user,file) VALUES('$category','$title','$description','$user','$file_name')";
    mysqli_query($conn,$sql);

}
else
{
    $sql = "INSERT INTO tb_board (category, title,description,user) VALUES('$category','$title','$description','$user')";
    mysqli_query($conn,$sql);

}

header('Location: /index.php');
?>
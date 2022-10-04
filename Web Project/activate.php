<?php
    
    include 'sql_connection.php';
    
    $token = $_GET['token'];


    $verified = '1';
    $sql = "UPDATE tb_user set verified='$verified' WHERE token = '$token'";

	mysqli_query($conn,$sql);


    header('Location: ./activate_success.php?');
?>
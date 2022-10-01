<?php
    include 'sql_connection.php';
    if (mysqli_connect_errno()) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $userid = $_POST['userid'];
    $pass = $_POST['userpw'];
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $encrypted_pass = password_hash($pass, PASSWORD_DEFAULT);
    $add_user = "INSERT INTO tb_user (userid, userpw, username, useremail) VALUES('$userid', '$pass', '$username', '$useremail')";
    mysqli_query($conn, $add_user);
    header('Location: regist_success.php')
?>
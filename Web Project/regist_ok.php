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
    $token = bin2hex(random_bytes(50)); //generate unique token
    $encrypted_pass = password_hash($pass, PASSWORD_DEFAULT);
    $add_user = "INSERT INTO tb_user (userid, userpw, username, useremail, token) VALUES('$userid', '$pass', '$username', '$useremail', '$token')";
    mysqli_query($conn, $add_user);
    $message = "Hi $username! Account created here is the activation link http://localhost/activate.php?token=$token";
    ini_set("SMTP", "aspmx.l.google.com");
    ini_set("sendmail_from", "test@gmail.com");    
    mail($useremail , 'Activate Account' , $message , 'From: test@gmail.com');
    header('Location: regist_success.php')
?>
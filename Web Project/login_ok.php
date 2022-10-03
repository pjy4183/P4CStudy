<?php
    
    include 'sql_connection.php';
    if (mysqli_connect_errno()) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $userid = $_POST['userid'];
    $pass = $_POST['userpw'];
    $sql = "SELECT * FROM tb_user WHERE userid='$userid' and userpw='$pass'";
    
    
    $data = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($data);

    session_start();
    
    

    if($result){
        if($result['verified']!=1){
            echo "<script>";
            echo "alert('Login Failed. 이메일 인증을 해주시기 바랍니다.');";
            echo "window.location = 'login.php';";
            echo "</script>";
        }else{
        $_SESSION['userid'] = $userid;
        header('Location: index.php');
        }
    }else{
        echo "<script>";
        echo "alert('Login Failed. 가입된 아이디가 아니거나 비밀번호가 틀립니다.');";
        echo "window.location = 'login.php';";
        echo "</script>";
    }
    
?>
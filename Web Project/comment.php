<?php
    
    include 'sql_connection.php';
    if (mysqli_connect_errno()) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    session_start();
    // $boardid = $_SESSION['id'];
    $boardid = $_POST['boardid'];
    $userid = $_SESSION['userid'];
    $sqlquery = "SELECT username FROM tb_user WHERE userid='$userid'";
    $data2 = mysqli_query($conn, $sqlquery);
    $result2 = mysqli_fetch_array($data2);
    $username = $result2[0];

    $comment = $_POST['comment'];
    $sql = "INSERT INTO tb_comment (boardid, username, comment) VALUES ('$boardid', '$username','$comment')";
    
    
    mysqli_query($conn, $sql);

    header("Location: ./detail.php?id=$boardid")
    
    
    
?>
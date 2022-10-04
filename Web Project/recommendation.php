<?php
    
    include 'sql_connection.php';
    
    session_start();
    $id = $_GET['id'];
    $userid = $_SESSION['userid'];

    $check_recom = "SELECT * FROM tb_recomm WHERE userid='$userid' and boardid='$id'";
    $data_recom = mysqli_query($conn,$check_recom);
    $result_recom = mysqli_fetch_array($data_recom);
    if($result_recom){
        $sql = "SELECT * FROM tb_board WHERE id='$id'";
        $data = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($data);

        $recommendation = $result['recommendation'] - 1;

        $sql2 = "UPDATE tb_board set recommendation='$recommendation' WHERE id = '$id'";

        mysqli_query($conn,$sql2);

        $recom_update = "DELETE FROM tb_recomm WHERE userid='$userid' and boardid='$id'";

        mysqli_query($conn,$recom_update);

        header('Location: /detail.php?id='.$result['id']);
    }else{
        $sql = "SELECT * FROM tb_board WHERE id='$id'";
        $data = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($data);

        $recommendation = $result['recommendation'] + 1;

        $sql2 = "UPDATE tb_board set recommendation='$recommendation' WHERE id = '$id'";

        mysqli_query($conn,$sql2);

        $recom_update = "INSERT INTO tb_recomm (userid, boardid) VALUES ('$userid', '$id');";

        mysqli_query($conn,$recom_update);

        header('Location: /detail.php?id='.$result['id']);
    }


?>

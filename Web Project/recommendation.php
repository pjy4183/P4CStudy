<?php
    
    include 'sql_connection.php';
    

    $id = $_GET['id'];

	$sql = "SELECT * FROM tb_board WHERE id='$id'";
	$data = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($data);

	$recommendation = $result['recommendation'] + 1;

	$sql2 = "UPDATE tb_board set recommendation='$recommendation' WHERE id = '$id'";

	mysqli_query($conn,$sql2);


    header('Location: /detail.php?id='.$result['id']);




?>

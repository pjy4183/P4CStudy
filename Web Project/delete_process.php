<?php
    require_once('view/top.php');



    $id = $_GET['id'];
    $sql = "DELETE FROM tb_board WHERE id=$id";
    $result = mysqli_query($conn, $sql);

?>

    
    <div style="text-align: center;">
        <h3>글이 성공적으로 삭제되었습니다.</h3>
        <a href="index.php">홈으로 가기</a>
    </div>


  </body>
</html>
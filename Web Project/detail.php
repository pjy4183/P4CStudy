<?php
    require_once('view/top.php');

    

    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_board WHERE id=$id";
    $data = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($data);
?>

<div style="text-align: center;">
    <div class="row">
            <h2><?=$result['title']?></h2>

        <hr />
            <div class="column" style="margin-right: 15px; margin-left: 8px; ">
                <h5>글쓴이: <?=$result['user']?></h5>
            </div>
            <div class="column" style="margin-right: 15px; margin-left: 8px; ">
                <h5>카테고리: <?=$result['category']?></h5>
            </div>
            <div class="column" style="margin-right: 15px; margin-left: 8px; ">
                <h5>조회: <?=$result['view']?></h5>
            </div>
            <div class="column"style="margin-right: 15px; margin-left: 8px; ">
                <h5>추천: <?=$result['recommendation']?></h5>
            </div>
            <div class="column-right" style="float:right; ">
                <h5><?=$result['date']?></h5>
            </div>

            
    </div>
    <hr>

    <div style="text-align: right;">
        <form action="recommendation.php?id=<?=$id?>" method="post">
            <input type="submit" value="추천">
        </form>
    </div>
    <?php
        if($result['file']){
            ?><img src="./image/<?=$result['file']?>" alt="Italian Trulli" width="800" height="auto"><?php
        }
    ?>
    <h4 style="text-align: left;"><?=$result['description']?></h4>
</div>

<div class="column-right" style="float:right;">
    <div class="column" style="margin-right: 15px; margin-left: 8px; ">
        <h5><a href="index.php">홈으로 가기</a></h5>
    </div>
    <div class="column" style="margin-right: 15px; margin-left: 8px; ">

            <?php


                $userid = $_SESSION['userid'];
                $sqlquery = "SELECT username FROM tb_user WHERE userid='$userid'";
                $data2 = mysqli_query($conn, $sqlquery);
                $result2 = mysqli_fetch_array($data2);
                $user = $result2[0];


                if($user==$result['user']){
                    ?><h5><a href="delete_process.php?id=<?=$id?>">글 삭제 하기</a></h5><?php
                }
            ?>

    </div>
</div>

<?php
    $id = $_GET['id'];
    if (!isset($_COOKIE['board_'.$id])){

        include 'sql_connection.php';
        $sql5 = "SELECT * FROM tb_board WHERE id='$id'";
        $data3 = mysqli_query($conn,$sql5);
        $result4 = mysqli_fetch_array($data3);

        $view = $result4['view'] + 1;
        $sqlquery2 = "UPDATE tb_board set view='$view' WHERE id = '$id'";


        mysqli_query($conn,$sqlquery2);
        $cookie_time = setcookie('board_'.$id, $id, time() + 60*60);
    }
    

?>



</body>
</html>
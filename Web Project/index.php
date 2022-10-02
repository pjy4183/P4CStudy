<?php
    require_once('view/top.php');
?>



    <!-- second row -->
    <div class="secondRow">
        <p>
            <form action="./#" method="GET">
                <select name="">
                    <option value="all">전체</option>
                    <option value="buy">사고</option>
                    <option value="sell">팔고</option>
                    <option value="title">제목</option>
                    <option value="content">내용</option>
                </select>
                <input type="text" name="search">
                <button>검색</button>
            </form>
        </p>
    </div>


    <!-- Board  -->
    <table style="text-align: center;">
		<tr>
			<th>번호</th>
			<th>제목</th>
			<th>작성자</th>
			<th>날짜</th>
			<th>조회수</th>
		</tr>
		<?php
			include "sql_connection.php";
			$sql = "SELECT * FROM tb_board order by id desc";
			$data = mysqli_query($conn,$sql);
			

			while($result = mysqli_fetch_array($data)) {
		?>
				<tr>
					<td> <?= $result['id']?> </td>
			   		<td><a href="detail.php?id=<?=$result['id']?>"><?= $result['title']?></a></td>
			   		<td><?=$result['user']?></td>
			   		<td><?= $result['date']?></td>
					<td><?= $result['view']?></td>
			   	</tr>
				
			   <?php
			}

		?>


	</table>

    <!-- 글쓰기 -->

    <?php
        include 'sql_connection.php';
        
        
        if(isset($_SESSION['userid'])){?>

            <a href="form.php" style="float:right; ">글쓰기</a>

    <?php } else {?>

            <a href="needLogin.php" style="float:right; ">글쓰기</a>

        <?php }?>







  </body>
</html>
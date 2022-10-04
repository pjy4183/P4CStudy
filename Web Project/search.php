<?php
    require_once('view/top.php');

    $category = $_GET['category'];
    $standard = $_GET['standard'];
    $search = $_GET['search'];
?>

    <!-- search row -->
    <div class="secondRow">
        <p>
            <form action="./search.php" method="GET">
                <select name="category">
                    <option value="all">전체</option>
                    <option value="buy">삽니다</option>
                    <option value="sell">팝니다</option>
                </select>
                <select name="standard">
                    <option value="title">제목</option>
                    <option value="description">내용</option>
                </select>
                <input type="text" name="search">
                <button>검색</button>
            </form>
        </p>
    </div>


    <!-- Board  -->
    <table id="board" style="text-align: center;">
		<tr>
			<th>번호</th>
			<th>제목</th>
			<th>작성자</th>
			<th>날짜</th>
			<th>조회수</th>
		</tr>
        <h3>Search Results: </h3>
		<?php
            include "sql_connection.php";

            if(($category=='all')){
                $sql = "SELECT * FROM tb_board WHERE $standard like '%$search%' ORDER BY id DESC";
            }else{
                $sql = "SELECT * FROM tb_board WHERE category='$category' and  $standard like '%$search%' ORDER BY id DESC";
            }


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
<?php
    require_once('view/top.php');
?>

    <form action="form_process.php" method="post" enctype="multipart/form-data">
      <p>카테고리:
        <select name="category">
          <option value="buy">삽니다</option>
          <option value="sell">팝니다</option>
        </select>
      </P>
      <p>제목:
        <input type="text" name="title" placeholder="Title">
      </p>
      <p>내용:
        <textarea rows="5" cols="100" name="description" placeholder="Description"></textarea>
      </p>
      <p>사진 업로드:
        <input name="file" type="file">
      </p>
      <p>
        <input type="submit">
      </p>
    </form>
  </body>
</html>
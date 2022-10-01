<?php
function print_title(){
  if(isset($_GET['id'])){
    echo $_GET['id'];
  } else {
    echo "Pre-Owned Shopping";
  }
}
function print_description(){
  if(isset($_GET['id'])){
    echo file_get_contents("data/".$_GET['id']);
  } else {
    echo "Hello, PHP";
  }
}
function print_list(){
  $list = scandir('./data');
  $i = 0;
  while($i < count($list)){
    if($list[$i] != '.') {
      if($list[$i] != '..') {
        echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
      }
    }
    $i = $i + 1;
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" >
    <link rel="stylesheet" href="css/style.css">
    <title>
      <?php
      print_title();
      ?>
    </title>
  </head>
  <body>
    
    <!-- first row -->
    <div class="topnav">
    <div class="row">
        <a href="index.php">
            <div class="row">
                <h3>Pre-Owned Shopping</h3>
            </div>
            <!-- <div class="row">
                중고 쇼핑몰에서 사고 팔기
            </div> -->
        </a>
        <a href="#Buy">BUY</a>
        <a href="#Sell">SELL</a>


        <div class="topnav-right">
            <div class="dropdown">
                <?php
                    include 'sql_connection.php';
                    session_start();
                    
                    if(isset($_SESSION['userid'])){
                        $user = $_SESSION['userid'];
                        $sql = "SELECT username FROM tb_user WHERE userid='$user'";
                        $data = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_array($data);?>
                        <button class="dropbtn">Welcome <?php echo $result[0]; ?>
                        <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                        <a href="logout.php">Logout</a>
                    <?php
                    } else {?>
                        <button class="dropbtn">Login/SignUp
                        <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                        <a href="login.php">Login</a>
                        <a href="register.php">SignUp</a><?php
                    }?>
                
                </div>
            </div> 
        </div>


    </div>
    </div>
    <div class="top_bar"></div>



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





    <a href="form.php">글쓰기</a>
    <?php if(isset($_GET['id'])) { ?>
      <a href="update.php?id=<?=$_GET['id']?>">update</a>
      <form action="delete_process.php" method="post">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <input type="submit" value="delete">
      </form>
    <?php } ?>



    <!-- <h2>
      <?php
      print_title();
      ?>
    </h2>
    <?php
    print_description();
     ?> -->



  </body>
</html>
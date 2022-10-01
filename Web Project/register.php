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
                <button class="dropbtn">Login/SignUp 
                <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                <a href="login.php">Login</a>
                <a href="register.php">SignUp</a>
                </div>
            </div> 
        </div>
    </div>
    </div>
    <div class="top_bar"></div>

    <div id="regist_wrap" class="wrap" style="text-align: center;">
        <div>
            <h1>Regist Form</h1>
            <form action="regist_ok.php" method="post" name="regiform" id="regist_form" class="form" onsubmit="return sendit()">
                <p><input type="text" name="userid" id="userid" placeholder="ID"><input type="button" id="checkIdBtn" value="check" onclick="checkUserid()"></p>
                <p id="result">&nbsp;</p>
                <p><input type="password" name="userpw" id="userpw" placeholder="Password"></p>
                <p><input type="password" name="userpw_ch" id="userpw_ch" placeholder="Password Check"></p>
                <p><input type="text" name="username" id="username" placeholder="Username"></p>
                
                <p><input type="text" name="useremail" id="useremail" placeholder="E-mail"></p>
                <p><input type="submit" value="Sin Up" class="signup_btn"></p>
                <p class="pre_btn">Do you already have your account? <a href="login.php">Login.</a></p>
            </form>
        </div>
        <br><br><br>
    </div>


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


    <script src="./js/regist.js"></script>
  </body>
  
</html>
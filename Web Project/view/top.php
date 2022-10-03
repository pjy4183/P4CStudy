<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" >
    <link rel="stylesheet" href="css/style.css">
    <title>

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
        <!-- <a href="#Buy">BUY</a>
        <a href="#Sell">SELL</a> -->


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

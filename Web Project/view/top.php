<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" >
    <link rel="stylesheet" href="css/style.css">
    <style>
        
button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    /* padding: 20px; */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    /* margin: 4px 2px; */
    cursor: pointer;
    border-radius: 8px;
  }
    body {
    background-color: #7FCDCD;
    }
    #board {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #board td, #board th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  #board tr:nth-child(even){background-color: #f2f2f2;}
  
  #board tr:hover {background-color: #ddd;}
  
  #board th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }
  input[type=text], input[type=password], select, textarea {
  width: 210px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 20px;
  transition: width 0.4s ease-in-out;
}

/* input[type=text]:focus {
  width: 100%;
} */
  /* input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
} */

input[type=submit],input[type=button] {

  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
    </style>
  </head>
  <body>
    <!-- first row -->
    <div class="topnav">
    <div class="row">
        <a href="index.php">
            <div class="row">
                <h3>Pre-Owned Shopping</h3>
            </div>
            <div class="row">
               <div style="font-size: 10x;">중고 쇼핑몰</div>
            </div>
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

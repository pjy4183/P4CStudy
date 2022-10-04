<?php
    require_once('view/top.php');
?>

    <div id="regist_wrap" class="wrap" style="text-align: center;">
        <div>
            <h1>Regist Form</h1>
            <form action="regist_ok.php" method="post" name="regiform" id="regist_form" class="form" onsubmit="return sendit()">
                <p><input type="text" name="userid" id="userid" placeholder="ID"><input type="button" id="checkIdBtn" value="check" onclick="checkUserid()" style="
    margin-left: 10px;
    margin-right: 10px;
"></p>
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




    <script src="./js/regist.js"></script>
  </body>
  
</html>
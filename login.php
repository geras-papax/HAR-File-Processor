<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>HAR Processor</title>
    <link href="login.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <section class="forms-section">
    <link rel="stylesheet" href="login.css">
    <h1 class="section-title">HAR Processor</h1>
    <div class="forms">
      <div class="form-wrapper is-active">
        <button type="button" class="switcher switcher-login">
          Login
          <span class="underline"></span>
        </button>
        <form class="form form-login" method="POST" action="">
          <fieldset>
            <div class="input-block">
              <label for="login-email">E-mail</label>
              <input name= "login-email" id="login-email" type="email" required>
            </div>
            <div class="input-block">
              <label for="login-password">Password</label>
              <input name= "login-password" id="login-password" type="password" required>
              <div class="showLog" onclick="showLog()">SHOW</div>
            </div>
          </fieldset>
          <button id="log-in-btn" type="submit" class="btn-login">Login</button>
        </form>
      </div>
      <div class="form-wrapper">
        <button type="button" class="switcher switcher-signup">
          Sign Up
          <span class="underline"></span>
        </button>
        <form class="form form-signup" method="POST" action="signup.php">
          <fieldset>
            <div class="input-block">
              <label for="signup-email">E-mail</label>
              <input name= "signup-email" id="signup-email" type="email" required>
            </div>
            <div class="input-block">
              <label for="signup-username">Username</label>
              <input name= "signup-username" id="signup-username" type="text" required>
            </div>
            <div class="input-block">
              <label for="signup-password">Password</label>
              <!-- for checking the password requirments minlen=8, at least 1 number(\d), 1 symbol(\W), 1 uppercase letter([A-Z])--> 
              <input name= "signup-password" id="signup-password" type="password" minlength=8 maxlength=20 pattern="(?=.*\d)(?=.)(?=.*\W)(?=.*[A-Z]).*"
              title = 'Length: 8 - 20 & 1 uppercase letter & 1 number & 1 symbol.'
              required>
            </div>
            <div class="input-block">
              <label for="signup-password-confirm">Confirm password</label>
              <input id="signup-password-confirm" type="password" required>
              <div class="showReg" onclick="showReg()">SHOW</div>
            </div>
          </fieldset>
          <button id="sign-up-btn" type="submit" class="btn-signup">Continue</button>
        </form>
      </div>
    </div>
   </section>
    <script src="login.js"></script>
  </body>
</html>
<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'pao134ever');
   define('DB_DATABASE', 'har-processor');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      // login email and password sent from form  
      $myusername = mysqli_real_escape_string($db,$_POST['login-email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['login-password']);
      // register fields
      if(isset($_POST['signup-email']) && isset($_POST['signup-password']) && isset($_POST['signup-username'])){
        $_SESSION['email']= mysqli_real_escape_string($db,$_POST['signup-email']);
        $_SESSION['password']= mysqli_real_escape_string($db,$_POST['signup-password']);
        $_SESSION['username']= mysqli_real_escape_string($db,$_POST['signup-username']);
      }
      //sql query to database for the login 
      $sql = "SELECT username,role   
      FROM users 
      WHERE email = '$myusername' and passwrd = '$mypassword'";

      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
     
      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         $_SESSION['login_user'] = $row["username"];
         $_SESSION['login_email'] = $myusername;
         if($row["role"]=="admin"){
           header("location: admin/admin_session.php");
         } else {
           header("location: user/welcome.php");
         }
      }elseif ($count == 0 && $myusername != '') {
        echo '<script>alert("Invalid email or password. Please try again")</script>';
      }
   }
?>
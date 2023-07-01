<?php 
include "./../dbconfig.php";

$errmsg = "";

if(isset($_POST['submit'])) {
  $opwd = mysqli_real_escape_string($conn,$_POST['opwd']);
  $npwd = mysqli_real_escape_string($conn,$_POST['npwd']);
  $cnpwd = mysqli_real_escape_string($conn,$_POST['cnpwd']);
  session_start();
  $userid = $_SESSION['userid'];

  if($opwd!="" ||$npwd!="" || $cnpwd!="") {
    $query = "SELECT password as pwdhash FROM users WHERE id='$userid';";
    $result = mysqli_query($conn,$query);
    $rows = mysqli_fetch_array($result);

    if(password_verify($opwd,$rows['pwdhash'])) {
      if($npwd==$cnpwd) {
        $pwdhash = password_hash($npwd,PASSWORD_BCRYPT);
        $query = "UPDATE users SET password='$pwdhash' WHERE id='$userid'";
        $result = mysqli_query($conn,$query);
        if($result==1) {
          header("Location:./login.php");
        }
        else {
          $errmsg = "Password could not be changed. Try again.";
        }
      }
      else {
        $errmsg = "New passwords entered did not match";
      }
    }
    else {
      $errmsg = "Old password did not match";
    }
  }
  else {
    $errmsg = "All fields are mandatory";
  }
}
?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Simple Change Password Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      -webkit-font-smoothing: antialiased;
    }

    body {
      background: #e35869;
      font-family: 'Rubik', sans-serif;
    }

    .changepwd-form {
      background: #fff;
      width: 500px;
      margin: 125px auto;
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
              flex-direction: column;
      border-radius: 4px;
      box-shadow: 0 2px 25px rgba(0, 0, 0, 0.2);
    }
    .changepwd-form h1 {
      padding: 35px 35px 0 35px;
      font-weight: 300;
    }
    .changepwd-form .content {
      padding: 35px;
      text-align: center;
    }
    .changepwd-form .input-field {
      padding: 12px 5px;
    }
    .changepwd-form .input-field input {
      font-size: 16px;
      display: block;
      font-family: 'Rubik', sans-serif;
      width: 100%;
      padding: 10px 1px;
      border: 0;
      border-bottom: 1px solid #747474;
      outline: none;
      -webkit-transition: all .2s;
      transition: all .2s;
    }
    .changepwd-form .input-field input::-webkit-input-placeholder {
      text-transform: uppercase;
    }
    .changepwd-form .input-field input::-moz-placeholder {
      text-transform: uppercase;
    }
    .changepwd-form .input-field input:-ms-input-placeholder {
      text-transform: uppercase;
    }
    .changepwd-form .input-field input::-ms-input-placeholder {
      text-transform: uppercase;
    }
    .changepwd-form .input-field input::placeholder {
      text-transform: uppercase;
    }
    .changepwd-form .input-field input:focus {
      border-color: #222;
    }
    .changepwd-form button.link {
      text-decoration: none;
      background-color: lightgray;
      padding:5px 10px;
      border: none;
      color: #747474;
      letter-spacing: 0.2px;
      text-transform: uppercase;
      display: inline-block;
      margin-top: 20px;
    }
    .changepwd-form .action {
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: horizontal;
      -webkit-box-direction: normal;
              flex-direction: row;
    }
    .changepwd-form .action button {
      width: 100%;
      border: none;
      padding: 18px;
      font-family: 'Rubik', sans-serif;
      cursor: pointer;
      text-transform: uppercase;
      background: #e8e9ec;
      color: #777;
      border-bottom-left-radius: 4px;
      border-bottom-right-radius: 0;
      letter-spacing: 0.2px;
      outline: 0;
      -webkit-transition: all .3s;
      transition: all .3s;
    }
    .changepwd-form .action button:hover {
      background: #d8d8d8;
    }
    .changepwd-form .action button:nth-child(1) {
      background: #2d3b55;
      color: #fff;
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 4px;
    }
    .changepwd-form .action button:nth-child(1):hover {
      background: #3c4d6d;
    }
    .changepwd-form .error {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>
<div class="changepwd-form">
  <form method="post" action=""> 
    <h1>Change Password</h1>
    <div class="content">
      <div class="input-field">
        <input type="password" placeholder="Old Password" name="opwd" cautocomplete="new-password" required>
      </div>
      <div class="input-field">
        <input type="password" placeholder="New Password" name="npwd" cautocomplete="new-password" required>
      </div>
      <div class="input-field">
        <input type="password" placeholder="Confirm New Password" name="cnpwd" cautocomplete="new-password" required>
      </div>
      <p class="error"><?php echo $errmsg ?></p>
      <button type="submit" name="submit" value="changepwd" class="link">SUBMIT</button><br>
      <a href="#" class="link">Forgot Your Password?</a>
    </div>
    <div class="action">
      <button>Sign in</button>
      <button>Register</button>
    </div>
  </form>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>  
    <div id="slider">
        <div class="text-content">
            <div class="text-heading">
              <form method="POST" action="Login.php">
              <h2>Login💡</h2>
              <div class="input-box">
                <i></i>
                <input name="account" type="text" placeholder="Nhập username">
              </div>
                <div class="input-box">
                  <i></i>
                <input name= "password" type="password" placeholder="Nhập mật khẩu">
                </div>
                <div class="g-recaptcha" data-sitekey="6LffFXAcAAAAAJ5rJZyGnrzfK7gBvJSoVy2Jb06Z" style="margin-top: 15px; margin-left: 120px;"></div>
                <div>
                <button class="btn-box" name="sign-in">Đăng nhập</button>
              </div>
              </form>
              <?php
              session_start();
              include('config.php');
              ?>
</body>
</html>
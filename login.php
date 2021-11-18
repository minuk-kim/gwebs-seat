<?php
  include './include/inc_head.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="./common/fonts/pretendard-subset.css">
  <link rel="stylesheet" href="./common/css/stylesheet.css">
  <link rel="stylesheet" href="./common/css/login.css">
  <title>로그인 | Greenweb Service</title>
</head>
<body>
  <?php
    if($jb_login) {
      echo("
      <script>
      location.href = 'index.php';
      </script>
      ");
    } else {
  ?>
  <div class="login">
    <form method="post" action="login_check.php" id="loginform" class="form-vertical">
      <div class="login__title"><h1><span style="color:#41b40a; font-weight: bold;">Greenweb</span>&nbsp;Service</h1><span style="font-weight: bold; font-size: 25px;">좌석관리 시스템</span></div>
      <div class="login__control">
        <div class="login__items">
          <div class="login__input-box login__input-id">
            <span class="material-icons">person_outline</span><input name="adminEmployee" class="login__input-inner-box" type="text" placeholder="사번">
          </div>
          <div class="login__input-box login__input-pw">
            <span class="material-icons">lock_open</span><input name="adminPW" class="login__input-inner-box" type="password" placeholder="비밀번호">
          </div>
          <div id="loginBtnBox">
            <span><input type="submit" class="btn_login_action" value="로그인"></span>
          </div>
        </div>
      </div>
    </form>
  </div>
  <?php
    }
  ?>
</body>
</html>
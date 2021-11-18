<!DOCTYPE html>
<?php
  include './include/inc_head.php';
  if($jb_login) {
    $userEmployee=$_SESSION["adminEmployee"];
    $userName=$_SESSION["adminName"];
    $userLevel=$_SESSION["adminLevel"];
    $userPosition=$_SESSION["adminPosition"];
    $userConcurrent=$_SESSION["adminConcurrent"];
    $userTeam=$_SESSION["adminTeam"];
    $userDepartment=$_SESSION["adminDepartment"];
    $userDepartment2=$_SESSION["adminDepartment2"];
  } else {
    echo("
    <script>
    location.href = 'login.php';
    </script>
    ");
  }
?>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="./common/fonts/pretendard-subset.css">
  <link rel="stylesheet" href="./common/css/layout.css">
  <link rel="stylesheet" href="./common/css/base.css">
  <link rel="stylesheet" href="./common/css/main.css">
  <link rel="stylesheet" href="./common/css/seat.css">
  <link rel="stylesheet" href="./common/css/jquery-ui.css">
  <script src="./common/js/jquery-3.6.0.js"></script>
  <script src="./common/js/jquery-ui.js"></script>
  <script src="./common/js/gw-srms.js"></script>
  <title>좌석 관리 | Greenweb Service</title>
</head>

<body>
  <div class="grid-container">
    <header class="container-header">
      <div class="header__title">
        <span class="title-text">Greeweb</span>
        <span class="title-text">Service</span>
        <span class="title-text">좌석 관리 시스템</span>
      </div>
      <div class="header__user-icons">
        <div class="user-icons__item user-icons__first">
          <span class="material-icons">account_circle</span>
          <a class="link" href="#"><?php echo "$userName"?></a>
        </div>
        <div class="user-icons__item">
          <span class="material-icons">logout</span>
          <a class="link" href="logout.php">로그아웃</a>
        </div>
      </div>
    </header>

    <nav class="container-nav">
      <div class="nav__navbar">
        <div class="navbar__item navbar__first">
          <span class="material-icons">event_seat</span>
          <a class="link" href="#">좌석 배정</a>
        </div>
        <div class="navbar__item">
        <span class="material-icons">computer</span>
          <a class="link" href="./DML/seat/seat_insert_list_form.php">좌석 관리</a>
        </div>
        <div class="navbar__item">
          <span class="material-icons">people</span>
          <a class="link" href="./DML/member/member_insert_list_form.php">인원 관리</a>
        </div>
        <div class="navbar__item">
          <span class="material-icons">history</span>
          <a class="link" href="./DML/history/booking_histroy_list_form.php">변경 이력</a>
        </div>
        <?php
          if($userLevel=="S") {
            echo '<div class="navbar__item">
              <span class="material-icons">admin_panel_settings</span>
              <a class="link" href="./DML/member/admin_member_insert_form.php">관리자</a>
            </div>';
          }
        ?>
        
      </div>
      <div class="nav__location">
        <div class="location__item">
          <span class="material-icons">house</span>
          <a class="link" href="#">Home</a>
        </div>
      </div>
    </nav>
    <!-- 
    <aside class="container-side">side</aside>
    -->
    <main class="container-main">
    <section class="main__header main-header__title">
        좌석 배정 현황
      </section>
      <hr>
      <article class="main__content">
        <div class="content__seat-Container">
          <div class="seat-frame">
            <!-- 1~4번째 까지 회의실 및 부스 -->
            <div class="frame__item"></div>
            <div class="frame__item"></div>
            <div class="frame__item"></div>
            <div class="frame__item"></div>
            <!-- 5번~12번 경영지원팀 -->
            <div class="frame__item"></div>
            <!-- 6번~9번 경영지원팀 col -->
            <div class="frame__item"></div>
            <div class="frame__item"></div>
            <div class="frame__item"></div>
            <div class="frame__item"></div>
            <!-- 10번~13번 경영지원팀 col -->
            <div class="frame__item"></div>
            <div class="frame__item"></div>
            <div class="frame__item"></div>
            <div class="frame__item"></div>
            <!-- 14번 경영지원팀 복도 -->
            <div class="frame__item"></div>
            <!-- 14번~15번 실제 좌석 구역 박스 -->
            <div class="frame__item"></div>
            <div class="frame__item"></div>

            <div class="frame__item"></div>
            <div class="frame__item"></div>
          </div>
        </div>

        <div class="index-header__container-stats">
          <div class="container-stats__box">
            <div class="stats-cell">총좌석</div>
            <div class="stats-cell">4</div>
          </div>
          <div class="container-stats__box">
            <div class="stats-cell">잔여좌석</div>
            <div class="stats-cell">1</div>
          </div>
          <div class="container-stats__box">
            <div class="stats-cell">배정중</div>
            <div class="stats-cell">2</div>
          </div>
          <div class="container-stats__box">
            <div class="stats-cell">미사용</div>
            <div class="stats-cell">3</div>
          </div>
        </div>
      </article>
    </main>
  </div>
</body>

</html>
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

        <div class="content__header-Container">
          <div class="date-control" id="dateControl">
            <button id="btnDatePrev" class="border-btn btn__date-style"><span class="material-icons">keyboard_arrow_left</span></button>
            <input type="text" id="btnCalendar" class="border-btn btn__date-style" readonly="readonly" name="dateBox" />
            <button id="btnDateNext" class="border-btn btn__date-style"><span class="material-icons">keyboard_arrow_right</span></button>
            <button id="btnTodaySelect" class="border-btn btn__date-style">오늘</button>
          </div>
          <ul class="legend-list">
            <li class="legend__blank"><span class="material-icons">square</span>공석</li>&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="legend__allocation"><span class="material-icons">square</span>배정가능</li>&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="legend__popular"><span class="material-icons">square</span>대중문화운영팀</li>&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="legend__1team"><span class="material-icons">square</span>네이버운영지원1팀</li>&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="legend__2team"><span class="material-icons">square</span>네이버운영지원2팀</li>&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="legend__ugc"><span class="material-icons">square</span>UGC모니터링팀</li>&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="legend__ai"><span class="material-icons">square</span>AI학습지원센터</li>
          </ul>
        </div>
      
        <div class="content__seat-Container">
          <div class="seat-frame">
            <!-- 좌석 1구역 -->
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item item__allocation"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item item__popular"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item item__1team"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item item__2team"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item item__ugc"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item item__ai"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item item__ai"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item item__ai"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <!-- 좌석 2구역 -->
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>  
            <!-- 좌석 3구역 -->
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <!-- 좌석 4구역 -->
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__pillar"></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <!-- 좌석 5구역 -->
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__pillar"></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__pillar"></div></div>
              <div class="frame__seat"><div class="frame__pillar"></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__pillar"></div></div>
            </div>
            <!-- 좌석 6구역 -->
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__pillar"></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <!-- 좌석 7구역 -->
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <!-- 좌석 8구역 -->
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat-vip"><div class="frame__item-vip"></div></div>
              <div class="frame__seat-vip"><div class="frame__item-vip"></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat-vip"><div class="frame__item-vip"></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <div class="frame__two-cell">
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
              <div class="frame__seat"><div class="frame__item"><div class="seat__num">469</div><div class="seat__name">김민욱</div></div></div>
            </div>
            <!-- 백그라운드 영역 -->
            <div class="frame__four-cell">
              <div class="frame__support-seat"></div>
              <div class="frame__support-seat"></div>
              <div class="frame__support-seat"></div>
              <div class="frame__support-seat"></div>
            </div>
            <div class="frame__four-cell">
              <div class="frame__support-seat"></div>
              <div class="frame__support-seat"></div>
              <div class="frame__support-seat"></div>
              <div class="frame__support-seat"></div>
            </div>
            <div class="frame__col-two-cell">
              <div class="frame__support-seat"></div>
              <div class="frame__support-seat"></div>
            </div>
            <div class="meeting-room__15-7">
              <div class="meeting-room__door"></div>
            </div>
            <div class="meeting-room__vip">
              <div class="meeting-room__door"></div>
            </div>
            <div class="meeting-room__15-6">
              <div class="meeting-room__door"></div>
            </div>
            <div class="meeting-room__booth"></div>
            <div class="frame__out-pillar"></div>
          </div>


        </div>

      </article>
    </main>
  </div>
</body>

</html>
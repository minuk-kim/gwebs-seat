<!DOCTYPE html>
<?php
  include '../../include/inc_head.php';
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
    location.href = '../../login.php';
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
  <link rel="stylesheet" href="../../common/fonts/pretendard-subset.css">
  <link rel="stylesheet" href="../../common/css/stylesheet.css">
  <link rel="stylesheet" href="../../common/css/jquery-ui.css">
  <script src="../../common/js/jquery-3.6.0.js"></script>
  <script src="../../common/js/jquery-ui.js"></script>
  <script src="../../common/js/module.js"></script>
  <title>좌석 배정 | Greenweb Service</title>
</head>
<body>
  <!-- 로딩 페이지 -->
  <div id="lodingWrap">
    <div class="sk-cube-grid">
      <div class="sk-cube sk-cube1"></div>
      <div class="sk-cube sk-cube2"></div>
      <div class="sk-cube sk-cube3"></div>
      <div class="sk-cube sk-cube4"></div>
      <div class="sk-cube sk-cube5"></div>
      <div class="sk-cube sk-cube6"></div>
      <div class="sk-cube sk-cube7"></div>
      <div class="sk-cube sk-cube8"></div>
      <div class="sk-cube sk-cube9"></div>
    </div>
  </div>
  <!-- 헤더 header -->
  <header class="header">
    <div class="header__title">
      <span style="color:#41b40a">Greeweb</span><span>&nbsp;Service</span><span class="header__sub-title">좌석 관리 시스템</span>
    </div>
    <div class="header__user-icons">
      <ul>
        <li><a href="#"><span class="material-icons">account_circle</span><?php echo "$userName"?></a></lilass=>
        <li><a href="../../logout.php"><span class="material-icons">logout</span>로그아웃</a></liclass=>
      </ul>
    </div>
    <!-- 하단 메뉴바 navbar -->
    <nav class="navbar">
      <div class="navbar__items">
        <ul>
          <li><a href="../../index.php"><span class="material-icons">house</span>Home</a></li>
          <li><a href="../../DML/seat/seat_booking_form.php"><span class="material-icons">event_seat</span>좌석 배정</a></li>
          <li><a href="../../DML/seat/seat_insert_list_form.php"><span class="material-icons">computer</span>좌석 관리</a></li>
          <li><a href="../../DML/member/member_insert_list_form.php"><span class="material-icons">people</span>인원 관리</a></li>
          <li><a href="../../DML/history/booking_histroy_list_form.php"><span class="material-icons">history</span>변경 이력</a></li>
          <?php
            if($userLevel=="S") {
              echo '<li><a href="../../DML/member/admin_member_insert_form.php"><span class="material-icons">admin_panel_settings</span>관리자</a></li>';
            }
          ?>
        </ul>
      </div>
    </nav>
    <!-- 현재 메뉴 위치 표시바 -->
    <div class="location">
      <div class="location__items"> <a href="#" title="홈으로"><span class="material-icons">house</span>Home</a></div>
    </div>
  </header>

  <section class="content">
    <div class="content__title"><span>좌석 배치</span></div>
    <div class="seat-content__container">
      <aside class="side-list">
        <div class="side_list_contnet">
          리스트 영역
        </div>
      </aside>
      <div id="seatBoxGroup" class="booking-seat-group">
        <!-- 세부 좌석 현황 -->
        <div class="seat-plan">
          <div class="seat-plan__container">
            <div class="background">
              <div class="background__15-7 box-item">15-7
                <div class="background__15-7-door box-item"></div>
              </div>
        
              <div class="background__hr">
                <ul class="background-hr__col01">
                  <li class="partition_top_rightDot"></li>
                  <li class="partition_bottom_rightDot"></li>
                  <li class="partition_top_rightDot"></li>
                  <li class="partition_bottom_rightDot"></li>
                </ul>
                <ul class="background-hr__col02">
                  <li class="partition_top_leftDot"></li>
                  <li class="partition_bottom_leftDot"></li>
                  <li class="partition_top_leftDot"></li>
                  <li class="partition_bottom_leftDot"></li>
                </ul>
              </div>
              <div class="background-hr__each01"></div>
              <div class="background-hr__each02"></div>
              <div class="background__vip box-item" style="width: 102px; height: 100px;">VIP
                <div class="background__vip-door box-item"></div>
              </div>
              <div class="background__15-6 box-item" style="width: 68px; height: 100px;">15-6
                <div class="background__15-6-door box-item"></div>
              </div>
              <div class="background__booth box-item" style="width: 139px; height: 68px;">방음부스</div>
            </div>
            <div class="seat-group">
              <ul class="seat-group__row01">
                <li class="partition_right_bottomDot"><div id="488" data-tooltip-text="488" class="seat">김민욱</div></li>
                <li class="partition_left_bottomDot"><div id="475" data-tooltip-text="475" class="seat">김민욱</div></li>
                <li class="partition_right_bottomDot"><div id="474" data-tooltip-text="474" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="461" data-tooltip-text="461" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="460" data-tooltip-text="460" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="448" data-tooltip-text="448" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="447" data-tooltip-text="447" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="434" data-tooltip-text="434" class="seat"></div></li>
                <li class="empty_space"></li>
                <li class="partition_right_bottomDot"><div id="424" data-tooltip-text="424" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="423" data-tooltip-text="423" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="410" data-tooltip-text="410" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="409" data-tooltip-text="409" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="397" data-tooltip-text="397" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="396" data-tooltip-text="396" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="385" data-tooltip-text="385" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="384" data-tooltip-text="384" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="372" data-tooltip-text="372" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="371" data-tooltip-text="371" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="359" data-tooltip-text="359" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="358" data-tooltip-text="358" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="345" data-tooltip-text="345" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="344" data-tooltip-text="344" class="seat"></div></li>
                <li class="empty_space"></li>
                <li class="partition_right_bottomDot"><div id="335" data-tooltip-text="335" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="322" data-tooltip-text="322" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="321" data-tooltip-text="321" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="309" data-tooltip-text="309" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="308" data-tooltip-text="308" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="295" data-tooltip-text="295" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="294" data-tooltip-text="294" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="281" data-tooltip-text="281" class="seat"></div></li>
              </ul>
              <ul class="seat-group__row02">
                <li class="partition_right_topDot"><div id="487" data-tooltip-text="487" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="476" data-tooltip-text="476" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="473" data-tooltip-text="473" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="462" data-tooltip-text="462" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="459" data-tooltip-text="459" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="449" data-tooltip-text="449" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="446" data-tooltip-text="446" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="435" data-tooltip-text="435" class="seat"></div></li>
                <li class="empty_space"></li>
                <li class="partition_right_topDot"><div id="425" data-tooltip-text="425" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="422" data-tooltip-text="422" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="411" data-tooltip-text="411" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="408" data-tooltip-text="408" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="398" data-tooltip-text="398" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="395" data-tooltip-text="395" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="386" data-tooltip-text="386" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="383" data-tooltip-text="383" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="373" data-tooltip-text="373" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="370" data-tooltip-text="370" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="360" data-tooltip-text="360" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="357" data-tooltip-text="357" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="346" data-tooltip-text="346" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="343" data-tooltip-text="343" class="seat"></div></li>
                <li class="empty_space"></li>
                <li class="partition_right_topDot"><div id="334" data-tooltip-text="334" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="323" data-tooltip-text="323" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="320" data-tooltip-text="320" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="310" data-tooltip-text="310" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="307" data-tooltip-text="307" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="296" data-tooltip-text="296" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="293" data-tooltip-text="293" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="282" data-tooltip-text="282" class="seat"></div></li>
              </ul>
              <ul class="seat-group__row03">
                <li class="partition_right_bottomDot"><div id="486" data-tooltip-text="486" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="477" data-tooltip-text="477" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="472" data-tooltip-text="472" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="463" data-tooltip-text="463" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="458" data-tooltip-text="458" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="450" data-tooltip-text="450" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="445" data-tooltip-text="445" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="436" data-tooltip-text="436" class="seat"></div></li>
                <li class="empty_space"></li>
                <li class="partition_right_bottomDot"><div id="426" data-tooltip-text="426" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="421" data-tooltip-text="421" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="412" data-tooltip-text="412" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="407" data-tooltip-text="407" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="399" data-tooltip-text="399" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="394" data-tooltip-text="394" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="387" data-tooltip-text="387" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="382" data-tooltip-text="382" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="374" data-tooltip-text="374" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="369" data-tooltip-text="369" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="361" data-tooltip-text="361" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="356" data-tooltip-text="356" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="347" data-tooltip-text="347" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="342" data-tooltip-text="342" class="seat"></div></li>
                <li class="empty_space"></li>
                <li class="partition_right_bottomDot"><div id="333" data-tooltip-text="333" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="324" data-tooltip-text="324" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="319" data-tooltip-text="319" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="311" data-tooltip-text="311" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="306" data-tooltip-text="306" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="297" data-tooltip-text="297" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="292" data-tooltip-text="292" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="283" data-tooltip-text="283" class="seat"></div></li>
              </ul>
              <ul class="seat-group__row04">
                <li class="partition_right_topDot"><div id="485" data-tooltip-text="485" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="478" data-tooltip-text="478" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="471" data-tooltip-text="471" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="464" data-tooltip-text="464" class="seat"></div></li>
                <li class="pillar"></li>
                <li class="partition_left_topdot"><div id="451" data-tooltip-text="451" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="444" data-tooltip-text="444" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="437" data-tooltip-text="437" class="seat"></div></li>
                <li class="empty_space"></li>
                <li class="partition_right_topDot"><div id="427" data-tooltip-text="427" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="420" data-tooltip-text="420" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="413" data-tooltip-text="413" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="406" data-tooltip-text="406" class="seat"></div></li>
                <li class="pillar"></li>
                <li class="partition_left_topdot"><div id="393" data-tooltip-text="393" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="388" data-tooltip-text="388" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="381" data-tooltip-text="381" class="seat"></div></li>
                <li class="pillar"></li>
                <li class="pillar"></li>
                <li class="partition_right_topDot"><div id="362" data-tooltip-text="362" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="355" data-tooltip-text="355" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="348" data-tooltip-text="348" class="seat"></div></li>
                <li class="pillar"></li>
                <li class="empty_space"></li>
                <li class="partition_right_topDot"><div id="332" data-tooltip-text="332" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="325" data-tooltip-text="325" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="318" data-tooltip-text="318" class="seat"></div></li>
                <li class="pillar"></li>
                <li class="partition_right_topDot"><div id="305" data-tooltip-text="305" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="298" data-tooltip-text="298" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="291" data-tooltip-text="291" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="284" data-tooltip-text="284" class="seat"></div></li>
                <li class="pillar"></li>
              </ul>
              <ul class="seat-group__row05">
                <li class="partition_right_bottomDot"><div id="484" data-tooltip-text="484" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="479" data-tooltip-text="479" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="470" data-tooltip-text="470" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="465" data-tooltip-text="465" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="457" data-tooltip-text="457" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="452" data-tooltip-text="452" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="443" data-tooltip-text="443" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="438" data-tooltip-text="438" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="433" data-tooltip-text="433" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="428" data-tooltip-text="428" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="419" data-tooltip-text="419" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="414" data-tooltip-text="414" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="405" data-tooltip-text="405" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="400" data-tooltip-text="400" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="392" data-tooltip-text="392" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="389" data-tooltip-text="389" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="380" data-tooltip-text="380" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="375" data-tooltip-text="375" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="368" data-tooltip-text="368" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="363" data-tooltip-text="363" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="354" data-tooltip-text="354" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="349" data-tooltip-text="349" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="341" data-tooltip-text="341" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="336" data-tooltip-text="336" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="331" data-tooltip-text="331" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="326" data-tooltip-text="326" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="317" data-tooltip-text="317" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="312" data-tooltip-text="312" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="304" data-tooltip-text="304" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="299" data-tooltip-text="299" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="290" data-tooltip-text="290" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="285" data-tooltip-text="285" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="280" data-tooltip-text="280" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="275" data-tooltip-text="275" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="272" data-tooltip-text="272" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="267" data-tooltip-text="267" class="seat"></div></li>
                <li class="partition_right_bottomDot"><div id="262" data-tooltip-text="262" class="seat"></div></li>
                <li class="partition_left_bottomDot"><div id="257" data-tooltip-text="257" class="seat"></div></li>
              </ul>
              <ul class="seat-group__row06">
                <li class="partition_right_topDot"><div id="483" data-tooltip-text="483" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="480" data-tooltip-text="480" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="469" data-tooltip-text="469" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="466" data-tooltip-text="466" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="456" data-tooltip-text="456" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="453" data-tooltip-text="453" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="442" data-tooltip-text="442" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="439" data-tooltip-text="439" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="432" data-tooltip-text="432" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="429" data-tooltip-text="429" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="418" data-tooltip-text="418" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="415" data-tooltip-text="415" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="404" data-tooltip-text="404" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="401" data-tooltip-text="401" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="391" data-tooltip-text="391" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="390" data-tooltip-text="390" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="379" data-tooltip-text="379" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="376" data-tooltip-text="376" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="367" data-tooltip-text="367" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="364" data-tooltip-text="364" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="353" data-tooltip-text="353" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="350" data-tooltip-text="350" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="340" data-tooltip-text="340" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="337" data-tooltip-text="337" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="330" data-tooltip-text="330" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="327" data-tooltip-text="327" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="316" data-tooltip-text="316" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="313" data-tooltip-text="313" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="303" data-tooltip-text="303" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="300" data-tooltip-text="300" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="289" data-tooltip-text="289" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="286" data-tooltip-text="286" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="279" data-tooltip-text="279" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="276" data-tooltip-text="276" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="271" data-tooltip-text="271" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="268" data-tooltip-text="268" class="seat"></div></li>
                <li class="partition_right_topDot"><div id="261" data-tooltip-text="261" class="seat"></div></li>
                <li class="partition_left_topdot"><div id="258" data-tooltip-text="258" class="seat"></div></li>
              </ul>
              <ul class="seat-group__row07">
                <li class="partition_right"><div id="482" data-tooltip-text="482" class="seat"></div></li>
                <li class="partition_left"><div id="481" data-tooltip-text="481" class="seat"></div></li>
                <li class="partition_right"><div id="468" data-tooltip-text="468" class="seat"></div></li>
                <li class="partition_left"><div id="467" data-tooltip-text="467" class="seat"></div></li>
                <li class="partition_right"><div id="455" data-tooltip-text="455" class="seat"></div></li>
                <li class="partition_left"><div id="454" data-tooltip-text="454" class="seat"></div></li>
                <li class="partition_right"><div id="441" data-tooltip-text="441" class="seat"></div></li>
                <li class="partition_left"><div id="440" data-tooltip-text="440" class="seat"></div></li>
                <li class="partition_right"><div id="431" data-tooltip-text="431" class="seat"></div></li>
                <li class="partition_left"><div id="430" data-tooltip-text="430" class="seat"></div></li>
                <li class="partition_right"><div id="417" data-tooltip-text="417" class="seat"></div></li>
                <li class="partition_left"><div id="416" data-tooltip-text="416" class="seat"></div></li>
                <li class="partition_right"><div id="403" data-tooltip-text="403" class="seat"></div></li>
                <li class="partition_left"><div id="402" data-tooltip-text="402" class="seat"></div></li>
                <li class="partition_right"></li>
                <li class="seat_vip">대표님</li>
                <li class="partition_left"><div id="377" data-tooltip-text="377" class="seat"></div></li>
                <li class="partition_right"><div id="366" data-tooltip-text="366" class="seat"></div></li>
                <li class="partition_left"><div id="365" data-tooltip-text="365" class="seat"></div></li>
                <li class="partition_right"><div id="352" data-tooltip-text="352" class="seat"></div></li>
                <li class="partition_left"><div id="351" data-tooltip-text="351" class="seat"></div></li>
                <li class="partition_right"><div id="339" data-tooltip-text="339" class="seat"></div></li>
                <li class="partition_left"><div id="338" data-tooltip-text="338" class="seat"></div></li>
                <li class="partition_right"><div id="329" data-tooltip-text="329" class="seat"></div></li>
                <li class="partition_left"><div id="328" data-tooltip-text="328" class="seat"></div></li>
                <li class="partition_right"><div id="315" data-tooltip-text="315" class="seat"></div></li>
                <li class="partition_left"><div id="314" data-tooltip-text="314" class="seat"></div></li>
                <li class="partition_right"><div id="302" data-tooltip-text="302" class="seat"></div></li>
                <li class="partition_left"><div id="301" data-tooltip-text="301" class="seat"></div></li>
                <li class="partition_right"><div id="288" data-tooltip-text="288" class="seat"></div></li>
                <li class="partition_left"><div id="287" data-tooltip-text="287" class="seat"></div></li>
                <li class="partition_right"><div id="278" data-tooltip-text="278" class="seat"></div></li>
                <li class="partition_left"><div id="277" data-tooltip-text="277" class="seat"></div></li>
                <li class="partition_right"><div id="270" data-tooltip-text="270" class="seat"></div></li>
                <li class="partition_left"><div id="269" data-tooltip-text="269" class="seat"></div></li>
                <li class="partition_right"><div id="260" data-tooltip-text="260" class="seat"></div></li>
                <li class="partition_left"><div id="259" data-tooltip-text="259" class="seat"></div></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- 하단 footer 영역 -->
  <footer class="footer">
    <div class="footer__inner">
    Copyright 2021. <Span style="color:#41b40a">KIM MIN WOOK</Span> all rights reserved.
    </div>
  </footer>
</body>
</html>
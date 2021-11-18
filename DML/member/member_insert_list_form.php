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
  <link rel="stylesheet" href="../../common/css/layout.css">
  <link rel="stylesheet" href="../../common/css/base.css">
  <link rel="stylesheet" href="../../common/css/main.css">
  <link rel="stylesheet" href="../../common/css/board.css">
  <link rel="stylesheet" href="../../common/css/jquery-ui.css">
  <script src="../../common/js/jquery-3.6.0.js"></script>
  <script src="../../common/js/jquery-ui.js"></script>
  <script src="../../common/js/gw-srms.js"></script>
  <title>인원 관리 | Greenweb Service</title>
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
    <!-- 하단 메뉴바 navbar -->
    <nav class="container-nav">
      <div class="nav__navbar">
        <div class="navbar__item navbar__first">
          <span class="material-icons">event_seat</span>
          <a class="link" href="../../index2.php">좌석 배정</a>
        </div>
        <div class="navbar__item">
        <span class="material-icons">computer</span>
          <a class="link" href="../../DML/seat/seat_insert_list_form.php">좌석 관리</a>
        </div>
        <div class="navbar__item">
          <span class="material-icons">people</span>
          <a class="link" href="../../DML/member/member_insert_list_form.php">인원 관리</a>
        </div>
        <div class="navbar__item">
          <span class="material-icons">history</span>
          <a class="link" href="../../DML/history/booking_histroy_list_form.php">변경 이력</a>
        </div>
        <?php
          if($userLevel=="S") {
            echo '<div class="navbar__item">
              <span class="material-icons">admin_panel_settings</span>
              <a class="link" href="../../DML/member/admin_member_insert_form.php">관리자</a>
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
    <main class="container-main">
      <section class="main__header main-header__title">
        인원 관리
      </section>
      <article class="main__content">
        <!-- 등록 템플릿_신규등록 클릭 시 나타남-->
        <template id="inputDataFormTmp">
          <div id="inputDataFormWrap">
            <div id="inputDataForm" class="table-row table-row__green member-table" value="member">
              <div class="table-cell table-cell__green">
                <div id="inputButton" class="only-icon-btn btn__green btn__margin" name="" type="button"><span class="material-icons">done</span></div>
                <div id="cancelButton" class="only-icon-btn btn__red btn__margin" name="" type="button"><span class="material-icons">block</span></div>
              </div>
              <select class="table-ddl table-cell__green" id="memberInsertSelectDepth1" name="insertSelectDepth1" value="member">
                <option value="NA">--소속 선택--</option>
                <option value="Search&Monitoring">Search&Monitoring</option>
              </select>
              <select class="table-ddl table-cell__green" id="memberInsertSelectDepth2" name="insertSelectDepth2" value="member">
                <option value="NA">--소속 팀 선택--</option>
              </select>
              <select class="table-ddl table-cell__green" id="memberInsertSelectDepth3" name="insertSelectDepth3" value="member">
                <option value="NA">--소속 파트 선택--</option>
              </select>
              <input type="text" id="memberEmployee" class="table-input table-cell__green" style="text-transform:uppercase;" />
              <input type="text" id="memberName" class="table-input table-cell__green" />
              <input type="text" id="memberJoinDate" class="table-input table-cell__green" />
              <select class="table-ddl table-cell__green" id="memberPlace">
                <option value="사무실">사무실</option>
                <option value="재택">재택</option>
              </select>
              <input type="text" id="memberSwitchingMonth" class="table-input table-cell__green" disabled>
              <input type="text" id="memberEtc" class="table-input table-cell__green" />
            </div>
          </div>
        </template>
        <div class="content__table-control">
          <button id="dataAddBtn" class="icon-btn btn__green" value="insert"><span class="material-icons">person_add</span>&nbsp;&nbsp;<sapn id="btnText">신규등록<sapn></button>
          <div class="search-icon"><span class="material-icons">search</span></div><input type="text" name="quickSearch" class="search-input" placeholder="검색하기.." />
        </div>
        <div class="content__table-container">
          <div id="tableHeader" class="table-header table-header__style member-table">
            <div class="table-cell">Action</div>
            <div class="table-cell">소속</div>
            <div class="table-cell">팀</div>
            <div class="table-cell">파트</div>
            <div class="table-cell">사번</div>
            <div class="table-cell">이름</div>
            <div class="table-cell">입사일</div>
            <div class="table-cell">근무장소</div>
            <div class="table-cell">재택 전환</div>
            <div class="table-cell">비고</div>
          </div>
          <div id="tableBody" class="table__body">

          </div>
        </div>
      </article>
    </main>
  </div>
  <script>

  $(document).ready(function() {
    load_member_data();
    function load_member_data() {
      let action="memberListLoad";
      let userPosition="<?php echo $userPosition; ?>";
      let userConcurrent="<?php echo $userConcurrent; ?>";
      let userTeam="<?php echo $userTeam; ?>";
      let userDepartment="<?php echo $userDepartment; ?>";
      let userDepartment2="<?php echo $userDepartment2; ?>";
      $.ajax({
        type:"post",
        url:"../action.php",
        data:{
          action:action,
          userPosition:userPosition,
          userConcurrent:userConcurrent,
          userTeam:userTeam,
          userDepartment:userDepartment,
          userDepartment2:userDepartment2
        },
        success:function(result) {
          $("#tableBody").html(result);
        },
        error:function() {
          alert('실패');
        },
        beforeSend:function() {//로딩 시작
          $("#lodingWrap").css("display","block");
        },
        complete:function() {
          $("#lodingWrap").css("display","none");
        }
      });
    }

    //수정 버튼으로 업데이트 하기
    $(document).on('click', 'div[name=modifyUpdateAction]', function(){
      //각 엘리먼트들의 데이터 값
      let memberOffice=$("#memberInsertSelectDepth1").val()
      let memberTeam=$("#memberInsertSelectDepth2").val();
      let memberDepartment=$("#memberInsertSelectDepth3").val();
      let memberEmployee=$("#memberEmployee").val().toUpperCase();
      let memberName=$("#memberName").val();
      let memberJoinDate=$("#memberJoinDate").val();
      let memberPlace=$("#memberPlace").val();
      let memberEtc=$("#memberEtc").val();
      let action="memberUpdate";
      if(memberOffice==="NA"||memberTeam==="NA") {
        alert("소속 및 팀을 선택해주세요.");
      } else if(memberEmployee==='') {
        alert("사번을 입력해 주세요.");
      } else if(memberName==='') {
        alert("이름을 입력해 주세요.");
      } else if(memberPlace==='') {
        alert("근무장소를 선택해 주세요.");
      } else if(memberJoinDate==='') {
        alert("입사일을 선택해 주세요.");
      } else {
        $.ajax({
          type:"post",
          url:"../action.php",
          data:{
            memberOffice:memberOffice,
            memberTeam:memberTeam,
            memberDepartment:memberDepartment,
            memberEmployee:memberEmployee,
            memberName:memberName,
            memberJoinDate:memberJoinDate,
            memberPlace:memberPlace,
            memberEtc:memberEtc,
            action:action
          },
          success:function(result) {
            if(result=="success") {
              $("#inputDataFormModify").remove();
              load_member_data();
              alert("수정이 완료되었습니다.");
            } 
          },
          error:function() {
            alert('실패');
          },
          beforeSend:function() {//로딩 시작
            $("#lodingWrap").css("display","block");
          },
          complete:function() {
            $("#lodingWrap").css("display","none");
          }
        });
      }
    });
    //등록버튼을 눌렀을때
    $(document).on('click', 'div[name=insertInputAction]', function(){
      //각 엘리먼트들의 데이터 값
      let memberOffice=$("#memberInsertSelectDepth1").val()
      let memberTeam=$("#memberInsertSelectDepth2").val();
      let memberDepartment=$("#memberInsertSelectDepth3").val();
      let memberEmployee=$("#memberEmployee").val().toUpperCase();
      let memberName=$("#memberName").val();
      let memberJoinDate=$("#memberJoinDate").val();
      let memberPlace=$("#memberPlace").val();
      let memberEtc=$("#memberEtc").val();
      let action="memberInsert";
      if(memberOffice==="NA"||memberTeam==="NA") {
        alert("소속 및 팀을 선택해주세요.");
      } else if(memberEmployee==='') {
        alert("사번을 입력해 주세요.");
      } else if(memberName==='') {
        alert("이름을 입력해 주세요.");
      } else if(memberPlace==='') {
        alert("근무장소를 선택해 주세요.");
      } else if(memberJoinDate==='') {
        alert("입사일을 선택해 주세요.");
      } else {
        $.ajax({
          type:"post",
          url:"../action.php",
          data:{
            memberOffice:memberOffice,
            memberTeam:memberTeam,
            memberDepartment:memberDepartment,
            memberEmployee:memberEmployee,
            memberName:memberName,
            memberJoinDate:memberJoinDate,
            memberPlace:memberPlace,
            memberEtc:memberEtc,
            action:action
          },
          success:function(result) {
            if(result=="success") {
              $("#inputDataFormInsert").remove();
              load_member_data();
              data_btn_insert();
              alert("등록이 완료되었습니다.");
            } else if(result=="false") {
              alert("이미 등록된 사번입니다.");
            }
          },
          error:function() {
            alert('실패');
          },
          beforeSend:function() {//로딩 시작
            $("#lodingWrap").css("display","block");
          },
          complete:function() {
            $("#lodingWrap").css("display","none");
          }
        });
      }
    });
    //삭제버튼 누르기
    $(document).on('click', 'div[name=delete]', function(){
      let memberEmployee=$(this).closest(".table-row").children().eq(4).text();
      if(confirm("삭제 하시겠습니까?")) {
        let action="memberDelete";
        $.ajax({
          type:"post",
          url:"../action.php",
          data:{
            memberEmployee:memberEmployee,
            action:action
          },
          success:function(result){
            if(result=="success") {
              load_member_data();
              alert("삭제완료");
            }
          },
          error:function() {
            alert('실패');
          },
          beforeSend:function() {//로딩 시작
            $("#lodingWrap").css("display","block");
          },
          complete:function() {
            $("#lodingWrap").css("display","none");
          }
        });
      }
    });
  });
  </script>
</body>
</html>
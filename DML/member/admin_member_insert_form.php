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
    if($userLevel!="S") {
      echo("
      <script>
      window.alert('접근 권한이 없습니다.')
      location.href = '../../login.php';
      </script>
      ");
    }
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
  <title>관리자 계정 관리 | Greenweb Service</title>
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
  <!-- 메인 -->
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
        관리자 계정 관리
      </section>
      <article class="main__content">
        <!--등록 템플릿-->
        <template id="inputDataFormTmp">
          <div id="inputDataFormWrap">
            <div id="inputDataForm" class="table-row table-row__green admin-table" value="admin">
              <div class="table-cell table-cell__green">
                <div id="inputButton" class="only-icon-btn btn__green btn__margin" name="" type="button"><span class="material-icons">done</span></div>
                <div id="cancelButton" class="only-icon-btn btn__red btn__margin" name="" type="button"><span class="material-icons">block</span></div>
              </div>
              <input class="table-input table-cell__green" type="text" id="adminEmployee" style="text-transform:uppercase;" />
              <input class="table-input table-cell__green" type="text" id="adminPW" class="table-list__input" />
              <input class="table-input table-cell__green" type="text" id="adminName" class="table-list__input" />
              <select class="table-ddl table-cell__green" id="adminInsertSelectPosition">
                <option value="팀장">팀장</option>
                <option value="파트장">파트장</option>
              </select>
              <select class="table-ddl table-cell__green" id="adminInsertSelectConcurrent">
                <option value="N">N</option>
                <option value="Y">Y</option>
              </select>
              <select class="table-ddl table-cell__green" id="adminInsertSelectDepth1" name="insertSelectDepth1" value="admin">
                <option value="NA">--소속 선택--</option>
                <option value="Search&Monitoring">Search&Monitoring</option>
              </select>
              <select class="table-ddl table-cell__green" id="adminInsertSelectDepth2" name="insertSelectDepth2" value="admin">
                <option value="NA">--소속 팀 선택--</option>
              </select>
              <select class="table-ddl table-cell__green" id="adminInsertSelectDepth3" name="insertSelectDepth3" value="admin" disabled>
                <option value="NA">--소속 파트 선택--</option>
              </select>
              <select class="table-ddl table-cell__green" id="adminInsertSelectDepth4" name="insertSelectDepth4" value="admin" disabled>
                <option value="NA">--겸직 파트 선택--</option>
              </select>
              <select class="table-ddl table-cell__green" id="adminLevel">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="N">N</option>
              </select>
            </div>
          </div>
        </template>

        <div class="content__table-control">
          <button id="dataAddBtn" class="icon-btn btn__green" value="insert"><span class="material-icons">person_add</span>&nbsp;&nbsp;<sapn id="btnText">신규등록<sapn></button>
          <div class="search-icon"><span class="material-icons">search</span></div><input type="text" name="quickSearch" class="search-input" placeholder="검색하기.." />
        </div>
        <div class="content__table-container">
          <div id="tableHeader" class="table-header table-header__style admin-table">
            <div class="table-cell">Action</div>
            <div class="table-cell">사번</div>
            <div class="table-cell">비밀번호</div>
            <div class="table-cell">이름</div>
            <div class="table-cell">직책</div>
            <div class="table-cell">겸직</div>
            <div class="table-cell">소속</div>
            <div class="table-cell">팀</div>
            <div class="table-cell">파트</div>
            <div class="table-cell">겸직부서</div>
            <div class="table-cell">권한레벨</div>
          </div>
          <div id="tableBody" class="table__body">

          </div>
        </div>
      </article>
    </main>
    <!-- 하단 footer 영역 -->
  </div>
  <script>
  
  $(document).ready(function() {
    load_data();
    function load_data() {
      let action="adminListLoad";
      $.ajax({
        type:"post",
        url:"../action.php",
        data:{action:action},
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

    //삭제버튼 누르기
    $(document).on('click', 'div[name=delete]', function(){
      let adminEmployee=$(this).closest(".table-row").children().eq(1).text();
      if(confirm("삭제 하시겠습니까?")) {
        let action="adminDelete";
        $.ajax({
          type:"post",
          url:"../action.php",
          data:{
            adminEmployee:adminEmployee,
            action:action
          },
          success:function(result){
            if(result=="success") {
              load_data();
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

    //수정 버튼으로 업데이트 하기
    $(document).on('click', 'div[name=modifyUpdateAction]', function(){
      let adminEmployee=$("#adminEmployee").val().toUpperCase();
      let adminPW=$("#adminPW").val();
      let adminName=$("#adminName").val();
      let adminPosition=$("#adminInsertSelectPosition").val();
      let adminConcurrent=$("#adminInsertSelectConcurrent").val();
      let adminOffice=$("#adminInsertSelectDepth1").val();
      let adminTeam=$("#adminInsertSelectDepth2").val();
      let adminDepartment=$("#adminInsertSelectDepth3").val();
      let adminDepartment2=$("#adminInsertSelectDepth4").val();
      let adminLevel=$("#adminLevel").val();
      let action="adminUpdate";
      if(adminDepartment!="NA"&&adminDepartment===adminDepartment2) {
        alert("파트와 겸직부서는 같을 수 없습니다.");
      } else if(adminEmployee==='') {
        alert("사번을 입력해 주세요.");
      } else if(adminPW==='') {
        alert("비밀번호를 입력해 주세요.");
      } else if(adminName==='') {
        alert("이름을 입력해 주세요.");
      } else if(adminOffice==="NA"||adminTeam==="NA") {
        alert("소속 및 팀을 선택해주세요.");
      } else {
        $.ajax({
          type:"post",
          url:"../action.php",
          data:{
            adminEmployee:adminEmployee,
            adminPW:adminPW,
            adminName:adminName,
            adminPosition:adminPosition,
            adminConcurrent:adminConcurrent,
            adminOffice:adminOffice,
            adminTeam:adminTeam,
            adminDepartment:adminDepartment,
            adminDepartment2:adminDepartment2,
            adminLevel:adminLevel,
            action:action
          },
          success:function(result) {
            if(result=="success") {
              $("#inputDataFormModify").remove();
              load_data();
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

    //등록버튼을 눌렀을 경우
    $(document).on('click', 'div[name=insertInputAction]', function(){
      //각 엘리먼트들의 데이터 값
      let adminEmployee=$("#adminEmployee").val().toUpperCase();
      let adminPW=$("#adminPW").val();
      let adminName=$("#adminName").val();
      let adminPosition=$("#adminInsertSelectPosition").val();
      let adminConcurrent=$("#adminInsertSelectConcurrent").val();
      let adminOffice=$("#adminInsertSelectDepth1").val();
      let adminTeam=$("#adminInsertSelectDepth2").val();
      let adminDepartment=$("#adminInsertSelectDepth3").val();
      let adminDepartment2=$("#adminInsertSelectDepth4").val();
      let adminLevel=$("#adminLevel").val();
      let action="adminInsert";
      if(adminDepartment!="NA"&&adminDepartment===adminDepartment2) {
        alert("파트와 겸직부서는 같을 수 없습니다.");
      } else if(adminEmployee==='') {
        alert("사번을 입력해 주세요.");
      } else if(adminPW==='') {
        alert("비밀번호를 입력해 주세요.");
      } else if(adminName==='') {
        alert("이름을 입력해 주세요.");
      } else if(adminOffice==="NA"||adminTeam==="NA") {
        alert("소속 및 팀을 선택해주세요.");
      } else {
        $.ajax({
          type:"post",
          url:"../action.php",
          data:{
            adminEmployee:adminEmployee,
            adminPW:adminPW,
            adminName:adminName,
            adminPosition:adminPosition,
            adminConcurrent:adminConcurrent,
            adminOffice:adminOffice,
            adminTeam:adminTeam,
            adminDepartment:adminDepartment,
            adminDepartment2:adminDepartment2,
            adminLevel:adminLevel,
            action:action
          },
          success:function(result) {
            if(result=="success") {
              $("#inputDataFormInsert").remove();
              load_data();
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
  });
  </script>
  <script>
  //겸직 체크에 따른 겸직부서 select 활성화 여부
  $(document).on("change","#adminInsertSelectConcurrent", function(){
    let concurrentStats=$("#adminInsertSelectConcurrent").val();
    if(concurrentStats=="N") {
      $("#adminInsertSelectDepth4").attr("disabled", "disabled");
    } else if(concurrentStats=="Y") {
      $("#adminInsertSelectDepth4").removeAttr("disabled");
    }
  });

  //직책 체크에 따른 파트 select 활성화 여부_겸직 조건도 같이
  $(document).on("change","#adminInsertSelectPosition", function() {
    let positionStats=$("#adminInsertSelectPosition").val();
    let concurrentStats=$("#adminInsertSelectConcurrent").val();
    if(positionStats=="팀장") {
      $("#adminInsertSelectDepth3").attr("disabled", "disabled");
      if(concurrentStats=="N") {
        $("#adminInsertSelectDepth4").attr("disabled", "disabled");
      } else if(concurrentStats="Y") {
        $("#adminInsertSelectDepth4").removeAttr("disabled");
      }
    } else if(positionStats=="파트장") {
      $("#adminInsertSelectDepth3").removeAttr("disabled");
      if(concurrentStats=="N") {
        $("#adminInsertSelectDepth4").attr("disabled", "disabled");
      } else if(concurrentStats="Y") {
        $("#adminInsertSelectDepth4").removeAttr("disabled");
      }
    }
  });
  </script>
</body>
</html>




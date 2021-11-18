'use strict';

/* 테이블 리스트 부분 */
let team=["대중문화운영팀", "네이버운영지원1팀", "네이버운영지원2팀", "UGC모니터링팀", "AI학습지원센터"];
let teamVal=["대중문화운영팀", "네이버운영지원1팀", "네이버운영지원2팀", "UGC모니터링팀", "AI학습지원센터"];

let departmentPopular=["대중문화운영1파트", "대중문화운영2파트"];
let departmentPopularVal=["대중문화운영1파트", "대중문화운영2파트"];

let department1team=["인물검색운영1파트", "인물검색운영2파트", "스팸대응파트"];
let department1teamVal=["인물검색운영1파트", "인물검색운영2파트", "스팸대응파트"];

let department2team=["서비스운영1파트", "서비스운영2파트"];
let department2teamVal=["서비스운영1파트", "서비스운영2파트"];

let departmentUgc=["검색모니터링파트", "UGC운영파트", "컨텐츠모니터링파트"];
let departmentUgcVal=["검색모니터링파트", "UGC운영파트", "컨텐츠모니터링파트"];

let departmentAi=["클로바운영파트", "AI학습DB파트", "품질평가파트"];
let departmentAiVal=["클로바운영파트", "AI학습DB파트", "품질평가파트"];

function optionChange1(thisName){
  let Position='#'.concat(thisName,'Position');
  let Concurrent='#'.concat(thisName,'Concurrent');
  let Depth1='#'.concat(thisName,'Depth1');
  let Depth2='#'.concat(thisName,'Depth2');
  let Depth3='#'.concat(thisName,'Depth3');
  let Depth4='#'.concat(thisName,'Depth4');
  let selectItem=$(Depth1).val();
  let changeItem;
  let changeItemVal;

  if(selectItem==="Search&Monitoring"){
    changeItem=team;
    changeItemVal=teamVal;
  } else if (selectItem==="NA"){
    $(Depth2).children("option:not(:first)").remove();
    $(Depth3).children("option:not(:first)").remove();
    $(Depth4).children("option:not(:first)").remove();
  }
  $(Depth2).children("option:not(:first)").remove();
  for(let i=0; i<changeItem.length; i++){
    let teamOption=$("<option value="+changeItemVal[i]+">"+changeItem[i]+"</option>");
    $(Depth2).append(teamOption);
  }
  $(Depth3).children("option:not(:first)").remove();
  $(Depth4).children("option:not(:first)").remove();
}

function optionChange2(thisName){
  let Position='#'.concat(thisName,'Position');
  let Concurrent='#'.concat(thisName,'Concurrent');
  let Depth1='#'.concat(thisName,'Depth1');
  let Depth2='#'.concat(thisName,'Depth2');
  let Depth3='#'.concat(thisName,'Depth3');
  let Depth4='#'.concat(thisName,'Depth4');
  let selectItem=$(Depth2).val();
  let changeItem;
  let changeItemVal;
  if(selectItem==="NA"){
    $(Depth3).children("option:not(:first)").remove();
    $(Depth4).children("option:not(:first)").remove();
  } else if (selectItem==="대중문화운영팀"){
    changeItem=departmentPopular;
    changeItemVal=departmentPopularVal;
  } else if (selectItem==="네이버운영지원1팀"){
    changeItem=department1team;
    changeItemVal=department1teamVal;
  } else if (selectItem==="네이버운영지원2팀"){
    changeItem=department2team;
    changeItemVal=department2teamVal;
  } else if (selectItem==="UGC모니터링팀"){
    changeItem=departmentUgc;
    changeItemVal=departmentUgcVal;
  } else if (selectItem==="AI학습지원센터"){
    changeItem=departmentAi;
    changeItemVal=departmentAiVal;
  }
  $(Depth3).children("option:not(:first)").remove();
  $(Depth4).children("option:not(:first)").remove();
  for(let i=0; i<changeItem.length; i++){
    let departmentOption1=$("<option value="+changeItemVal[i]+">"+changeItem[i]+"</option>");
    let departmentOption2=$("<option value="+changeItemVal[i]+">"+changeItem[i]+"</option>");
    $(Depth3).append(departmentOption1);
    $(Depth4).append(departmentOption2);
  }
}

$(document).ready(function(){
  //리스트에서 수정을 눌렀을 때 옵션
  $("#adminModifySelectDepth1").change(function(){
    optionChange1("adminModifySelect");
  });
  $("#adminModifySelectDepth2").change(function(){
    optionChange2("adminModifySelect");
  });
/* modal 창 영역 */
  $(".seat").click(function(){
    let seatNum='';
    $(".modal").css("display", "block");
    seatNum=$(this).attr("id");
    $('#'+seatNum).addClass("seat_click_style");
    $("#seatNo").text(seatNum);
    $("#contentSeatNo").text(seatNum);

    $(".modal__button-close").click(function(){
      $(".modal").css("display", "none");
      $('#'+seatNum).removeClass("seat_click_style");
    });
    $("#btnModalClose").click(function(){
      $(".modal").css("display", "none");
      $('#'+seatNum).removeClass("seat_click_style");
    });
    $(document).on("click", function(e){
      if($(".modal").is(e.target)) {
        $(".modal").css("display", "none");
        $('#'+seatNum).removeClass("seat_click_style");
      }
    });
  });
    

/* 달력 부분 */
  $("#btnCalendar").datepicker({
    showOn: "button",
    buttonText: "<span class='material-icons'>date_range</span>",
    monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'], //달력의 월 부분 텍스트
    monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'], //달력의 월 부분 Tooltip 텍스트
    dayNamesMin: ['일','월','화','수','목','금','토'], //달력의 요일 부분 텍스트
    dayNamesShort: ['일','월','화','수','목','금','토'],
    dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'], //달력의 요일 부분 Tooltip 텍스트
    dateFormat: 'yy년 mm월 dd일 (D)'
  });
  $("input[name=dateBox]").attr("readonly",true).datepicker('setDate', 'today');

  $("#btnTodaySelect").click(function(){
    $("input[name=dateBox]").datepicker('setDate', 'today');
  });

  $("#btnDatePrev").click(function(){
    let currentDate=$("input[name=dateBox]").datepicker('getDate');
    let prevDay=new Date(currentDate.setDate(currentDate.getDate()-1));
    $("input[name=dateBox]").datepicker('setDate', prevDay);
  });

  $("#btnDateNext").click(function(){
    let currentDate=$("input[name=dateBox]").datepicker('getDate');
    let nextDay=new Date(currentDate.setDate(currentDate.getDate()+1));
    $("input[name=dateBox]").datepicker('setDate', nextDay);
  });

  $("#joinDate").datepicker({
    monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'], //달력의 월 부분 텍스트
    monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'], //달력의 월 부분 Tooltip 텍스트
    dayNamesMin: ['일','월','화','수','목','금','토'], //달력의 요일 부분 텍스트
    dayNamesShort: ['일','월','화','수','목','금','토'],
    dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'], //달력의 요일 부분 Tooltip 텍스트
    dateFormat: 'yy-mm-dd'
  });

  $("#changeDate").datepicker({
    monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'], //달력의 월 부분 텍스트
    monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'], //달력의 월 부분 Tooltip 텍스트
    dayNamesMin: ['일','월','화','수','목','금','토'], //달력의 요일 부분 텍스트
    dayNamesShort: ['일','월','화','수','목','금','토'],
    dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'], //달력의 요일 부분 Tooltip 텍스트
    dateFormat: 'yy-mm-dd'
  });

  $("#dataAddBtn").click(function(){
    $(".table_input").val("");
    $("#inputFormRow").find("select").find("option:first").prop("selected", true);
    $("#adminInsertSelectDepth2").children("option:not(:first)").remove();
    $("#adminInsertSelectDepth3").children("option:not(:first)").remove();
    $("#adminInsertSelectDepth4").children("option:not(:first)").remove();
    $("#adminInsertSelectDepth4").attr("disabled", "disabled");
    if($("#inputFormRow").css("display")=="none"){
      $("#inputFormRow").css("display", "table-row");
      $("#dataAddBtn").removeClass("btn__green");
      $("#dataAddBtn").addClass("btn__red");
      $("#dataAddBtn span").text("cancel");
      $("#btnText").text("취소하기");
    } else {
      $("#inputFormRow").css("display", "none");
      $("#dataAddBtn").removeClass("btn__red");
      $("#dataAddBtn").addClass("btn__green");
      $("#dataAddBtn span").text("add_circle");
      $("#btnText").text("신규등록");
    }
  });
  //직책 체크에 따른 파트 select 활성화 여부_겸직 조건도 같이
  $("#adminInsertSelectPosition").change(function() {
    let positionStats=$("#adminInsertSelectPosition").val();
    let concurrentStats=$("#adminInsertSelectConcurrent").val();
    if(positionStats=="팀장") {
      $("#adminInsertSelectDepth3").attr("disabled", "disabled");
      if(concurrentStats="N") {
        $("#adminInsertSelectDepth4").attr("disabled", "disabled");
      } else if(concurrentStats="Y") {
        $("#adminInsertSelectDepth4").removeAttr("disabled");
      }
    } else if(positionStats=="파트장") {
      $("#adminInsertSelectDepth3").removeAttr("disabled");
      if(concurrentStats="N") {
        $("#adminInsertSelectDepth4").attr("disabled", "disabled");
      } else if(concurrentStats="Y") {
        $("#adminInsertSelectDepth4").removeAttr("disabled");
      }
    }
  });

  //겸직 체크에 따른 겸직부서 select 활성화 여부
  $("#adminInsertSelectConcurrent").change(function() {
    let concurrentStats=$("#adminInsertSelectConcurrent").val();
    if(concurrentStats=="N") {
      $("#adminInsertSelectDepth4").attr("disabled", "disabled");
    } else if(concurrentStats=="Y") {
      $("#adminInsertSelectDepth4").removeAttr("disabled");
    }
  });
    
  //검색 기능
  $("input[name=quickSearch]").on("keyup", function(){
    let value=$(this).val().toLowerCase();
    $(".table__body-row").filter(function(){
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


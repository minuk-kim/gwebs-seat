'use strict';

/* 테이블 리스트 부분 */
let team=["대중문화운영팀", "네이버운영지원1팀", "네이버운영지원2팀", "UGC모니터링팀", "AI학습지원센터"];
let departmentPopular=["대중문화운영1파트", "대중문화운영2파트"];
let department1team=["인물검색운영1파트", "인물검색운영2파트", "스팸대응파트"];
let department2team=["서비스운영1파트", "서비스운영2파트"];
let departmentUgc=["검색모니터링파트", "UGC운영파트", "컨텐츠모니터링파트"];
let departmentAi=["클로바운영파트", "AI학습DB파트", "품질평가파트"];

let cellDataArr = new Array();
let $templateContent
let row

$(document).on('change', 'select[name=insertSelectDepth1]', function(){
  let formName=$(this).attr("value");
  let Position='#'.concat(formName, 'InsertSelect', 'Position');
  let Concurrent='#'.concat(formName, 'InsertSelect', 'Concurrent');
  let Depth1='#'.concat(formName, 'InsertSelect', 'Depth1');
  let Depth2='#'.concat(formName, 'InsertSelect', 'Depth2');
  let Depth3='#'.concat(formName, 'InsertSelect', 'Depth3');
  let Depth4='#'.concat(formName, 'InsertSelect', 'Depth4');
  let selectItem=$(Depth1).val();
  let changeItem;

  if(selectItem==="Search&Monitoring"){
    changeItem=team;
    $(Depth2).children("option:not(:first)").remove();
    for(let i=0; i<changeItem.length; i++){
      let teamOption=$("<option value="+changeItem[i]+">"+changeItem[i]+"</option>");
      $(Depth2).append(teamOption);
    }
    $(Depth3).children("option:not(:first)").remove();
    $(Depth4).children("option:not(:first)").remove();
  } else if (selectItem==="NA"){
    $(Depth2).children("option:not(:first)").remove();
    $(Depth3).children("option:not(:first)").remove();
    $(Depth4).children("option:not(:first)").remove();
  }
});

$(document).on('change', 'select[name=insertSelectDepth2]', function(){
  let formName=$(this).attr("value");
  let Position='#'.concat(formName, 'InsertSelect', 'Position');
  let Concurrent='#'.concat(formName, 'InsertSelect', 'Concurrent');
  let Depth1='#'.concat(formName, 'InsertSelect', 'Depth1');
  let Depth2='#'.concat(formName, 'InsertSelect', 'Depth2');
  let Depth3='#'.concat(formName, 'InsertSelect', 'Depth3');
  let Depth4='#'.concat(formName, 'InsertSelect', 'Depth4');
  let selectItem=$(Depth2).val();
  let changeItem;
  if(selectItem==="NA"){
    $(Depth3).children("option:not(:first)").remove();
    $(Depth4).children("option:not(:first)").remove();
  } else if (selectItem==="대중문화운영팀"){
    changeItem=departmentPopular;
  } else if (selectItem==="네이버운영지원1팀"){
    changeItem=department1team;
  } else if (selectItem==="네이버운영지원2팀"){
    changeItem=department2team;
  } else if (selectItem==="UGC모니터링팀"){
    changeItem=departmentUgc;
  } else if (selectItem==="AI학습지원센터"){
    changeItem=departmentAi;
  }
  $(Depth3).children("option:not(:first)").remove();
  $(Depth4).children("option:not(:first)").remove();
  for(let i=0; i<changeItem.length; i++){
    let departmentOption1=$("<option value="+changeItem[i]+">"+changeItem[i]+"</option>");
    let departmentOption2=$("<option value="+changeItem[i]+">"+changeItem[i]+"</option>");
    $(Depth3).append(departmentOption1);
    $(Depth4).append(departmentOption2);
  }
});

//데이터 등록 버튼 클래스 변경
function data_btn_insert(){
  $("#dataAddBtn").removeClass("btn__red");
  $("#dataAddBtn").addClass("btn__green");
  $("#dataAddBtn").val("insert");
  $("#dataAddBtn span").text("person_add");
  $("#btnText").text("신규등록");
}

function data_btn_cancel(){
  $("#dataAddBtn").removeClass("btn__green");
  $("#dataAddBtn").addClass("btn__red");
  $("#dataAddBtn").val("cancel");
  $("#dataAddBtn span").text("cancel");
  $("#btnText").text("취소하기");
}

//수정버튼 클릭 시
$(document).on('click', 'div[name=update]', function(){
  $("#inputDataFormInsert").remove();
  data_btn_insert();//신규등록 버튼 등록 상태로 변경
  row=$(this).closest(".table-row");
  let cell=row.children();
  let $clonedTemplate=$("#inputDataFormTmp").clone(true);
  $templateContent=$($clonedTemplate.html());
  
  cellDataArr = new Array();
  cell.each(function(i){
    cellDataArr.push(cell.eq(i).text());
  });
  modify_data_control();
});

//행을 더블클릭하면 수정으로 변경
$(document).on('dblclick', 'div[name=tableRow]', function(){
  $("#inputDataFormInsert").remove();
  data_btn_insert();//신규등록 버튼 등록 상태로 변경
  row=$(this).eq(0);
  let cell=row.children();
  let $clonedTemplate=$("#inputDataFormTmp").clone(true);
  $templateContent=$($clonedTemplate.html());

  cellDataArr = new Array();
  cell.each(function(i){
    cellDataArr.push(cell.eq(i).text());
  });
  modify_data_control();
});

$(document).on('click', 'div[name=modifyCancelAction]', function() {
  $("#inputDataFormModify").remove();
  
});

$(document).on('click', 'div[name=insertCancelAction]', function() {
  $("#inputDataFormInsert").remove();
  data_btn_insert();
});

function modify_data_control() {
  //템플릿 사용
  let formName=$templateContent.find("#inputDataForm").attr("value");
  $templateContent.find("#inputButton").attr("name", "modifyUpdateAction")//액션 버튼에 이름 바꾸기
  $templateContent.find("#cancelButton").attr("name", "modifyCancelAction")//액션 버튼에 이름 바꾸기
  $templateContent.find("#inputDataForm").attr("id", "inputDataFormModify")
  $templateContent.find("#inputDataFormModify").removeClass("table-row__green").addClass("mody-template");//등록창의 수정창 속성 추가
  $templateContent.find(".only-icon-btn:first").removeClass("btn__green").addClass("btn__blue");
  $templateContent.find(".table-cell").removeClass("table-cell__green").addClass("table-cell__blue");
  $templateContent.find(":input").removeClass("table-cell__green").addClass("table-cell__blue");

  if(formName==="admin") {
    $templateContent.find("#adminEmployee").attr('value', cellDataArr[1]);
    $templateContent.find("#adminPW").attr('value', cellDataArr[2]);
    $templateContent.find("#adminName").attr('value', cellDataArr[3]);
    $templateContent.find('#adminInsertSelectPosition option[value="' + cellDataArr[4] + '"]').attr("selected", "selected");
    $templateContent.find('#adminInsertSelectConcurrent option[value="' + cellDataArr[5] + '"]').attr("selected", "selected");
    $templateContent.find('#adminInsertSelectDepth1 option[value="' + cellDataArr[6] + '"]').attr("selected", "selected");

    if(cellDataArr[6]==="Search&Monitoring") {
      $templateContent.find('#adminInsertSelectDepth2').children("option:not(:first)").remove();
      for(let i=0; i<team.length; i++){
        $templateContent.find('#adminInsertSelectDepth2').append("<option value="+team[i]+">"+team[i]+"</option>");
      }
    } else if(cellDataArr[6]==="NA") {
      $templateContent.find('#adminInsertSelectDepth2').children("option:not(:first)").remove();
      $templateContent.find('#adminInsertSelectDepth3').children("option:not(:first)").remove();
      $templateContent.find('#adminInsertSelectDepth4').children("option:not(:first)").remove();
    }
    $templateContent.find('#adminInsertSelectDepth2 option[value="' + cellDataArr[7] + '"]').attr("selected", "selected");

    if(cellDataArr[7]==="대중문화운영팀") {
      $templateContent.find('#adminInsertSelectDepth3').children("option:not(:first)").remove();
      $templateContent.find('#adminInsertSelectDepth4').children("option:not(:first)").remove();
      for(let i=0; i<departmentPopular.length; i++){
        $templateContent.find('#adminInsertSelectDepth3').append("<option value="+departmentPopular[i]+">"+departmentPopular[i]+"</option>");
        $templateContent.find('#adminInsertSelectDepth4').append("<option value="+departmentPopular[i]+">"+departmentPopular[i]+"</option>");
      }
    } else if (cellDataArr[7]==="네이버운영지원1팀") {
      $templateContent.find('#adminInsertSelectDepth3').children("option:not(:first)").remove();
      $templateContent.find('#adminInsertSelectDepth4').children("option:not(:first)").remove();
      for(let i=0; i<department1team.length; i++){
        $templateContent.find('#adminInsertSelectDepth3').append("<option value="+department1team[i]+">"+department1team[i]+"</option>");
        $templateContent.find('#adminInsertSelectDepth4').append("<option value="+department1team[i]+">"+department1team[i]+"</option>");
      }
    } else if (cellDataArr[7]==="네이버운영지원2팀") {
      $templateContent.find('#adminInsertSelectDepth3').children("option:not(:first)").remove();
      $templateContent.find('#adminInsertSelectDepth4').children("option:not(:first)").remove();
      for(let i=0; i<department2team.length; i++){
        $templateContent.find('#adminInsertSelectDepth3').append("<option value="+department2team[i]+">"+department2team[i]+"</option>");
        $templateContent.find('#adminInsertSelectDepth4').append("<option value="+department2team[i]+">"+department2team[i]+"</option>");
      }
    } else if (cellDataArr[7]==="UGC모니터링팀") {
      $templateContent.find('#adminInsertSelectDepth3').children("option:not(:first)").remove();
      $templateContent.find('#adminInsertSelectDepth4').children("option:not(:first)").remove();
      for(let i=0; i<departmentUgc.length; i++){
        $templateContent.find('#adminInsertSelectDepth3').append("<option value="+departmentUgc[i]+">"+departmentUgc[i]+"</option>");
        $templateContent.find('#adminInsertSelectDepth4').append("<option value="+departmentUgc[i]+">"+departmentUgc[i]+"</option>");
      }
    } else if (cellDataArr[7]==="AI학습지원센터") {
      $templateContent.find('#adminInsertSelectDepth3').children("option:not(:first)").remove();
      $templateContent.find('#adminInsertSelectDepth4').children("option:not(:first)").remove();
      for(let i=0; i<departmentAi.length; i++){
        $templateContent.find('#adminInsertSelectDepth3').append("<option value="+departmentAi[i]+">"+departmentAi[i]+"</option>");
        $templateContent.find('#adminInsertSelectDepth4').append("<option value="+departmentAi[i]+">"+departmentAi[i]+"</option>");
      }
    } else {
      $templateContent.find('#adminInsertSelectDepth3').children("option:not(:first)").remove();
      $templateContent.find('#adminInsertSelectDepth4').children("option:not(:first)").remove();
    }
    $templateContent.find('#adminInsertSelectDepth3 option[value="' + cellDataArr[8] + '"]').attr("selected", "selected");
    $templateContent.find('#adminInsertSelectDepth4 option[value="' + cellDataArr[9] + '"]').attr("selected", "selected");
    $templateContent.find('#adminLevel option[value="' + cellDataArr[10] + '"]').attr("selected", "selected");

    //수정창에 조건에 따라 속성 적용
    if(cellDataArr[4]==="파트장") {
      $templateContent.find('#adminInsertSelectDepth3').attr("disabled", false);
    } else if(cellDataArr[4]==="팀장") {
      $templateContent.find('#adminInsertSelectDepth3').attr("disabled", true);
    }
    
    if (cellDataArr[5]==="Y") {
      $templateContent.find('#adminInsertSelectDepth4').attr("disabled", false);
    } else if(cellDataArr[5]==="N") {
      $templateContent.find('#adminInsertSelectDepth4').attr("disabled", true);
    }
  } else if (formName==="member") {
    $templateContent.find('#memberInsertSelectDepth1 option[value="' + cellDataArr[1] + '"]').attr("selected", "selected");
    if(cellDataArr[1]==="Search&Monitoring") {
      $templateContent.find('#memberInsertSelectDepth2').children("option:not(:first)").remove();
      for(let i=0; i<team.length; i++){
        $templateContent.find('#memberInsertSelectDepth2').append("<option value="+team[i]+">"+team[i]+"</option>");
      }
    } else if(cellDataArr[1]==="NA") {
      $templateContent.find('#memberInsertSelectDepth2').children("option:not(:first)").remove();
      $templateContent.find('#memberInsertSelectDepth3').children("option:not(:first)").remove();
    }

    $templateContent.find('#memberInsertSelectDepth2 option[value="' + cellDataArr[2] + '"]').attr("selected", "selected");
    if(cellDataArr[2]==="대중문화운영팀") {
      $templateContent.find('#memberInsertSelectDepth3').children("option:not(:first)").remove();
      for(let i=0; i<departmentPopular.length; i++){
        $templateContent.find('#memberInsertSelectDepth3').append("<option value="+departmentPopular[i]+">"+departmentPopular[i]+"</option>");
      }
    } else if (cellDataArr[2]==="네이버운영지원1팀") {
      $templateContent.find('#memberInsertSelectDepth3').children("option:not(:first)").remove();
      for(let i=0; i<department1team.length; i++){
        $templateContent.find('#memberInsertSelectDepth3').append("<option value="+department1team[i]+">"+department1team[i]+"</option>");
      }
    } else if (cellDataArr[2]==="네이버운영지원2팀") {
      $templateContent.find('#memberInsertSelectDepth3').children("option:not(:first)").remove();
      for(let i=0; i<department2team.length; i++){
        $templateContent.find('#memberInsertSelectDepth3').append("<option value="+department2team[i]+">"+department2team[i]+"</option>");
      }
    } else if (cellDataArr[2]==="UGC모니터링팀") {
      $templateContent.find('#memberInsertSelectDepth3').children("option:not(:first)").remove();
      for(let i=0; i<departmentUgc.length; i++){
        $templateContent.find('#memberInsertSelectDepth3').append("<option value="+departmentUgc[i]+">"+departmentUgc[i]+"</option>");
      }
    } else if (cellDataArr[2]==="AI학습지원센터") {
      $templateContent.find('#memberInsertSelectDepth3').children("option:not(:first)").remove();
      for(let i=0; i<departmentAi.length; i++){
        $templateContent.find('#memberInsertSelectDepth3').append("<option value="+departmentAi[i]+">"+departmentAi[i]+"</option>");
      }
    } else {
      $templateContent.find('#memberInsertSelectDepth3').children("option:not(:first)").remove();
    }
    $templateContent.find('#memberInsertSelectDepth3 option[value="' + cellDataArr[3] + '"]').attr("selected", "selected");
    $templateContent.find("#memberEmployee").attr('value', cellDataArr[4]);
    $templateContent.find("#memberName").attr('value', cellDataArr[5]);
    $templateContent.find("#memberJoinDate").attr('value', cellDataArr[6]);
    $templateContent.find('#memberPlace option[value="' + cellDataArr[7] + '"]').attr("selected", "selected");
    $templateContent.find("#memberSwitchingMonth").attr('value', cellDataArr[8]);
    $templateContent.find("#memberEtc").attr('value', cellDataArr[9]);
  } else if(formName==="seat") {
    $templateContent.find("#seatNum").attr('value', cellDataArr[1]);
    $templateContent.find("#seatManager").attr('value', cellDataArr[2]);
    $templateContent.find('#seatType option[value="' + cellDataArr[3] + '"]').attr("selected", "selected");
    $templateContent.find("#seatIP").attr('value', cellDataArr[4]);
    $templateContent.find("#seatName").attr('value', cellDataArr[5]);
    $templateContent.find('#seatSecurity option[value="' + cellDataArr[6] + '"]').attr("selected", "selected");
    $templateContent.find("#seatSecurityInfo1").attr('value', cellDataArr[7]);
    $templateContent.find("#seatSecurityInfo2").attr('value', cellDataArr[8]);
    $templateContent.find("#seatEtc").attr('value', cellDataArr[9]);
  }
  row.append($templateContent.html());
}

// 수정 창의 취소 버튼을 누르면 없어지는 이벤트
$(document).on('click', '#cancelButton', function(){
  $("div").remove("#inputDataFormModify");
});

// 수정 창 외를 클릭하면 없어지는 이벤트
$('html').click(function(e){
  if($(e.target).parents("#inputDataFormModify").length < 1){
    $("div").remove("#inputDataFormModify");
  }
});

//수정창에서 입사일을 클릭하면 데이터 픽커 나오게 하기
$(document).on('focus', '#memberJoinDate', function(){
  $(this).datepicker({
    monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'], //달력의 월 부분 텍스트
    monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'], //달력의 월 부분 Tooltip 텍스트
    dayNamesMin: ['일','월','화','수','목','금','토'], //달력의 요일 부분 텍스트
    dayNamesShort: ['일','월','화','수','목','금','토'],
    dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'], //달력의 요일 부분 Tooltip 텍스트
    dateFormat: 'yy-mm-dd'
  });
});

$(document).ready(function(){
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

  $("#changeDate").datepicker({
    monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'], //달력의 월 부분 텍스트
    monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'], //달력의 월 부분 Tooltip 텍스트
    dayNamesMin: ['일','월','화','수','목','금','토'], //달력의 요일 부분 텍스트
    dayNamesShort: ['일','월','화','수','목','금','토'],
    dayNames: ['일요일','월요일','화요일','수요일','목요일','금요일','토요일'], //달력의 요일 부분 Tooltip 텍스트
    dateFormat: 'yy-mm-dd'
  });

  //신규등록 버튼 클릭 시 등록 폼 보이기
  $("#dataAddBtn").click(function(){
    let table=$("#tableBody");
    let $clonedTemplate=$("#inputDataFormTmp").clone(true);
    let $templateContent=$($clonedTemplate.html());
    let btnStats=$("#dataAddBtn").val();
    if(btnStats === "insert") {
      $templateContent.find("#inputDataForm").attr("id", "inputDataFormInsert")
      $templateContent.find("#inputButton").attr("name", "insertInputAction")//액션 버튼에 이름 바꾸기
      $templateContent.find("#cancelButton").attr("name", "insertCancelAction")//액션 버튼에 이름 바꾸기
      table.prepend($templateContent.html());
      data_btn_cancel();

    } else if(btnStats === "cancel") {
      $("#inputDataFormInsert").remove();
      data_btn_insert();
    }
  });
    
  //검색 기능
  $("input[name=quickSearch]").on("keyup", function(){
    let value=$(this).val().toLowerCase();
    $(".table-row").filter(function(){
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


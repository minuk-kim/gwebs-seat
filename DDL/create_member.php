<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>테이블 생성</title>
</head>
<body>
  <b>인원 테이블(member) 생성</b></p>

  <?php
    //MySQL 서버와 데이터베이스 연결(connect server & database)
    include "../include/connect_login_db_check.php";

    //SQL 질의어 처리(perform SQL query(DDL, DML))
    $sql="CREATE TABLE member (
      mem_num             INT AUTO_INCREMENT NOT NULL,
      mem_employee        varchar(10) NOT NULL,
      mem_pw              varchar(13),
      mem_name            varchar(15) NOT NULL,
      mem_office          varchar(30) NOT NULL,
      mem_team            varchar(30) NOT NULL,
      mem_department      varchar(30),
      mem_join_date       date NOT NULL,
      PRIMARY KEY (mem_num, mem_employee))";
    $result=mysqli_query($conn, $sql);

    if ($result) {
      printf("인원테이블 생성 성공!");
    } else {
      printf("인원테이블 생성 실패!<br>%s", mysqli_error($conn));
    }
  ?>
</body>
</html>
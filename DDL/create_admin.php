<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>테이블 생성</title>
</head>
<body>
  <b>관리자 테이블(admin) 생성</b></p>

  <?php
    //MySQL 서버와 데이터베이스 연결(connect server & database)
    include "../include/connect_login_db_check.php";

    //SQL 질의어 처리(perform SQL query(DDL, DML))
    $sql="CREATE TABLE administrator (
      admin_num             INT AUTO_INCREMENT NOT NULL,
      admin_employee        varchar(10) NOT NULL,
      admin_pw              varchar(13) NOT NULL,
      admin_name            varchar(15) NOT NULL,
      admin_position        varchar(15) NOT NULL,
      admin_concurrent      char(1) NOT NULL,
      admin_office          varchar(30) NOT NULL,
      admin_team            varchar(30) NOT NULL,
      admin_department      varchar(30),
      admin_department2     varchar(30),
      admin_level           char(1) NOT NULL,
      PRIMARY KEY(admin_num, admin_employee))";
    $result=mysqli_query($conn, $sql);
    if ($result) {
      printf("인원테이블 생성 성공!");
    } else {
      printf("인원테이블 생성 실패!<br>%s", mysqli_error($conn));
    }
  ?>
</body>
</html>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>테이블 생성</title>
</head>
<body>
  <b>좌석 테이블(seat) 생성</b></p>

  <?php
    //MySQL 서버와 데이터베이스 연결(connect server & database)
    include "../include/connect_login_db_check.php";

    //SQL 질의어 처리(perform SQL query(DDL, DML))
    $sql="CREATE TABLE seat (
      seat_num              smallint NOT NULL,
      seat_type             varchar(10) NOT NULL,
      seat_name             varchar(20),
      seat_ip               varchar(20),
      seat_security         char(1),
      seat_security_info1   varchar(100),
      seat_security_info2   varchar(100),
      PRIMARY KEY(seat_num))";
    $result=mysqli_query($conn, $sql);

    if ($result) {
      printf("좌석 테이블 생성 성공!");
    } else {
      printf("좌석 테이블 생성 실패!<br>%s", mysqli_error($conn));
    }
  ?>
</body>
</html>
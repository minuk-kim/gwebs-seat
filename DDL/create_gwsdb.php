<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>데이터베이스 생성</title>
</head>
<body>
  <b>그린웹 데이터베이스(gwsdb) 생성</b></p>

  <?php
    //My SQL 서버 연결(connect server)
    include "../include/connect_login_check.php";

    //SQL 질의어 처리(perform SQL query(DDL, DML))
    $sql="CREATE DATABASE gwsdb";
    $result=mysqli_query($conn, $sql);

    if ($result) {
      printf("데이터베이스 생성 성공!");
    } else {
      printf("데이터베이스 생성 실패!<br>%s", mysqli_error($conn));
    }

    //데이터 베이스 연결 종료(close connection)
    mysqli_close($conn);
  ?>
  
</body>
</html>
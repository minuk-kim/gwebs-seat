<?php
  //MySQL 서버 연결(connect server)

  $conn=mysqli_connect("localhost", "root", "120805", "gwsdb");

  if (mysqli_connect_errno()) {
    printf("MySQL 서버 연결 실패!<Br>%s", mysqli_connect_error());
    exit();
  }
  
?>
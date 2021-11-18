<?php
  include "./include/inc_head.php";

  if ($jb_login) {
    echo("
    <script>
    window.alert('이미 로그인했습니다.')
    location.href = 'index.php';
    </script>
    ");
  } else {
    $adminEmployee=$_POST['adminEmployee'];
    $adminPassword=$_POST['adminPW'];

    $connect=mysqli_connect("localhost", "root", "120805", "gwsdb");
    $query="SELECT * FROM administrator WHERE admin_employee='$adminEmployee'";
    $result=mysqli_query($connect, $query);
    $num_match = mysqli_num_rows($result);

    if(!$num_match) {
      echo("
    <script>
    window.alert('등록되지 않은 아이디입니다!')
    history.go(-1)
    </script>
    ");
    } else {
      $row = mysqli_fetch_array($result);
      $db_pw = $row["admin_pw"];
      $db_level = $row["admin_level"];

      mysqli_close($connect);

      if($adminPassword != $db_pw){
        echo("
        <script>
        window.alert('비밀번호가 다릅니다!')
        history.go(-1)
        </script>
        ");
        exit;
      }else {
        session_start();
        $_SESSION["adminEmployee"] = $row["admin_employee"];
        $_SESSION["adminName"] = $row["admin_name"];
        $_SESSION["adminLevel"] = $row["admin_level"];
        $_SESSION["adminPosition"] = $row["admin_position"];
        $_SESSION["adminConcurrent"] = $row["admin_concurrent"];
        $_SESSION["adminTeam"] = $row["admin_team"];
        $_SESSION["adminDepartment"] = $row["admin_department"];
        $_SESSION["adminDepartment2"] = $row["admin_department2"];
        echo("
        <script>
        location.href = 'index.php';
        </script>
        ");
      }
    }
  }

?>
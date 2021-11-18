<?php
  include 'crud.php';
  $object=new Crud();

  if(isset($_POST["action"])) {
    //어드민 리스트 조회
    if($_POST["action"]=="adminListLoad") {
      echo $object->get_admin_data_in_table("SELECT * FROM administrator ORDER BY admin_num DESC");
    }

    //멤버 리스트 조회
    if($_POST["action"]=="memberListLoad") {
      $memberTeam=mysqli_real_escape_string($object->connect, $_POST["userTeam"]);
      $memberDepartment=mysqli_real_escape_string($object->connect, $_POST["userDepartment"]);
      $memberDepartment2=mysqli_real_escape_string($object->connect, $_POST["userDepartment2"]);
      if($_POST["userPosition"]=="팀장") {
        echo $object->get_member_data_in_table("SELECT * FROM member WHERE mem_team='$memberTeam'");
      } else if ($_POST["userPosition"]=="파트장" && $_POST["userConcurrent"]=="Y") {
        echo $object->get_member_data_in_table("SELECT * FROM member WHERE mem_department='$memberDepartment' OR mem_department='$memberDepartment2'");
      } else if ($_POST["userPosition"]=="파트장" && $_POST["userConcurrent"]=="N") {
        echo $object->get_member_data_in_table("SELECT * FROM member WHERE mem_department='$memberDepartment'");
      }
    }

    //좌석 리스트 조회
    if($_POST["action"]=="seatListLoad") {
      echo $object->get_seat_data_in_table("SELECT * FROM seat ORDER BY seat_num");
    }

    //좌석 입력
    if($_POST["action"]=="seatInsert") {
      $seatNum=mysqli_real_escape_string($object->connect, $_POST["seatNum"]);
      $seatManager=mysqli_real_escape_string($object->connect, $_POST["seatManager"]);
      $seatType=mysqli_real_escape_string($object->connect, $_POST["seatType"]);
      $seatIP=mysqli_real_escape_string($object->connect, $_POST["seatIP"]);
      $seatName=mysqli_real_escape_string($object->connect, $_POST["seatName"]);
      $seatSecurity=mysqli_real_escape_string($object->connect, $_POST["seatSecurity"]);
      $seatSecurityInfo1=mysqli_real_escape_string($object->connect, $_POST["seatSecurityInfo1"]);
      $seatSecurityInfo2=mysqli_real_escape_string($object->connect, $_POST["seatSecurityInfo2"]);
      $seatEtc=mysqli_real_escape_string($object->connect, $_POST["seatEtc"]);

      //데이터 등록 중복아이디 확인하기 포함
      $query="SELECT * FROM seat WHERE seat_num='$seatNum'";
      $result=$object->execute_query($query);
      if(mysqli_num_rows($result)>0) {
        echo "false";
      } else {
        $query="INSERT
                INTO seat (seat_num, seat_type, seat_name, seat_ip, seat_security, seat_security_info1, seat_security_info2, seat_manager, seat_etc)
                VALUES ('".$seatNum."','".$seatType."','".$seatName."','".$seatIP."','".$seatSecurity."','".$seatSecurityInfo1."','".$seatSecurityInfo2."','".$seatManager."','".$seatEtc."')";
        $object->execute_query($query);
        echo "success";
      }
    }

    //관리자 입력
    if($_POST["action"]=="adminInsert") {
      $adminEmployee=mysqli_real_escape_string($object->connect, $_POST["adminEmployee"]);
      $adminPW=mysqli_real_escape_string($object->connect, $_POST["adminPW"]);
      $adminName=mysqli_real_escape_string($object->connect, $_POST["adminName"]);
      $adminPosition=mysqli_real_escape_string($object->connect, $_POST["adminPosition"]);
      $adminConcurrent=mysqli_real_escape_string($object->connect, $_POST["adminConcurrent"]);
      $adminOffice=mysqli_real_escape_string($object->connect, $_POST["adminOffice"]);
      $adminTeam=mysqli_real_escape_string($object->connect, $_POST["adminTeam"]);
      $adminDepartment=mysqli_real_escape_string($object->connect, $_POST["adminDepartment"]);
      $adminDepartment2=mysqli_real_escape_string($object->connect, $_POST["adminDepartment2"]);
      $adminLevel=mysqli_real_escape_string($object->connect, $_POST["adminLevel"]);

      //데이터 등록 중복아이디 확인하기 포함
      $query="SELECT * FROM administrator WHERE admin_employee='$adminEmployee'";
      $result=$object->execute_query($query);
      if(mysqli_num_rows($result)>0) {
        echo "false";
      } else {
        $query="INSERT
                INTO administrator (admin_employee, admin_pw, admin_name, admin_position, admin_concurrent, admin_office, admin_team, admin_department, admin_department2, admin_level)
                VALUES ('".$adminEmployee."','".$adminPW."','".$adminName."','".$adminPosition."','".$adminConcurrent."','".$adminOffice."','".$adminTeam."','".$adminDepartment."','".$adminDepartment2."','".$adminLevel."')";
        $object->execute_query($query);
        echo "success";
      }
    }

    //인원 등록하기
    if($_POST["action"]=="memberInsert") {
      $memberOffice=mysqli_real_escape_string($object->connect, $_POST["memberOffice"]);
      $memberTeam=mysqli_real_escape_string($object->connect, $_POST["memberTeam"]);
      $memberDepartment=mysqli_real_escape_string($object->connect, $_POST["memberDepartment"]);
      $memberEmployee=mysqli_real_escape_string($object->connect, $_POST["memberEmployee"]);
      $memberName=mysqli_real_escape_string($object->connect, $_POST["memberName"]);
      $memberJoinDate=mysqli_real_escape_string($object->connect, $_POST["memberJoinDate"]);
      $memberPlace=mysqli_real_escape_string($object->connect, $_POST["memberPlace"]);
      $memberEtc=mysqli_real_escape_string($object->connect, $_POST["memberEtc"]);

      //데이터 등록 중복아이디 확인하기 포함
      $query="SELECT * FROM member WHERE mem_employee='$memberEmployee'";
      $result=$object->execute_query($query);
      if(mysqli_num_rows($result)>0) {
        echo "false";
      } else {
        $query="INSERT
                INTO member (mem_employee, mem_name, mem_office, mem_team, mem_department, mem_join_date, mem_etc, mem_place)
                VALUES ('".$memberEmployee."','".$memberName."','".$memberOffice."','".$memberTeam."','".$memberDepartment."','".$memberJoinDate."','".$memberEtc."','".$memberPlace."')";
        $object->execute_query($query);
        echo "success";
      }
    }

    //관리자 삭제
    if($_POST["action"]=="adminDelete") {
      $adminEmployee=mysqli_real_escape_string($object->connect, $_POST["adminEmployee"]);
      $query="DELETE FROM administrator WHERE admin_employee='$adminEmployee'";
      $object->execute_query($query);
      echo "success";
    }
    //인원 삭제
    if($_POST["action"]=="memberDelete") {
      $memberEmployee=mysqli_real_escape_string($object->connect, $_POST["memberEmployee"]);
      $query="DELETE FROM member WHERE mem_employee='$memberEmployee'";
      $object->execute_query($query);
      echo "success";
    }

    //좌석 삭제
    if($_POST["action"]=="seatDelete") {
      $seatNum=mysqli_real_escape_string($object->connect, $_POST["seatNum"]);
      $query="DELETE FROM seat WHERE seat_num='$seatNum'";
      $object->execute_query($query);
      echo "success";
    }

    //관리자 수정
    if($_POST["action"]=="adminUpdate") {
      $adminEmployee=mysqli_real_escape_string($object->connect, $_POST["adminEmployee"]);
      $adminPW=mysqli_real_escape_string($object->connect, $_POST["adminPW"]);
      $adminName=mysqli_real_escape_string($object->connect, $_POST["adminName"]);
      $adminPosition=mysqli_real_escape_string($object->connect, $_POST["adminPosition"]);
      $adminConcurrent=mysqli_real_escape_string($object->connect, $_POST["adminConcurrent"]);
      $adminOffice=mysqli_real_escape_string($object->connect, $_POST["adminOffice"]);
      $adminTeam=mysqli_real_escape_string($object->connect, $_POST["adminTeam"]);
      $adminDepartment=mysqli_real_escape_string($object->connect, $_POST["adminDepartment"]);
      $adminDepartment2=mysqli_real_escape_string($object->connect, $_POST["adminDepartment2"]);
      $adminLevel=mysqli_real_escape_string($object->connect, $_POST["adminLevel"]);

      $query="UPDATE administrator SET admin_pw='".$adminPW."', admin_name='".$adminName."', admin_position='".$adminPosition."', admin_concurrent='".$adminConcurrent."', admin_office='".$adminOffice."', admin_team='".$adminTeam."', admin_department='".$adminDepartment."', admin_department2='".$adminDepartment2."', admin_level='".$adminLevel."' WHERE admin_employee='".$adminEmployee."'";
      $object->execute_query($query);
      echo "success";
    }

    //멤버 수정
    if($_POST["action"]=="memberUpdate") {
      $memberOffice=mysqli_real_escape_string($object->connect, $_POST["memberOffice"]);
      $memberTeam=mysqli_real_escape_string($object->connect, $_POST["memberTeam"]);
      $memberDepartment=mysqli_real_escape_string($object->connect, $_POST["memberDepartment"]);
      $memberEmployee=mysqli_real_escape_string($object->connect, $_POST["memberEmployee"]);
      $memberName=mysqli_real_escape_string($object->connect, $_POST["memberName"]);
      $memberJoinDate=mysqli_real_escape_string($object->connect, $_POST["memberJoinDate"]);
      $memberPlace=mysqli_real_escape_string($object->connect, $_POST["memberPlace"]);
      $memberEtc=mysqli_real_escape_string($object->connect, $_POST["memberEtc"]);

      $query="UPDATE member SET mem_name='".$memberName."', mem_office='".$memberOffice."', mem_team='".$memberTeam."', mem_department='".$memberDepartment."', mem_join_date='".$memberJoinDate."', mem_etc='".$memberEtc."', mem_place='".$memberPlace."' WHERE mem_employee='".$memberEmployee."'";
      $object->execute_query($query);
      echo "success";
    }

    //좌석 수정
    if($_POST["action"]=="seatUpdate") {
      $seatNum=mysqli_real_escape_string($object->connect, $_POST["seatNum"]);
      $seatManager=mysqli_real_escape_string($object->connect, $_POST["seatManager"]);
      $seatType=mysqli_real_escape_string($object->connect, $_POST["seatType"]);
      $seatIP=mysqli_real_escape_string($object->connect, $_POST["seatIP"]);
      $seatName=mysqli_real_escape_string($object->connect, $_POST["seatName"]);
      $seatSecurity=mysqli_real_escape_string($object->connect, $_POST["seatSecurity"]);
      $seatSecurityInfo1=mysqli_real_escape_string($object->connect, $_POST["seatSecurityInfo1"]);
      $seatSecurityInfo2=mysqli_real_escape_string($object->connect, $_POST["seatSecurityInfo2"]);
      $seatEtc=mysqli_real_escape_string($object->connect, $_POST["seatEtc"]);

      $query="UPDATE seat SET seat_type='".$seatType."', seat_name='".$seatName."', seat_ip='".$seatIP."', seat_security='".$seatSecurity."', seat_security_info1='".$seatSecurityInfo1."', seat_security_info2='".$seatSecurityInfo2."', seat_manager='".$seatManager."', seat_etc='".$seatEtc."' WHERE seat_num='".$seatNum."'";
      $object->execute_query($query);
      echo "success";
    }
  }
?>
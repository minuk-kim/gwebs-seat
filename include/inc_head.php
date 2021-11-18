<?php
  session_start();
  $jb_login='';
  if(isset($_SESSION['adminEmployee'])) {
    $jb_login=TRUE;
  }
?>
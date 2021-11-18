<?php
  include './include/inc_head.php';
  session_destroy();
  header( 'Location: login.php' );
?>
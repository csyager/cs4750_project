<?php
  session_start();
  unset($_SESSION['username']);
  unset($_SESSION['valid']);
  header("Location: index.php");
 ?>

<?php
include("api/config.php");
session_start();

$ses_dest = session_destroy();
if ($ses_dest) {
  echo "<script>location.href='index.php'</script>";
}
?>
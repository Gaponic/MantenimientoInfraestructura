<?php
require_once("DBController.php");
$db_handle = new DBController();


if(!empty($_POST["user"])) {
  $query = "SELECT * FROM users WHERE user='" . $_POST["user"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario' style='font-weight:bold;'> Usuario ya Existente.</span>";
  }else{
      echo "<span class='estado-disponible-usuario' style='font-weight:bold;'> Usuario Disponible.</span>";
  }
}

if(!empty($_POST["email"])) {
  $query = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-email' style='font-weight:bold;'> Email ya Existente.</span>";
  }else{
      echo "<span class='estado-disponible-email' style='font-weight:bold;'> Email Disponible.</span>";
  }
}

if(!empty($_POST["serial"])) {
  $query = "SELECT * FROM fichatecnica WHERE id_serial='" . $_POST["serial"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-email' style='font-weight:bold;'> Serial ya Existe.</span>";
  }else{
      echo "<span class='estado-disponible-email' style='font-weight:bold;'>Serial Disponible.</span>";
  }
}
?>
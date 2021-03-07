<?php
include('conn.php');
if (isset($_POST['id'])){
  $id = $_POST['id'];
  $delete = "DELETE FROM Personnel WHERE id='$id'";
  $conn->query($delete);
}
?>
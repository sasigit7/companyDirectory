<?php 
include ('conn.php');
 if(isset($_POST['old_department'])){
    $old_department = $_POST['old_department'];
	 $new_department = $_POST['new_department'];
    $update_department = "UPDATE department SET name = '$new_department' WHERE name = '$old_department'";
    $run = mysqli_query($conn, $update_department);
     echo $run ? json_encode(['status' => 'success']) : json_encode(['status' => 'error']);
 }
?>
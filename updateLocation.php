<?php 
include ('conn.php');
 if(isset($_POST['old_location'])){
    $old_location = $_POST['old_location'];
	 $new_location = $_POST['new_location'];
    $update_location = "UPDATE location SET name = '$new_location' WHERE name = '$old_location'";
    $run = mysqli_query($conn, $update_location);
     echo $run ? json_encode(['status' => 'success']) : json_encode(['status' => 'error']);
 }
?>
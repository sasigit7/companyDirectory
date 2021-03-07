<?php 
include ('conn.php');
 if(isset($_POST['department'])){
    $department = $_POST['department'];
	 $loc_id = $_POST['location'];
    $insert_department = "INSERT INTO department(name,locationID) VALUES ('$department','$loc_id')";
    $run = $conn->query($insert_department);
    echo $run ? json_encode(['status' => 'success']) : (['status' => 'error']);
 }
?>
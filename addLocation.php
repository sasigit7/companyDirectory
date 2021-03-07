<?php 
include ('conn.php');
 if(isset($_POST['location'])){
    $location = $_POST['location'];
    $insert_location = "INSERT INTO location(name) VALUES ('$location')";
    $run = $conn->query($insert_location);
    echo $run ? json_encode(['status' => 'success']) : (['status' => 'error']);
 }
?>
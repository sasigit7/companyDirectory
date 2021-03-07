<?php 
include ('conn.php');
 if(isset($_POST['delete_loc'])){
    $delete_location = $_POST['delete_loc'];
    $delete_query_loc = "DELETE FROM location WHERE name = '$delete_location'";
    $run = mysqli_query($conn, $delete_query_loc);
     echo $run ? json_encode(['status' => 'success']) : json_encode(['status' => 'error']);
 }
?>
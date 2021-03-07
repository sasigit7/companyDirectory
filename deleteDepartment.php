<?php 
include ('conn.php');
 if(isset($_POST['delete_department'])){
    $delete_department = $_POST['delete_department'];
    $delete_query = "DELETE FROM department WHERE name = '$delete_department'";
    $run = mysqli_query($conn, $delete_query);
     echo $run ? json_encode(['status' => 'success']) : json_encode(['status' => 'error']);
 }
?>
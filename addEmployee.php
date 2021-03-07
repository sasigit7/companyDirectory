<?php 
include ('conn.php');
 if(isset($_POST['fname'])){
    $fname = $_POST['fname'];
	 $lname = $_POST['lname'];
	 $job_title = $_POST['job_title'];
	 $email = $_POST['email'];
	 $dept = $_POST['dept'];
    $location = $_POST['location'];
	 
    $insert_employee = "INSERT INTO personnel (firstName, lastName, jobTitle, email, departmentID, location) VALUES ('$fname','$lname','$job_title','$email','$dept','$location')";
	 
    $run = $conn->query($insert_employee);
    echo $run ? json_encode(['status' => 'success']) : (['status' => 'error']);
 }
?>
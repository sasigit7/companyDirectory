<?php
include ('conn.php');
 if (isset($_POST['eid'])) {
        // $eid = $_POST['eid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $jobtitle = $_POST['jobtitle'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $department = $_POST['department'];
     
        $update = "UPDATE personnel, department, location 
    SET personnel.firstname = '$firstname',
        personnel.lastname =  '$lastname', 
        personnel.jobtitle = '$jobtitle',
        personnel.email = '$email',
		personnel.location = '$location',
        department.name = '$department',
        location.name = '$location'
        WHERE personnel.departmentID = department.id AND
        department.locationID = location.id AND
        personnel.id = '$eid'";

        $run = $conn->query($update);

        echo $run ? json_encode(['status' => 'success']) : json_encode(['status' => 'error']);
}
?>
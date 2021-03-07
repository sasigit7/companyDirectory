 <?php 
    include ('conn.php');
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "SELECT p.id, p.lastName, p.firstName, p.jobTitle, p.email, d.name as department, l.name 
        as location FROM personnel p 
        LEFT JOIN department d ON (d.id = p.departmentID) 
        LEFT JOIN location l ON (l.id = d.locationID) 
        WHERE p.id = $id
        ORDER BY p.id, p.lastName, p.firstName, p.jobTitle, p.email, d.name, l.name";
        
        $result = $conn->query($query);
        $r = $result->fetch_object();
       
        // The json_encode() function is an inbuilt function in PHP which is used to convert PHP array 
        // or object into JSON representation.
       echo json_encode($r); 
    }
?>
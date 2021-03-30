<?php 
    include ('conn.php');
    // echo $_POST['emp'];
    // if (isset($_POST['emp'])) {
     // $emp = $_POST['emp'];
        $query = "SELECT p.id, p.firstName, p.lastName, p.jobTitle, p.email, d.name as department, l.name 
        as location FROM personnel p 
        LEFT JOIN department d ON (d.id = p.departmentID) 
        LEFT JOIN location l ON (l.id = d.locationID) 
        ORDER BY p.firstName, p.lastName, d.name, l.name";
        
        $result = $conn->query($query);
    
        // $resultEmp = $result->fetch_object();
        // print_r($resultEmp);

        while($r=$result->fetch_object()) {
            // print_r($resultEmp);
            ?>

<div class="col-lg-4 col-md-5 col-sm-6">
    <div class="card-box">
        <div class="update-btn" style="height: 630px;">
            <div class="#">
                <img src="Assets/images/unisexAvatar.jpg" class="img-thumbnail img-fluid" alt="">
                <!-- Edit Button trigger modal -->
                <a href="#" class="update-bottom" id="editEmp" data-id="<?php echo $r-> id;?>" data-toggle="modal"
                    data-target="#exampleModal">
                    <i class="fa fa-fw fa-edit"></i>Update
                </a>
            </div>
            <div class="#">
                <div class="#">
                    <div class="#">
                        <div class="updDelBox">
                            <h2>
                                <?php echo $r->firstName; ?>
                                <?php echo $r->lastName; ?>

                            </h2>
                            <hr>
                            <div class="mt-1">
                                Job Title:
                                <span class="titleHead"><?php echo $r->jobTitle; ?></span>
                            </div>
                            <div class="mt-1">
                                Email:
                                <span class="titleHead "><?php echo $r->email; ?></span>
                            </div>
                            <div class="mt-1">
                                Department:
                                <span class="titleHead "><?php echo $r->department; ?></span>
                            </div>
                            <div class="mt-1">
                                Location:
                                <span class="titleHead "><?php echo $r->location; ?></span>
                            </div>
                            <hr>
                            <div class="mt-1">
                                <button type="submit" data-id="<?php echo $r->id; ?>" class="btn btn-danger deleteEmp"
                                    value="Delete" name="">
                                    <i class="fa fa-fw fa-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php
}
//}

?>
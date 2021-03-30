<?php include('conn.php');
// The LEFT JOIN keyword returns all records from the left table (table1), and the matched records from the right table (table2). The result is NULL from the right side, if there is no match.
$query = 'SELECT p.id, p.firstName, p.lastName, p.jobTitle, p.email, d.name as department, l.name as location FROM personnel p LEFT JOIN department d ON (d.id = p.departmentID) LEFT JOIN location l ON (l.id = d.locationID) ORDER BY p.firstName, p.lastName, d.name, l.name';
// Execute/Perform the query on the database
$result = $conn->query($query);
// Check whether the data is coming from the database on to the page dynamically by using the while loop 
// while($r=$result->fetch_object()) {
//     print_r($r);
// }
?>
<!DOCTYPE html>
<html lang="en">
<!-- Header Links -->
<?php include('headerLinks.php'); ?>
<!-- // Header Links -->

<body>
    <!-- Back to top button -->
    <a id="button"></a>
    <!-- Container-->
    <div class="container">
        <!--header-->
        <?php include('header.php'); ?>
        <!--//header-->
        <!-- short -->
        <div class="using-border py-5"></div>
        <!-- //short-->
        <!-- Section Start-->
        <section class="py-lg-4 py-md-3 py-sm-3 py-3">
            <!-- Get data dynamically on cards -->
            <div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
                <div class="row empData">
                    <?php while($r=$result->fetch_object()) { ?>
                    <div class="col-lg-4 col-md-5 col-sm-6">
                        <div class="card-box">
                            <div class="update-btn">
                                <div class="#">
                                    <img src="Assets/images/unisexAvatar.jpg" class="img-thumbnail img-fluid" alt="">
                                    <!-- Edit Button trigger modal -->
                                    <a href="#" class="update-bottom" id="editEmp" data-id="<?php echo $r-> id;?>"
                                        data-toggle="modal" data-target="#exampleModal">
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
                                                    <button type="submit" data-id="<?php echo $r->id; ?>"
                                                        class="btn btn-danger deleteEmp" value="Delete" name="">
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
                    <?php }?>
                </div>
            </div>
    </div>
    </div>
    </section>
    <!-- //Section End-->
    <!-- Update Pop up Modal Start -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="#">Update Employee Record</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Edit Form Start -->
                    <form>
                        <!-- <div class="form-group">
                            <label for="#">ID</label>
                            <input type="text" class="form-control" id="eid" aria-describedby="eid" readonly>
                        </div> -->
                        <div class="form-group">
                            <label for="#">First Name</label>
                            <input type="text" class="form-control" id="firstname" aria-describedby="firstname">
                        </div>
                        <div class="form-group">
                            <label for="#">Last Name</label>
                            <input type="text" class="form-control" id="lastname" aria-describedby="lastname">
                        </div>

                        <div class="form-group">
                            <label for="#">Job Title</label>
                            <input type="text" class="form-control" id="jobtitle" aria-describedby="jobtitle"
                                placeholder="Enter Job Title">
                        </div>
                        <div class="form-group">
                            <label for="#">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="email">
                        </div>


                        <div class="form-group">
                            <label>Department</label>

                            <?php
							$dep_query = "SELECT * FROM department";
							$dep_result = $conn->query($dep_query);
							echo "<select id='department' class='form-control'>
							<option value=''>Select Department</option>";
							while($row=$dep_result->fetch_object())
							{
								echo "<option value='$row->id'>$row->name</option>";
							}
							echo "</select>";
							?>
                            <!-- <input type="text" class="form-control" id="department" aria-describedby="department"> -->
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <?php
							$loc_query = "SELECT * FROM location";
							$loc_result = $conn->query($loc_query);
							echo "<select id='location' class='form-control'>
							<option value=''>Select Location</option>";
							while($row=$loc_result->fetch_object())
							{
								echo "<option value='$row->id'>$row->name</option>";
							}
							echo "</select>";
							?>
                            <!-- <input type="text" class="form-control" id="location" aria-describedby="location"> -->
                        </div>
                        <button type="submit" id="updateEmp" class="btn btn-primary">Update</button>
                    </form>
                    <!-- Edit Form End-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Pop up Modal End -->
    <!-- Add Employee Details Pop up Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="AddEmployee">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Employee Record</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">

                            <input type="text" class="form-control" id="emp_firstname" value=""
                                placeholder="First Name">
                            <br>
                            <input type="text" class="form-control" id="emp_lastname" value="" placeholder="Last Name">
                            <br>
                            <input type="text" class="form-control" id="emp_jobTitle" value="" placeholder="Job Title">
                            <br>
                            <input type="text" class="form-control" id="emp_email" value="" placeholder="Email">
                            <br>
                            <?php
							$dep_query = "SELECT * FROM department";
							$dep_result = $conn->query($dep_query);
							echo "<select id='dept' class='form-control'>
							<option value=''>Select Department</option>";
							while($row=$dep_result->fetch_object())
							{
								echo "<option value='$row->id'>$row->name</option>";
							}
							echo "</select>";
							?>
                            <br>
                            <?php
							$loc_query = "SELECT * FROM location";
							$loc_result = $conn->query($loc_query);
							echo "<select id='loc' class='form-control'>
							<option value=''>Select Location</option>";
							while($row=$loc_result->fetch_object())
							{
								echo "<option value='$row->id'>$row->name</option>";
							}
							echo "</select>";
							?>
                        </div>
                        <button type="submit" class="btn btn-primary" id="add_employee">Add</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Employee Details Pop up Modal End -->
    <!-- Add Department Pop up Modal Start -->
    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="AddDepartment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Department</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="#">Department</label>
                            <input type="text" class="form-control" id="departmentAdd" value=""
                                placeholder="Add New Department Name">
                            <br>
                            <?php
							$add_loc_query = "SELECT * FROM location";
							$add_loc_result = $conn->query($add_loc_query);
							echo "<select id='loc' class='form-control'>
							<option value=''>Select Location</option>";
							while($row=$add_loc_result->fetch_object())
							{
								echo "<option value='$row->id'>$row->name</option>";
							}
							echo "</select>";
							?>
                        </div>
                        <button type="submit" class="btn btn-primary" id="add_department">Add</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Department Pop up Modal End  -->
    <!-- Update Department Pop up Modal Start -->
    <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="UpdateDepartment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Update Department</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <?php
							$Update_dept_query = "SELECT * FROM department";
							$update_dept_result = $conn->query($Update_dept_query);
							echo "<select id='old_dept' class='form-control'>
							<option value=''>Select Department</option>";
							while($row=$update_dept_result->fetch_object())
							{
								echo "<option value='$row->name'>$row->name</option>";
							}
							echo "</select>";
							?>
                            <br>
                            <input type="text" class="form-control" id="new_dept" value=""
                                placeholder="Update Department Name">
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary" id="update_department">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Department Pop up Modal End  -->
    <!-- Delete Department Pop up Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="DeleteDepartment">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Delete Department</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <?php
							$delete_dept_query = "SELECT * FROM department";
							$delete_dept_result = $conn->query($delete_dept_query);
							echo "<select id='delete_dept' class='form-control'>
							<option value=''>Select Department</option>";
							while($row=$delete_dept_result->fetch_object())
							{
								echo "<option value='$row->name'>$row->name</option>";
							}
							echo "</select>";
							?>
                        </div>
                        <button type="submit" class="btn btn-primary" id="delete_department">Delete</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Department Pop up Modal End  -->
    <!-- Add Location Pop up Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="AddLocation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Location</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="#">Location</label>
                            <input type="text" class="form-control" id="locationAdd" value=""
                                placeholder="Add New Location Name">
                        </div>
                        <button type="submit" class="btn btn-primary" id="add_location">Add</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Location Pop up Modal End  -->
    <!-- Update Location Pop up Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="UpdateLocation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Update Location</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <?php
							$update_loc_query = "SELECT * FROM location";
							$update_loc_result = $conn->query($update_loc_query);
							echo "<select id='old_location' class='form-control'>
							<option value=''>Select Location</option>";
							while($row=$update_loc_result->fetch_object())
							{
								echo "<option value='$row->name'>$row->name</option>";
							}
							echo "</select>";
							?>
                            <br>
                            <input type="text" class="form-control" id="new_location" value=""
                                placeholder="Update Location Name">
                        </div>
                        <button type="submit" class="btn btn-primary" id="update_location">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Location Pop up Modal End  -->
    <!-- Delete Location Pop up Modal Start -->
    <div class="modal" tabindex="-1" role="dialog" id="DeleteLocation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Delete Location</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <?php
							$loc_delete_query = "SELECT * FROM location";
							$loc_delete_result = $conn->query($loc_delete_query);
							echo "<select id='delete_loc' class='form-control'>
							<option value=''>Select Location</option>";
							while($row=$loc_delete_result->fetch_object())
							{
								echo "<option value='$row->name'>$row->name</option>";
							}
							echo "</select>";
							?>
                        </div>
                        <button type="submit" class="btn btn-primary" id="delete_location">Delete</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Location Pop up Modal End -->
    <!-- footer links-->
    <?php include('footerLinks.php'); ?>
    <!-- // footer links -->
    </div>

</body>

</html>
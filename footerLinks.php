<script src='Assets/js/jquery-2.2.3.min.js'></script>
<script src="Assets/js/bootstrap.min.js"></script>

<!-- Elasticsearch functionality Start -->
<script type="text/javascript">
$(document).on('keyup', '#search', function() {
    // console.log("Data loaded"); 
    let empName = $(this).val(); // Renders whatever we type on the search field
    //console.log(empName);
    createRecord(empName);
});

function createRecord(empName) {
    // console.log(empName);
    $.ajax({
        url: "<?php echo 'getByName.php'; ?>",
        data: {
            emp: empName
        },
        type: 'POST',
        success: function(res) {
            // console.log(res);
            $('.empData').html(res);
        }
    });
}
</script>
<!-- Elasticsearch functionality End -->

<!-- Add functionality Start -->
<script type="text/javascript">
// Add Employee Start 
$(document).on('click', '#add_employee', function(e) {
    e.preventDefault();
    //  alert("Add Employee Clicked");
    let fname = $('#emp_firstname').val();
    let lname = $('#emp_lastname').val();
    let job_title = $('#emp_jobTitle').val();
    let email = $('#emp_email').val();
    let dept = $('#dept').val();
    let location = $('#location').val();
    //  alert(employee);
    $.ajax({
        url: "<?php echo 'addEmployee.php';?>",
        data: {
            fname: fname,
            lname: lname,
            job_title: job_title,
            email: email,
            dept: dept,
            location: location
        },
        type: 'POST',
        dataType: 'json',
        success: function(res) {
            // console.log(res);
            if (res.status == 'success') {
                $('#AddEmployee').modal('hide');
                getAll();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Employee has been Added',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    });
});


// Add Employee End
////////////////////////////////
//Add Department Start
$(document).on('click', '#add_department', function(e) {
    e.preventDefault();
    // alert("Add Department Clicked");
    let department = $('#departmentAdd').val();
    let location = $('#loc').val();
    $.ajax({
        url: "<?php echo 'addDepartment.php';?>",
        data: {
            department: department,
            location: location
        },
        type: 'POST',
        dataType: 'json',
        success: function(res) {
            // console.log(res);
            if (res.status == 'success') {
                $('#AddDepartment').modal('hide');
                // getAll();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Department has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    });
});
//Add Department End

//Update Department Start
$(document).on('click', '#update_department', function(e) {
    e.preventDefault();
    // alert("Add Department Clicked");
    let old_department = $('#old_dept').val();
    let new_department = $('#new_dept').val();
    //    alert(old_department);
    //    alert(new_department);
    $.ajax({
        url: "<?php echo 'updateDepartment.php';?>",
        data: {
            old_department: old_department,
            new_department: new_department
        },
        type: 'POST',
        dataType: 'json',
        success: function(res) {
            // console.log(res);
            if (res.status == 'success') {
                $('#UpdateDepartment').modal('hide');
                // getAll();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Department has been Updated Successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    });
});
//Update Department End

//Delete Department Start
$(document).on('click', '#delete_department', function(e) {
    e.preventDefault();
    // alert("Add Department Clicked");
    let delete_department = $('#delete_dept').val();
    //    alert(old_department);
    //    alert(new_department);
    $.ajax({
        url: "<?php echo 'deleteDepartment.php';?>",
        data: {
            delete_department: delete_department
        },
        type: 'POST',
        dataType: 'json',
        success: function(res) {
            // console.log(res);
            if (res.status == 'success') {
                $('#DeleteDepartment').modal('hide');
                // getAll();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Department has been Deleted Successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    });
});
//Delete Department End


////////////////////////////////
//Add Location Start
$(document).on('click', '#add_location', function(e) {
    e.preventDefault();
    //  alert("Add Location Clicked");
    let location = $('#locationAdd').val();
    // alert(location);
    $.ajax({
        url: "<?php echo 'addLocation.php';?>",
        data: {
            location: location
        },
        type: 'POST',
        dataType: 'json',
        success: function(res) {
            // console.log(res);
            if (res.status == 'success') {
                $('#AddLocation').modal('hide');
                // getAll();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Location has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    });
});
//Add Location End

//Update Location Start
$(document).on('click', '#update_location', function(e) {
    e.preventDefault();
    //  alert("Add Location Clicked");
    let old_location = $('#old_location').val();
    let new_location = $('#new_location').val();
    // alert(location);
    $.ajax({
        url: "<?php echo 'updateLocation.php';?>",
        data: {
            old_location: old_location,
            new_location: new_location
        },
        type: 'POST',
        dataType: 'json',
        success: function(res) {
            // console.log(res);
            if (res.status == 'success') {
                $('#UpdateLocation').modal('hide');
                // getAll();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Location has been Updated',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    });
});
//Update Location End

//Delete Location Start
$(document).on('click', '#delete_location', function(e) {
    e.preventDefault();
    //  alert("Add Location Clicked");
    let delete_loc = $('#delete_loc').val();
    // alert(location);
    $.ajax({
        url: "<?php echo 'deleteLocation.php';?>",
        data: {
            delete_loc: delete_loc
        },
        type: 'POST',
        dataType: 'json',
        success: function(res) {
            // console.log(res);
            if (res.status == 'success') {
                $('#DeleteLocation').modal('hide');
                // getAll();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Location has been Deleted',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    });
});
//Delete Location End
</script>
<!-- Add functionality End -->

<!-- Edit functionality Start -->
<script type="text/javascript">
$(document).on('click', '#editEmp', function() {
    //alert('Edit Button Clicked');
    let get_id = $(this).data('id');
    // alert("Employee ID: " + get_id);
    $.ajax({
        url: "<?php echo 'getByid.php';?>",
        data: {
            id: get_id
        },
        type: 'POST',
        dataType: 'json',
        success: function(res) {
            // console.log(res.id);
            let id = res.id;
            let firstName = res.firstName;
            let lastName = res.lastName;
            let jobTitle = res.jobTitle;
            let email = res.email;
            let department = res.department;
            let location = res.location;

            $('#eid').val(id);
            $('#lastname').val(lastName);
            $('#firstname').val(firstName);
            $('#jobtitle').val(jobTitle);
            $('#email').val(email);
            $('#department').val(department);
            $('#location').val(location);
        }

    });

});
</script>
<!-- Edit functionality End -->

<!-- Update functionality Start -->
<script type="text/javascript">
$(document).on('click', '#updateEmp', function(e) {
    // alert("Update Button Clicked");
    e.preventDefault(); //  prevent page default behavior

    let eid = $('#eid').val();
    let lastname = $('#lastname').val();
    let firstname = $('#firstname').val();
    let jobtitle = $('#jobtitle').val();
    let email = $('#email').val();
    let department = $('#department').val();
    let location = $('#location').val();
    $.ajax({
        url: "<?php echo 'update.php'; ?>",
        data: {
            eid: eid,
            firstname: firstname,
            lastname: lastname,
            jobtitle: jobtitle,
            email: email,
            department: department,
            location: location

        },
        type: 'POST',
        dataType: 'json',
        success: function(res) {
            // console.log(res);
            if (res.status == 'success') {
                getAll();
                $('#exampleModal').modal('hide');
            }
        }

    });

});
</script>

<!-- Update functionality End -->

<!-- Delete Functionality Start-->
<script type="text/javascript">
$(document).on('click', '.deleteEmp', function() {
    // Call getAll() function whenever document is ready
    getAll();
    // alert("Delete Button Clicked");
    let id = $(this).data('id');
    // alert(id); // Alerts employee id on clicking delete button

    // Testing confirm dialog
    // let r = confirm("Are you sure want to delete this record?");
    // if (r == true) {
    //     console.log("Record has been deleted!");
    // } else {
    //     console.log("Operation has been cancelled");
    // }

    // A confirm dialog, with a function attached to the "Confirm"-button... using sweetalert2 (https://sweetalert2.github.io/);
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: ' Yes, delete it! ',
        cancelButtonText: ' No, cancel! ',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Delete selected record using ajax call
            $.ajax({
                url: "<?php echo 'deleteByid.php'; ?>",
                data: {
                    id: id
                },
                type: "POST",
                success: function(res) {
                    // console.log(res);
                    getAll();
                }
            });
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your record has been deleted.',
                'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your record is safe :)',
                'error'
            )
        }
    })


});
// Auto page refresh functionality after deleting record Start 
function getAll() {
    $.ajax({
        url: "<?php echo 'getAll.php'; ?>",
        success: function(res) {
            //console.log(res);
            $('.empData').html(res);
        }
    });
}
// Auto page refresh functionality after deleting record End
</script>
<!-- Delete Functionality End -->

<!-- SweetAlert2  -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="Assets/js/scroll_to_top.js">
</script>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="index.php">
        <img src="Assets/images/compDirLogo.png"
            style="display: inline-block; width: 120px; height: 70px; margin-left: 30px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <form class="form-inline my-2 my-lg-0">
                <input style="width: 380px;" class="form-control mr-sm-2" type="search" id="search"
                    placeholder="Search By Name, Department, Location & Email">
            </form>
        </ul>
        <a href="index.php" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i></a>
        &nbsp;
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddEmployee">
            <i class="fa fa-fw fa-plus"></i> Add Employee
        </button>
        &nbsp;
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Department
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#AddDepartment" data-toggle="modal" data-target="#AddDepartment">Add </a>
                <a class="dropdown-item" href="#UpdateDepartment" data-toggle="modal"
                    data-target="#UpdateDepartment">Update </a>
                <a class="dropdown-item" href="#DeleteDepartment" data-toggle="modal"
                    data-target="#DeleteDepartment">Delete </a>
            </div>
        </div>
        &nbsp;
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Location
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#AddLocation" data-toggle="modal" data-target="#AddLocation">Add</a>
                <a class="dropdown-item" href="#UpdateLocation" data-toggle="modal"
                    data-target="#UpdateLocation">Update</a>
                <a class="dropdown-item" href="#DeleteLocation" data-toggle="modal"
                    data-target="#DeleteLocation">Delete</a>
            </div>
        </div>
    </div>
</nav>
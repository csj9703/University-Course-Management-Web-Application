<!-- TODO: Link Course List Backened -->
<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header">My Information</div>
    <div class="card-body">
        <div class="input-group rounded">
            <!-- Name -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Name: </span>
                <label class="input-group-text bg-light"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></label>
            </div>
            <!-- User ID -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">ID: </span>
                <label class="input-group-text bg-light"><?php echo $_SESSION['uid']; ?></label>
            </div>
            <!-- E-mail Info -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">E-mail: </span>
                <label class="input-group-text bg-light"><?php echo $_SESSION['email']; ?></label>
            </div>
            <!-- Major Info -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Major: </span>
                <label class="input-group-text bg-light"><?php echo $_SESSION['major']; ?></label>
            </div>
            <!-- Minor Info -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text">Minor: </span>
                <label class="input-group-text bg-light"><?php echo ($_SESSION['minor'] == NULL) ? "N/A" : $_SESSION['minor']; ?></label>
            </div>
            <!-- Courses Accordion Collapse -->
            <div class="input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#antiReqCollapse" aria-expanded="false" aria-controls="antiReqCollapse">My Courses</button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="antiReqCollapse">
                <!-- Semester Header -->
                <div class="card-header">Fall 2022</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                </ul>
                <!-- Semester Divider -->
                <hr>
                <div class="card-header">Winter 2023</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                </ul>
            </div>
        </div>
    </div>
</div>
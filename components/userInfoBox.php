<?php $semArr = query_num_of_course_taken_per_sem($conn); ?>
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
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#courseCollapse" aria-expanded="false" aria-controls="antiReqCollapse">My Courses</button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="courseCollapse">
                <!-- Semester Header -->
                <?php for ($i = 0; $i < sizeof($semArr); $i++) : ?>
                    <div class="card-header"><?php echo $semArr[$i]['semester'] ?></div>
                    <ul class="list-group list-group-flush">
                        <?php for ($c = 0; $c < $semArr[$i]['count']; $c++) : ?>
                            <?php $courses = query_courses_taken_on_semester($conn, $semArr[$i]['semester']) ?>
                            <a href="courseDetailPage.php" class="list-group-item list-group-item-action"><?php echo $courses[$c]['dep_title'] . " " . $courses[$c]['c_num'] . " - " . $courses[$c]['c_name'] ?></a>
                        <?php endfor; ?>
                    </ul>
                    <hr>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>
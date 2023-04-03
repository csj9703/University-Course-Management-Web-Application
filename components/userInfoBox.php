<?php $semArr = query_num_of_course_taken_per_sem($conn); ?>
<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header"><b>My Information</b></div>
    <div class="card-body">
        <div class="input-group rounded">
            <!-- Name -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text"><b>Name: </b></span>
                <label class="input-group-text bg-light"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></label>
            </div>
            <!-- User ID -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text"><b>ID: </b></span>
                <label class="input-group-text bg-light"><?php echo $_SESSION['uid']; ?></label>
            </div>
            <!-- E-mail Info -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text"><b>E-mail: </b></span>
                <label class="input-group-text bg-light"><?php echo $_SESSION['email']; ?></label>
            </div>
            <!-- Major Info -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text"><b>Major:</b> </span>
                <label class="input-group-text bg-light"><?php echo $_SESSION['major']; ?></label>
            </div>
            <!-- Minor Info -->
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text"><b>Minor:</b> </span>
                <label class="input-group-text bg-light"><?php echo ($_SESSION['minor'] == NULL) ? "N/A" : $_SESSION['minor']; ?></label>
            </div>
            <!-- Courses Accordion Collapse -->
            <div class="input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#courseCollapse" aria-expanded="false" aria-controls="antiReqCollapse"><b>My Courses</b></button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="courseCollapse">
                <!-- Semester Header -->
                <?php for ($i = 0; $i < sizeof($semArr); $i++) : ?>
                    <div class="card-header"><b><?php echo $semArr[$i]['semester'] ?></b></div>
                    <ul class="list-group list-group-flush">
                        <?php for ($c = 0; $c < $semArr[$i]['count']; $c++) : ?>
                            <?php
                            $courses = query_courses_taken_on_semester($conn, $semArr[$i]['semester']);
                            $cSem =  $semArr[$i]['semester'];
                            $cDep_title = $courses[$c]['dep_title'];
                            $cNum = $courses[$c]['c_num'];
                            $cName = $courses[$c]['c_name'];
                            $link = "courseDetailPage.php?cDep_title=" . urlencode($cDep_title) .
                                "&cNum=" . urlencode($cNum) .
                                "&cName=" . urlencode($cName) .
                                "&cSem=" . urlencode($cSem);
                            ?>
                            <a href=<?php echo $link ?> class="list-group-item list-group-item-action"><?php echo "{$cDep_title} {$cNum} - {$cName}"; ?></a>

                        <?php endfor; ?>
                    </ul>
                    <hr>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</div>
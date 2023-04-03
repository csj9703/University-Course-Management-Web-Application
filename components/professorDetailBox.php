<?php $profArr = query_prof_info($conn, $prof_email); ?>
<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header"><b>Professor Details</b></div>
    <div class="card-body">
        <div class="input-group rounded">
            <!-- Professor Name -->
            <div class="input-group mt-3 mb-3">
                <h5 class="card-title" style="padding-left: 15px;">
                    <b><?php echo "{$profArr['fname']} {$profArr['lname']}" ?>
                    </b>
                </h5>
            </div>
            <!-- Professor Description -->
            <div class="row card-body">
                <span class="input-group-text"><b>Professor Positions:</b>&nbsp;</span>
                <p class="card-body-text bg-light" style="padding-left: 20px;padding-top: 6px;">
                    <?php echo "{$profArr['position']}" ?>
                    <br>
                    <?php echo "{$profArr['department']}" ?>
                    <br>
                </p>
            </div>

            <!-- Professor contact -->
            <div class="row card-body">
                <span class="input-group-text"><b>Contact Information:</b>&nbsp;</span>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text bg-light">Email: </span>
                    <label class="input-group-text bg-light"><?php echo "{$profArr['email']}" ?></label>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text bg-light">Office Location: </span>
                    <label class="input-group-text bg-light"><?php echo "{$profArr['office']}" ?></label>
                </div>
                <br>
            </div>

            <!-- Courses Teaching -->
            <div class="input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#sectionCollapse" aria-expanded="false" aria-controls="sectionCollapse"><b>Courses teaching</b></button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="sectionCollapse">
                <!-- List of Courses -->
                <?php $courses = query_prof_courses($conn, $prof_email); ?>
                <ul class="list-group list-group-flush">
                    <?php for ($i = 0; $i < sizeof($courses); $i++) : ?>
                        <?php
                        $cNum = $courses[$i]['c_num'];
                        $cDep = $courses[$i]['dep_title'];
                        $cName = $courses[$i]['course_name'];
                        $cSem = $courses[$i]['semester'];
                        $link = "courseDetailPage.php?cDep_title=" . urlencode($cDep) .
                            "&cNum=" . urlencode($cNum) .
                            "&cName=" . urlencode($cName) .
                            "&cSem=" . urlencode($cSem);
                        ?>
                        <a href=<?php echo $link; ?> class="list-group-item list-group-item-action">
                            <?php echo "{$cSem} - {$cDep} {$cNum} - {$cName}"; ?>
                        </a>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>

        <!-- Professor evaluation -->
        <div class="input-group mt-3 mb-3">
            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#courseEvalCollapse" aria-expanded="false" aria-controls="courseEvalCollapse"><b>Evaluation(s)</b></button>
        </div>
        <div class="card card-body collapse" aria-expanded="false" id="courseEvalCollapse">
            <?php $evals = query_prof_evals($conn, $prof_email); ?>
            <ul class="list-group list-group-flush">
                <?php for ($i = 0; $i < sizeof($evals); $i++) : ?>
                    <li class="list-group-item">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-light">Course Semester: </span>
                            <label class="input-group-text bg-light"><?php echo "{$evals[$i]['semester']}"; ?></label>
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text bg-light">Course Name: </span>
                            <label class="input-group-text bg-light"><?php echo "{$evals[$i]['dep_title']} {$evals[$i]['c_num']} - {$evals[$i]['course_name']}"; ?></label>
                        </div>
                        <div class="input-group mt-3 mb-6">
                            <span class="input-group-text bg-light">Professor Rating: </span>
                            <label class="input-group-text bg-light"><?php echo "{$evals[$i]['rating']}/10"; ?></label>
                        </div>
                        <div class="input-group mt-4 mb-3" style="padding-top: 20px;">
                            <div class="card-title h5">Professor Review:
                                <div class="card-body bg-light h6 mt-3">
                                    "<?php echo "{$evals[$i]['review']}"; ?>"
                                </div>
                            </div>

                        </div>
                        <h5 class="card-title" style="text-align: right">Review Date: <?php echo "{$evals[$i]['eval_date']}"; ?></h5>
                    </li>
                    <hr>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>
</div>
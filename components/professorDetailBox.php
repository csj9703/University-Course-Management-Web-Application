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
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text bg-light">Professor Rating: </span>
                        <label class="input-group-text bg-light">TEST</label>
                    </div>
                    <div class="input-group mt-4 mb-3">
                        <h5 class="card-title">Professor Review: </h5>
                        <hr>
                        <p class="card-text bg-light">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                    </div>
                    <h5 class="card-title" style="text-align: right">Review Date: 2023-03-30</h5>
                </li>
                <hr>
            </ul>
        </div>
    </div>
</div>
</div>
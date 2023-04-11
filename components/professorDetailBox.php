<?php $profArr = query_prof_info($conn, $instr_email); ?>
<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header"><b>Instructor Details</b></div>
    <div class="card-body">
        <div class="input-group rounded">
            <!-- Instructor Name -->
            <div class="input-group mt-3 mb-3">
                <h5 class="card-title" style="padding-left: 15px;">
                    <b><?php echo "{$profArr['fname']} {$profArr['lname']}" ?>
                    </b>
                </h5>
            </div>
            <!-- Instructor Description -->
            <div class="row card-body">
                <span class="input-group-text"><b>Instructor Positions:</b>&nbsp;</span>
                <p class="card-body-text bg-light" style="padding-left: 20px;padding-top: 6px;">
                    <?php echo "{$profArr['position']}" ?>
                    <br>
                    <?php echo "{$profArr['department']}" ?>
                    <br>
                </p>
            </div>

            <!-- Instructor contact -->
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
            <div class="row input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#sectionCollapse" aria-expanded="false" aria-controls="sectionCollapse"><b>Courses teaching</b></button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="sectionCollapse">
                <!-- List of Courses -->
                <?php $courses = query_prof_courses($conn, $instr_email); ?>
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

            <!--User's Instructor evaluation -->
            <div class="row input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#profEvalCollapse" aria-expanded="false" aria-controls="profEvalCollapse"><b>Instructor Evaluation</b></button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="profEvalCollapse">
                <?php if (user_taken_course_with_prof($conn, $instr_email)) : ?>
                    <?php $myEvals = query_user_prof_eval($conn, $instr_email); ?>
                    <?php if (sizeof($myEvals) == 1) : ?>
                        <div class="row card-title h5 mb-3">
                            <div class="col" style="padding-left: 15px;"><b>My Instructor Review:</b></div>
                            <div class="col" style="text-align:right;">
                                <?php
                                $_SESSION['prof_eval_type'] = 'edit';
                                $_SESSION['current_pName'] = "{$profArr['fname']} {$profArr['lname']}";
                                $_SESSION['current_pEmail'] = $instr_email;
                                $_SESSION['current_cNum'] = $cNum;
                                $_SESSION['current_cDep'] = $cDep;
                                $_SESSION['current_cSem'] = $cSem;
                                $link = "profEvalPage.php";
                                ?>
                                <a href=<?php echo $link; ?>>
                                    Edit
                                </a>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="input-group mt-3 mb-6">
                                    <span class="input-group-text bg-light">Instructor Rating: </span>
                                    <label class="input-group-text bg-light"><?php echo "{$myEvals[0]['rating']}/10"; ?></label>
                                </div>
                                <div class="input-group mt-4 mb-3" style="padding-top: 20px;">
                                    <div class="card-title h5">Instructor Review:
                                        <div class="card-body bg-light h6 mt-3">
                                            "<?php echo "{$myEvals[0]['review']}"; ?>"
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title" style="text-align: right">Review Date: <?php echo "{$myEvals[0]['eval_date']}"; ?></h5>
                            </li>
                        </ul>
                    <?php else : ?>
                        <div class="row card-title h5 mb-3">
                            <div class="col" style="padding-left: 15px;"><b>My Instructor Review: </b></div>
                            <h5 class="mt-3" style="text-align: center">You haven't posted an evaluation for this course! </h5>
                            <?php
                            $_SESSION['prof_eval_type'] = 'add';
                            $_SESSION['current_pName'] = "{$profArr['fname']} {$profArr['lname']}";
                            $_SESSION['current_pEmail'] = $instr_email;
                            $_SESSION['current_cNum'] = $cNum;
                            $_SESSION['current_cDep'] = $cDep;
                            $_SESSION['current_cSem'] = $cSem;
                            $link = "profEvalPage.php";
                            ?>
                            <a class="mt-2" href=<?php echo $link; ?> style="text-align: center">
                                Click here to submit your evaluation.
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <hr>
                <!-- Other Student's Instructor evaluations -->
                <div class="row card-title h5 mb-3">
                    <div class="col" style="padding-left: 15px;">
                        <b>Other Instructor Review(s):</b>
                    </div>
                </div>
                <?php $evals = query_prof_evals($conn, $instr_email); ?>
                <ul class="list-group list-group-flush">
                    <?php for ($i = 0; $i < sizeof($evals); $i++) : ?>
                        <li class="list-group-item">
                            <div class="input-group mt-3 mb-6">
                                <span class="input-group-text bg-light">Instructor Rating: </span>
                                <label class="input-group-text bg-light"><?php echo "{$evals[$i]['rating']}/10"; ?></label>
                            </div>
                            <div class="input-group mt-4 mb-3" style="padding-top: 20px;">
                                <div class="card-title h5">Instructor Review:
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
</div>
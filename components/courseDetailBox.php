<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header"><b>Course Details</b></div>
    <div class="card-body">
        <div class="input-group rounded">
            <!-- Course Name -->
            <div class="input-group mt-3 mb-3">
                <h5 class="card-title" style="padding-left: 15px;">
                    <b><?php echo "{$cDep_title} {$cNum} - {$cName} - {$cSem}"; ?></b>
                </h5>
            </div>
            <!-- Course Description -->
            <div class="row card-body">
                <span class="input-group-text"><b>Course Description:</b> &nbsp;</span>
                <p class="card-text bg-light" style="padding-right: 10px;padding-left: 20px;padding-top: 6px;">
                    <?php echo $cDes ?>
                </p>
            </div>

            <!-- Course Credits -->
            <div class="row card-body mb-3 vw-100">
                <span class="input-group-text"><b>Credits:</b></span>
                <p class="card-body-text bg-light" style="width:100%; padding-left: 20px; padding-top: 6px;">
                    <?php echo $cCr . " units" ?>
                </p>
            </div>
            <!-- Prerequisites Info -->
            <div class="row card-body mb-3">
                <span class="input-group-text"><b>Prerequisite(s):</b></span>
                <p class="card-body-text bg-light" style="padding-left: 20px;padding-top: 6px;">
                    <?php echo ($cPre == NULL) ? "This course has no prerequisite." : $cPre; ?>
                </p>
            </div>
            <!-- Antirequisites Info -->
            <div class="row card-body mb-3">
                <span class="input-group-text"><b>Antirequisite(s):</b></span>
                <p class="card-body-text bg-light" style="padding-left: 20px;padding-top: 6px;">
                    <?php echo ($cAnti == NULL) ? "This course has no antirequisite." : $cAnti; ?>
                </p>
            </div>

            <!-- Section Info -->
            <div class="row input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#sectionCollapse" aria-expanded="false" aria-controls="sectionCollapse"><b>Sections</b></button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="sectionCollapse">
                <?php $sectArr = query_course_sections($conn, $cNum, $cDep_title, $cSem); ?>
                <?php for ($i = 0; $i < sizeof($sectArr); $i++) : ?>
                    <div class="row">
                        <?php $sect_id = $sectArr[$i]['sect_id']; ?>
                        <!-- Section id -->
                        <div class="col-12 col-md-1 text-center"><?php echo $sect_id; ?></div>
                        <!-- Day and Time -->
                        <div class="col-12 col-md-2 text-center"><?php echo "{$sectArr[$i]['day']} {$sectArr[$i]['time']}"; ?><br></div>
                        <!-- Location -->
                        <div class="col-12 col-md-1 text-center"><?php echo "{$sectArr[$i]['location']}"; ?><br></div>
                        <!-- Capacity -->
                        <div class="col-12 col-md-3 text-center"><?php echo "Capacity: {$sectArr[$i]['capacity']}"; ?><br></div>
                        <!-- Instructor -->
                        <?php
                        $prof_email = $sectArr[$i]['prof_email'];
                        $profArr = query_section_prof($conn, $prof_email);
                        ?>
                        <div class="col-12 col-md-3 text-center">
                            <?php
                            $link = "professorDetail.php?prof_email=" . urlencode($prof_email);
                            ?>
                            <a href=<?php echo $link; ?>>
                                <?php echo "{$profArr['fname']} {$profArr['lname']}"; ?>
                            </a>
                        </div>
                        <!-- Textbook -->
                        <?php
                        $textbookArr = query_section_textbook($conn, $cNum, $cDep_title, $cSem, $sect_id);
                        ?>
                        <div class="col-12 col-md-2 text-center">
                            <?php
                            $isbn = $textbookArr['isbn'];
                            $link = "textbookDetailPage.php?isbn=" . urlencode($isbn);
                            ?>
                            <a href=<?php echo $link; ?>>
                                Textbook
                            </a>
                        </div>
                    </div>
                    <hr>
                <?php endfor; ?>
            </div>

            <!-- Course evaluation -->
            <div class="row input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#courseEvalCollapse" aria-expanded="false" aria-controls="courseEvalCollapse"><b>Course Evaluation</b></button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="courseEvalCollapse">
                <?php $evals = query_course_evals($conn, $cNum, $cDep_title, $cSem); ?>
                <ul class="list-group list-group-flush">
                    <?php for ($i = 0; $i < sizeof($evals); $i++) : ?>
                        <li class="list-group-item">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-light">Course Difficulty: </span>
                                <label class="input-group-text bg-light"><?php echo "{$evals[$i]['diffi_rating']}/10"; ?></label>
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <span class="input-group-text bg-light">Course Workload: </span>
                                <label class="input-group-text bg-light"><?php echo "{$evals[$i]['workload']}"; ?></label>
                            </div>
                            <div class="input-group mt-3 mb-6">
                                <span class="input-group-text bg-light">Course Rating: </span>
                                <label class="input-group-text bg-light"><?php echo "{$evals[$i]['rating']}/10"; ?></label>
                            </div>
                            <div class="input-group mt-4 mb-3" style="padding-top: 20px;">
                                <div class="card-title h5">Course Review:
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
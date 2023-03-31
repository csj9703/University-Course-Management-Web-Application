<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
        <div class="card-header"><b>Create a Course</b></div>
        <!-- Duplicate Course Alert -->
        <?php if ($cDupErr == -1) : ?>
            <div class="alert alert-danger" role="alert">
                Error: Course already exists!
            </div>
        <?php endif; ?>
        <div class="card-body">
            <h6 class="card-title">Course Information: </h6>
            <div class="input-group rounded">
                <!-- Course Semester Selection -->
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="cSemesterSelect">Course Semester: </lable>
                    </div>
                    <?php $semArr = query_semesters($conn); ?>
                    <select class="form-select <?php echo $cSemErr ? 'is-invalid' : null; ?>" name="course_semester" id="cSemesterSelect">
                        <option selected>Choose Semester</option>
                        <?php for ($i = 0; $i < sizeof($semArr); $i++) : ?>
                            <option type="text" value="<?php echo $semArr[$i]['semester']; ?>"><?php echo $semArr[$i]['semester']; ?></option>
                        <?php endfor ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo $cSemErr; ?>
                    </div>
                </div>
                <!-- Course Department Selection -->
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="cDepartSelect">Course Department: </lable>
                    </div>
                    <?php $depArr = query_departments($conn); ?>
                    <select class="form-select <?php echo $cDepErr ? 'is-invalid' : null; ?>" name="course_department" id="cDepartSelect">
                        <option selected>Choose Course Department</option>
                        <?php for ($i = 0; $i < sizeof($depArr); $i++) : ?>
                            <option value="<?php echo "{$depArr[$i]['dep_name']},{$depArr[$i]['dep_title']}"; ?>"><?php echo "{$depArr[$i]['dep_name']} - {$depArr[$i]['dep_title']}"; ?></option>
                        <?php endfor ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo $cDepErr; ?>
                    </div>
                </div>
                <!-- Course Number Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Course Number: </span>
                    <input type="text" name="course_number" class="form-control <?php echo $cNumErr ? 'is-invalid' : null; ?>" placeholder="Enter the course number">
                    <div class="invalid-feedback">
                        <?php echo $cNumErr; ?>
                    </div>
                </div>
                <!-- Course Name Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Course Name: </span>
                    <input type="text" name="course_name" class="form-control <?php echo $cNameErr ? 'is-invalid' : null; ?>" placeholder="Enter the course name">
                    <div class="invalid-feedback">
                        <?php echo $cNameErr; ?>
                    </div>
                </div>
                <!-- Course Credits Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Course Credits: </span>
                    <input type="text" name="course_credits" class="form-control <?php echo $cCredErr ? 'is-invalid' : null; ?>" placeholder="Enter course credits">
                    <div class="invalid-feedback">
                        <?php echo $cCredErr; ?>
                    </div>
                </div>
                <!-- Course Description Longtext Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Course Description: </span>
                    <textarea name="course_description" class="form-control <?php echo $cDesErr ? 'is-invalid' : null; ?>" aria-label="Course Description"></textarea>
                    <div class="invalid-feedback">
                        <?php echo $cDesErr; ?>
                    </div>
                </div>
                <!-- Anti-Req Accordion Collapse -->
                <div class="input-group mt-3 mb-3">
                    <!-- Anti-Requisites Error Alert -->
                    <?php if (!empty($antiReqErr)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo "Anti-Requisites Error: " . $antiReqErr . " doesn't exist!" ?>
                        </div>
                    <?php endif; ?>
                    <a class="accordion-button collapsed" style="text-decoration: none;" data-bs-toggle="collapse" data-bs-target="#antiReqCollapse" aria-expanded="false" aria-controls="antiReqCollapse">Has Anti-requisite(s)</a>
                </div>
                <div class="card card-body collapse" aria-expanded="false" id="antiReqCollapse">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Anti-requitsite Course(s): </span>
                        <input type="text" class="form-control" name="antiReq" placeholder="Enter antirequisites...">
                    </div>
                </div>

                <!-- Pre-Req Accordion Collapse -->
                <div class="input-group mt-3 mb-3">
                    <!-- Prerequisites Error Alert -->
                    <?php if (!empty($preReqErr)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo "Prerequisites Error: " . $preReqErr . " doesn't exist!" ?>
                        </div>
                    <?php endif; ?>
                    <a class="accordion-button collapsed" style="text-decoration: none;" data-bs-toggle="collapse" data-bs-target="#preReqCollapse" aria-expanded="false" aria-controls="antiReqCollapse">Has Pre-requisite(s)</a>
                </div>
                <div class="card card-body collapse" aria-expanded="false" id="preReqCollapse">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Pre-requitsite Course(s): </span>
                        <input type="text" class="form-control" name="preReq" placeholder="Enter prerequisites...">
                    </div>
                </div>
                <div class="input-group mt-3 mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
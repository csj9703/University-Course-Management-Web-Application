<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <?php $eval = query_user_eval($conn, $cNum, $cDep, $cSem); ?>
    <div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
        <div class="card-header"><b>Post a Course Evaluation</b></div>
        <div class="card-body">
            <h6 class="card-title">Course Information: <?php echo "{$cDep} {$cNum} - {$cName} - {$cSem}" ?></h6>
            <div class="input-group rounded">
                <!-- Course Difficulty Selection -->
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="cDiffSelect">Course Difficulty: </lable>
                    </div>
                    <select class="form-select <?php echo $cDiffErr ? 'is-invalid' : null; ?>" name="c_diff" id="cDiffSelect">
                        <option selected><?php echo $eval['diffi_rating'] ?></option>
                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                            <option type="text" value=<?php echo $i; ?>><?php echo $i; ?></option>
                        <?php endfor ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo $cDiffErr; ?>
                    </div>
                </div>
                <!-- Course Workload Selection -->
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="cWLSelect">Course Workload: </lable>
                    </div>
                    <select class="form-select <?php echo $cWLErr ? 'is-invalid' : null; ?>" name="c_workload" id="cWLSelect">
                        <option selected><?php echo $eval['workload'] ?></option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo $cWLErr; ?>
                    </div>
                </div>
                <!-- Course Rating Selection -->
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="cRatingSelect">Course Overall Rating: </lable>
                    </div>
                    <select class="form-select <?php echo $cRatingErr ? 'is-invalid' : null; ?>" name="c_rating" id="cRatingSelect">
                        <option selected><?php echo $eval['rating'] ?></option>
                        <?php for ($i = 1; $i <= 10; $i++) : ?>
                            <option type="text" value=<?php echo $i; ?>><?php echo $i; ?></option>
                        <?php endfor ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo $cRatingErr; ?>
                    </div>
                </div>
                <!-- Course Review Longtext Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Course Review: </span>
                    <textarea name="c_review" class="form-control <?php echo $cReviewErr ? 'is-invalid' : null; ?>" aria-label="Course Review"><?php echo $eval['review'] ?></textarea>
                    <div class="invalid-feedback">
                        <?php echo $cReviewErr; ?>
                    </div>
                </div>
                <div class="input-group mt-3 mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
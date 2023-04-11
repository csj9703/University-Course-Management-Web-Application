<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
        <div class="card-header"><b>Enter Section Information</b></div>
        <div class="card-body">
            <h5 class="card-title">Course: <?php echo "{$cDep} {$cNum} - {$cName} - {$cSem}" ?></h5>
            <!-- Duplicate Course Alert -->
            <?php if ($sDupErr == -1) : ?>
                <div class="alert alert-danger" role="alert">
                    Error: Section ID already exists!
                </div>
            <?php endif; ?>
            <div class="input-group rounded">
                <!-- Section ID Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Section ID: </span>
                    <input type="text" name="section_id" class="form-control <?php echo $sIDErr ? 'is-invalid' : null; ?>" placeholder="Enter the Section ID (L01, T01, ...etc)">
                    <div class="invalid-feedback">
                        <?php echo $sIDErr; ?>
                    </div>
                </div>
                <!-- Section Day Selection -->
                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="sDaySelect">Section Days: </lable>
                    </div>
                    <select class="form-select <?php echo $sDayErr ? 'is-invalid' : null; ?>" name="section_days" id="sDaySelect">
                        <option selected>Choose Days</option>
                        <option type="text" value="MWF"> MWF - Monday, Wednesday, Friday</option>
                        <option type="text" value="MW"> MW - Monday, Wednesday</option>
                        <option type="text" value="TR"> TR - Tuesday, Thursday</option>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo $sDayErr; ?>
                    </div>
                </div>
                <!-- Section Start Time Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Start Time: </span>
                    <input type="text" name="s_start_time" class="form-control <?php echo $sSTimeErr ? 'is-invalid' : null; ?>" placeholder="Enter the Starting Time">
                    <div class="invalid-feedback">
                        <?php echo $sSTimeErr; ?>
                    </div>
                    <span class="input-group-text">End Time: </span>
                    <input type="text" name="s_end_time" class="form-control <?php echo $sETimeErr ? 'is-invalid' : null; ?>" placeholder="Enter the End Time">
                    <div class="invalid-feedback">
                        <?php echo $sETimeErr; ?>
                    </div>
                </div>
                <!-- Section Location Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Location: </span>
                    <input type="text" name="sect_loc" class="form-control <?php echo $cLocErr ? 'is-invalid' : null; ?>" placeholder="Enter the Section Location">
                    <div class="invalid-feedback">
                        <?php echo $cLocErr; ?>
                    </div>
                </div>
                <!-- Section Capacity Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Capacity: </span>
                    <input type="text" name="sect_cap" class="form-control <?php echo $sCapErr ? 'is-invalid' : null; ?>" placeholder="Enter the Section Capacity">
                    <div class="invalid-feedback">
                        <?php echo $sCapErr; ?>
                    </div>
                </div>
                <!-- Section Instructor Input -->
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text">Instructor: </span>
                    <input type="text" name="sect_instr" class="form-control <?php echo $sInsErr ? 'is-invalid' : null; ?>" placeholder="Enter the E-mail of the Section Instructor, leave empty for TBD">
                    <div class="invalid-feedback">
                        <?php echo $sInsErr; ?>
                    </div>
                </div>
                <div class="input-group mt-3 mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
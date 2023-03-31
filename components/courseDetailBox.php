<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header"><b>Course Details</b></div>
    <div class="card-body">
        <div class="input-group rounded">
            <!-- Course Name -->
            <div class="input-group mt-3 mb-3">
                <h5 class="card-title" style="padding-left: 15px;">
                    <b><?php echo $cDep_title . " " . $cNum . " - " . $cName . " - " . $cSem ?></b>
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
            <div class="row card-body">
                <span class="input-group-text"><b>Credits:</b></span>
                <p class="card-text bg-light" style="padding-left: 20px; padding-top: 6px;">
                    <?php echo $cCr . " units" ?>
                </p>
            </div>
            <!-- Prerequisites Info -->
            <div class="row card-body">
                <span class="input-group-text"><b>Prerequisite(s):</b></span>
                <p class="card-body-text bg-light" style="padding-left: 20px;padding-top: 6px;">
                    <?php echo $cPre; ?>
                </p>
            </div>
            <!-- Antirequisites Info -->
            <div class="row card-body mb-3">
                <span class="input-group-text"><b>Antirequisite(s):</b></span>
                <p class="card-body-text bg-light" style="padding-left: 20px;padding-top: 6px;">
                    <?php echo $cAnti; ?>
                </p>
            </div>

            <!-- Section Info -->
            <div class="row input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#sectionCollapse" aria-expanded="false" aria-controls="sectionCollapse"><b>Sections</b></button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="sectionCollapse">
                <!-- Section -->
                <td></td>
                <td class="details-row-cell" colspan="3">
                    <table id="uofc-table-3" class="uofc-table">
                        <tbody>
                            <tr class="">
                                <td style="width:1em;padding:1px 0 1px 9px"></td>
                                <!-- Section id -->
                                <td style="width:5em;padding-left:3px">L01</td>
                                <!-- Day and Time -->
                                <td style="width:11em; text-align: center;">WF 16:00&nbsp;-&nbsp;17:50<br></td>
                                <!-- Location -->
                                <td style="width:16em; text-align: center;">WEB&nbsp;BASED<br></td>
                                <!-- Instructor -->
                                <td style="width:16em; text-align: center;"><a href="">Professor Placeholder</a></td>
                                <!-- Textbook -->
                                <td style="width:100px;text-align:right;"></td>
                                <td style="width:70px"><a href="">Textbook</a></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </div>

            <!-- Course evaluation -->
            <div class="row input-group mt-3 mb-3">
                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#courseEvalCollapse" aria-expanded="false" aria-controls="courseEvalCollapse"><b>Course Evaluation</b></button>
            </div>
            <div class="card card-body collapse" aria-expanded="false" id="courseEvalCollapse">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-light">Course Difficulty: </span>
                            <label class="input-group-text bg-light">TEST</label>
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text bg-light">Course Workload: </span>
                            <label class="input-group-text bg-light">TEST</label>
                        </div>
                        <div class="input-group mt-3 mb-6">
                            <span class="input-group-text bg-light">Course Rating: </span>
                            <label class="input-group-text bg-light">TEST</label>
                        </div>
                        <div class="input-group mt-4 mb-3" style="padding-top: 20px;">
                            <h5 class="card-title">Course Review: </h5>
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
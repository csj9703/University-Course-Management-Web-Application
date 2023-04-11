<?php $search_results = $_SESSION['search_results']; ?>
<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header">
        <?php
        $link = "courseDetailPage.php?cDep_title=" . urlencode($sect_cDep) .
            "&cNum=" . urlencode($sect_cNum) .
            "&cName=" . urlencode($sect_cName) .
            "&cSem=" . urlencode($sect_cSem);
        ?>
        <a href=<?php echo $link; ?> role="button" class="btn btn-primary me-3">Go Back</a>
    </div>
    <?php $sections = query_section_list($conn, $sect_cNum, $sect_cDep, $sect_cSem); ?>
    <b class="ms-3 mt-3">Sections For </b>
    <div class="card-body">
        <div class="input-group rounded">
            <div class="card card-body">
                <!-- Section listing -->
                <ul class="list-group list-group-flush">
                    <?php for ($i = 0; $i < sizeof($sections); $i++) : ?>
                        <div class="row">
                            <?php $sect_id = $sections[$i]['sect_id']; ?>
                            <!-- Section id -->
                            <div class="col-12 col-md-1 text-center" style="padding-top: 4px;"><?php echo $sect_id; ?></div>
                            <!-- Day and Time -->
                            <div class="col-12 col-md-2 text-center" style="padding-top: 4px;"><?php echo "{$sections[$i]['day']} {$sections[$i]['time']}"; ?><br></div>
                            <!-- Location -->
                            <div class="col-12 col-md-1 text-center" style="padding-top: 4px;"><?php echo "{$sections[$i]['location']}"; ?><br></div>
                            <!-- Capacity -->
                            <div class="col-12 col-md-2 text-center" style="padding-top: 4px;"><?php echo "Capacity: {$sections[$i]['capacity']}"; ?><br></div>
                            <!-- Instructor -->
                            <?php
                            $instr_email = $sections[$i]['instr_email'];
                            $profArr = query_section_prof($conn, $instr_email);
                            ?>
                            <div class="col-12 col-md-2 text-center" style="padding-top: 4px;">
                                <?php
                                $prof_text = "TBD";
                                if ($instr_email == "TBD") {
                                    echo "TBD";
                                } else {
                                    $prof_link = "professorDetail.php?instr_email=" . urlencode($instr_email);
                                    $prof_text = "{$profArr['fname']} {$profArr['lname']}";
                                    echo "<a href=\"{$prof_link}\">$prof_text</a>";
                                }
                                ?>
                            </div>
                            <!-- Textbook -->
                            <?php
                            $textbookArr = query_section_textbook($conn, $sect_cNum, $sect_cDep, $sect_cSem, $sect_id);
                            ?>
                            <div class="col-12 col-md-2 text-center" style="padding-top: 4px;">
                                <?php
                                $text = "No Texbook";
                                $text_link = '';
                                if (sizeof($textbookArr) == 1) {
                                    $isbn = $textbookArr[0]['isbn'];
                                    $text_link = "textbookDetailPage.php?isbn=" . urlencode($isbn);
                                    $text = 'Textbook';
                                    echo "<a href=\"{$text_link}\">Textbook</a>";
                                } else {
                                    echo "No Textbook";
                                }
                                ?>
                            </div>
                            <!-- Delete Section button -->
                            <div class="col-12 col-md-2 text-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target=<?php echo "#{$sect_id}DeleteModal" ?> class="btn btn-danger">
                                    Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id=<?php echo "{$sect_id}DeleteModal" ?> tabindex="-1" aria-labelledby="sectDeleteModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="sectDeleteModalLabel">Section Delete Confirmation</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo "Are you sure you want to delete section:  {$sect_id}" ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                    <button type="submit" class="btn btn-danger" name="delete" value="<?php echo "{$sect_id}" ?>">
                                                        Yes
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
    <a href="addSectionPage.php" type="button" class="btn btn-primary" style="margin-left: auto;margin-right: auto;padding-right: 50px;padding-left: 50px;margin-bottom: 10px;">
        Add Section
    </a>
</div>
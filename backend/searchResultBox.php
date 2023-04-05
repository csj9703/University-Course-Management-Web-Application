<?php $search_results = $_SESSION['search_results']; ?>
<div class="card text-dark bg-light mb-3" style="margin-top: 20px;margin-right: auto; margin-left: auto;max-width: 1000px;">
    <div class="card-header">
        <a href="homepage.php" role="button" class="btn btn-primary me-3">Go Back</a>
    </div>
    <b class="ms-3 mt-3">Search Results</b>
    <div class="card-body">
        <?php if (sizeof($search_results) == 0) {
            echo "No course found!";
        } ?>
        <div class="input-group rounded">
            <div class="card card-body">
                <!-- Course listing -->
                <ul class="list-group list-group-flush">
                    <?php for ($i = 0; $i < sizeof($search_results); $i++) : ?>
                        <?php
                        $semester = $search_results[$i]['semester'];
                        $dep_title = $search_results[$i]['dep_title'];
                        $cNum = $search_results[$i]['c_num'];
                        $cName = $search_results[$i]['course_name'];
                        $link = "courseDetailPage.php?cDep_title=" . urlencode($dep_title) .
                            "&cNum=" . urlencode($cNum) .
                            "&cName=" . urlencode($cName) .
                            "&cSem=" . urlencode($semester);
                        ?>
                        <a href=<?php echo $link ?> class="list-group-item list-group-item-action">
                            <?php echo "{$semester} - {$dep_title} {$cNum} - {$cName}" ?>
                        </a>
                    <?php endfor; ?>
                </ul>

            </div>
        </div>
        <a href="homepage.php" role="button" class="btn btn-primary mt-5">Go Back</a>
    </div>
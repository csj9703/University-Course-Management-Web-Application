<?php
$eval_type = $_SESSION['eval_type'];
$cName = $_SESSION['current_cName'];
$cNum = $_SESSION['current_cNum'];
$cDep = $_SESSION['current_cDep'];
$cSem = $_SESSION['current_cSem'];
$cDiffErr = $cWLErr = $cRatingErr = $cReviewErr = '';
$cDiff = $cWL = $cRating = $cReview = '';

if (isset($_POST['submit'])) {
    // Validate course difficulty selection
    if ($_POST['c_diff'] == "Choose difficulty level") {
        $cDiffErr = 'Please select a difficulty level!';
    } else {
        $cDiff = $_POST['c_diff'];
    }

    // Validate course workload selection
    if ($_POST['c_workload'] == "Choose course workload") {
        $cWLErr = 'Please select a course workload!';
    } else {
        $cWL = $_POST['c_workload'];
    }

    // Validate course overall rating selection
    if ($_POST['c_rating'] == "Choose overall rating") {
        $cRatingErr = 'Please select a overall rating!';
    } else {
        $cRating = $_POST['c_rating'];
    }

    // Validate course review
    if (empty($_POST['c_review'])) {
        $cReviewErr = 'Course review is required!';
    } else {
        $cReview = filter_var($_POST['c_review'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    // If no errors from all the required fields and we are adding an evaluation
    if (
        empty($cDiffErr)
        && empty($cWLErr)
        && empty($cRatingErr)
        && empty($cReviewErr)
        && ($eval_type == 'add')
    ) {
        add_eval($conn, $cNum, $cDep, $cSem, $cDiff, $cWL, $cRating, $cReview);

        // If no errors from all the required fields and we are editing an evaluation
    } elseif (
        empty($cDiffErr)
        && empty($cWLErr)
        && empty($cRatingErr)
        && empty($cReviewErr)
        && ($eval_type == 'edit')
    ) {
        edit_eval($conn, $cNum, $cDep, $cSem, $cDiff, $cWL, $cRating, $cReview);
    }
    // Redirect to the course after the submitting the evaluation
    $link = "courseDetailPage.php?cDep_title=" . urlencode($cDep) .
        "&cNum=" . urlencode($cNum) .
        "&cName=" . urlencode($cName) .
        "&cSem=" . urlencode($cSem) .
        "&taken=1";
    header("Location: $link");
}

// Add course eval to database
function add_eval(
    mysqli $conn,
    string $cNum,
    string $cDep,
    string $cSem,
    string $cDiff,
    string $cWL,
    string $cRating,
    string $cReview
) {
    $sid = $_SESSION['uid'];
    $date = date("Y-m-d");
    $query = "INSERT INTO course_eval
                    VALUES('$cNum', '$cDep', '$cSem', '$sid',
                    '$cDiff', '$cWL', '$cRating', '$cReview', '$date');";
    $conn->query($query);
}

// Update course eval to database
function edit_eval(
    mysqli $conn,
    string $cNum,
    string $cDep,
    string $cSem,
    string $cDiff,
    string $cWL,
    string $cRating,
    string $cReview
) {
    $sid = $_SESSION['uid'];
    $date = date("Y-m-d");
    $query = "UPDATE course_eval
        SET diffi_rating='$cDiff', workload='$cWL', rating='$cRating', review='$cReview', eval_date='$date'
        WHERE c_num='$cNum' AND cdep_title='$cDep' AND c_sem='$cSem' AND sid='$sid';";
    $conn->query($query);
}

// Query the user's evaluation
function query_user_eval(
    mysqli $conn,
    string $cNum,
    string $cDep,
    string $cSem
) {
    $sid = $_SESSION['uid'];
    $query = "SELECT * 
        FROM course_eval
        WHERE c_num='$cNum' AND cdep_title='$cDep' AND c_sem='$cSem' AND sid='$sid';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row[0];
}

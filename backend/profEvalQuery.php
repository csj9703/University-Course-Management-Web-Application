<?php
$prof_eval_type = $_SESSION['prof_eval_type'];
$cName = $_SESSION['current_cName'];
$cNum = $_SESSION['current_cNum'];
$cDep = $_SESSION['current_cDep'];
$cSem = $_SESSION['current_cSem'];
$instr_email = $_SESSION['current_pEmail'];
$pRatingErr = $pReviewErr = '';
$pRating = $pReview = '';

if (isset($_POST['submit'])) {
    // Validate instructor overall rating selection
    if ($_POST['p_rating'] == "Choose overall rating") {
        $pRatingErr = 'Please select a overall rating!';
    } else {
        $pRating = $_POST['p_rating'];
    }

    // Validate instructor review
    if (empty($_POST['p_review'])) {
        $pReviewErr = 'instructor review is required!';
    } else {
        $pReview = filter_var($_POST['p_review'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    // If no errors from all the required fields and we are adding an evaluation
    if (
        empty($pRatingErr)
        && empty($pReviewErr)
        && ($prof_eval_type == 'add')
    ) {
        add_eval($conn, $cNum, $cDep, $cSem, $instr_email, $pRating, $pReview);

        // If no errors from all the required fields and we are editing an evaluation
    } elseif (
        empty($pRatingErr)
        && empty($pReviewErr)
        && ($prof_eval_type == 'edit')
    ) {
        edit_eval($conn, $cNum, $cDep, $cSem, $instr_email, $pRating, $pReview);
    }
    // Redirect to the instructor page after the submitting the evaluation
    $link = "professorDetail.php?instr_email=" . urlencode($instr_email);
    header("Location: $link");
}

// Add instructor eval to database
function add_eval(
    mysqli $conn,
    string $cNum,
    string $cDep,
    string $cSem,
    string $instr_email,
    string $pRating,
    string $pReview
) {
    $sid = $_SESSION['uid'];
    $date = date("Y-m-d");
    $query = "INSERT INTO instructor_eval
                    VALUES('$cNum', '$cDep', '$cSem', '$sid',
                    '$instr_email', '$pRating', '$pReview', '$date');";
    $conn->query($query);
}

// Update instructor eval to database
function edit_eval(
    mysqli $conn,
    string $cNum,
    string $cDep,
    string $cSem,
    string $instr_email,
    string $pRating,
    string $pReview
) {
    $sid = $_SESSION['uid'];
    $date = date("Y-m-d");
    $query = "UPDATE instructor_eval
        SET rating='$pRating', review='$pReview', eval_date='$date'
        WHERE sect_cnum='$cNum' AND sect_cdep_title='$cDep' AND sect_c_sem='$cSem' 
        AND sid='$sid' AND ins_email='$instr_email';";
    $conn->query($query);
}

// Query the user's evaluation
function query_user_eval(
    mysqli $conn,
    string $cNum,
    string $cDep,
    string $cSem,
    string $instr_email
) {
    $sid = $_SESSION['uid'];
    $query = "SELECT * 
        FROM instructor_eval
        WHERE sect_cnum='$cNum' AND sect_cdep_title='$cDep' AND sect_c_sem='$cSem' 
        AND sid='$sid' AND ins_email='$instr_email';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row[0];
}

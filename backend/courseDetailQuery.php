<?php
if (isset($_GET['cDep_title'])) {
    $cDep_title = $_GET['cDep_title'];
} else {
    $cDep_title = $_SESSION['current_cDep'];
}

if (isset($_GET['cNum'])) {
    $cNum = $_GET['cNum'];
} else {
    $cNum = $_SESSION['current_cNum'];
}

if (isset($_GET['cName'])) {
    $cName = $_GET['cName'];
}

if (isset($_GET['cSem'])) {
    $cSem = $_GET['cSem'];
} else {
    $cSem = $_SESSION['current_cSem'];
}

$cDesCr = query_course_des_cred($conn, $cNum, $cDep_title, $cSem);
$cDes = $cDesCr['d'];
$cCr = $cDesCr['cr'];
$cPrAr = query_course_requitsites($conn, $cNum, $cDep_title, $cSem);
$cPre = $cPrAr['pr'];
$cAnti = $cPrAr['ar'];
$sid = $_SESSION['uid'];

if (isset($_POST['deleteCourse'])) {
    delete_course($conn, $cNum, $cDep_title, $cSem);
    header("Location: searchResultPage.php");
}

// Query course description and credit
function query_course_des_cred(mysqli $conn, string $cNum, string $cDep_title, string $cSem)
{
    $query = "SELECT descript AS d, credits AS cr FROM course WHERE c_num='$cNum' AND dep_title='$cDep_title' AND semester='$cSem';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row[0];
}

// Query course requitsites
function query_course_requitsites(mysqli $conn, string $cNum, string $cDep_title, string $cSem)
{
    $query = "SELECT prerequisites AS pr, antirequisites AS ar 
    FROM pre_req AS p, anti_req AS a 
    WHERE p.c_num='$cNum' AND p.cdep_title='$cDep_title' AND p.c_sem='$cSem' 
    AND a.c_num='$cNum' AND a.cdep_title='$cDep_title' AND a.c_sem='$cSem';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row[0];
}

// Query course sections
function query_course_sections(mysqli $conn, string $cNum, string $cDep_title, string $cSem)
{
    $query = "SELECT sect_id, day, time, location, capacity, instr_email 
        FROM section 
        WHERE c_num='$cNum' AND cdep_title='$cDep_title' AND c_Sem='$cSem';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Query section instructors
function query_section_prof(mysqli $conn, string $instr_email)
{
    $query = "SELECT * FROM instructor 
        WHERE email='$instr_email';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row[0];
}

// Query section textbook
function query_section_textbook(mysqli $conn, string $cNum, string $cDep_title, string $cSem, string $sect_id)
{
    $query = "SELECT isbn
        FROM uses_textbook
        WHERE c_num='$cNum' AND cdep_title='$cDep_title' AND c_sem='$cSem' AND sect_id='$sect_id';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Query course evaluations
function query_course_evals(mysqli $conn, string $cNum, string $cDep_title, string $cSem, string $sid)
{
    $query = "SELECT *
        FROM course_eval
        WHERE c_num='$cNum' AND cdep_title='$cDep_title' AND c_sem='$cSem' AND NOT sid='$sid';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Query user's own course evaluation
function query_user_course_eval(mysqli $conn, string $cNum, string $cDep_title, string $cSem, string $sid)
{
    $query = "SELECT *
        FROM course_eval
        WHERE c_num='$cNum' AND cdep_title='$cDep_title' AND c_sem='$cSem' AND sid='$sid';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

function user_taken_course(mysqli $conn, string $cNum, string $cDep_title, string $cSem, string $sid)
{
    $query = "SELECT *
        FROM student_course_taken
        WHERE c_num='$cNum' AND dep_title='$cDep_title' AND c_sem='$cSem' AND sid='$sid';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (sizeof($row) == 1) {
        return True;
    } else {
        return False;
    }
}

// Delete the course from the database
function delete_course(mysqli $conn, string $cNum, string $cDep_title, string $cSem)
{
    $query = "DELETE FROM course
        WHERE c_num='$cNum' AND dep_title='$cDep_title' AND semester='$cSem';";
    $conn->query($query);
}

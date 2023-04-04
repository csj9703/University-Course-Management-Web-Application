<?php
$cSemErr = $cDepErr = $cNumErr = $cNameErr = $cCredErr = $cDesErr = '';
$old_cNum = $_SESSION['current_cNum'];
$old_cDep = $_SESSION['current_cDep'];
$old_cSem = $_SESSION['current_cSem'];
$cNum = $cDep = $cSem = $cName = $cCred = $cDes = '';
$preReqErr = '';
$antiReqErr = '';
$preReq = $antiReq = '';

if (isset($_POST['submit'])) {
    // Validate course semester selection
    if ($_POST['course_semester'] == "Choose Semester") {
        $cSemErr = 'Please select a course semester!';
    } else {
        $cSem = $_POST['course_semester'];
    }

    // Validate course department selection
    if ($_POST['course_department'] == "Choose Course Department") {
        $cDepErr = 'Please select a course department!';
    } else {
        $cDep = explode(",", $_POST['course_department']);
    }

    // Validate course number
    if (empty($_POST['course_number'])) {
        $cNumErr = 'Course number is required!';
    } elseif (!(ctype_digit($_POST['course_number']) && strlen($_POST['course_number']) === 3)) {
        $cNumErr = 'Invalid course number!';
    } else {
        $cNum = $_POST['course_number'];
    }

    // Validate course name
    if (empty($_POST['course_name'])) {
        $cNameErr = 'Course name is required!';
    } else {
        $cName = filter_var($_POST['course_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    // Validate course credit
    if (empty($_POST['course_credits'])) {
        $cCredErr = 'Course credits amount is required!';
    } else {
        $cCred = $_POST['course_credits'];
    }

    // Validate course description
    if (empty($_POST['course_description'])) {
        $cDesErr = 'Course description is required!';
    } else {
        $cDes = filter_var($_POST['course_description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    // If no errors from all the required fields
    if (
        empty($cSemErr)
        && empty($cDepErr)
        && empty($cNumErr)
        && empty($cNameErr)
        && empty($cCredErr)
        && empty($cDesErr)
    ) {
        $preReq = $_POST['preReq'];
        $antiReq = $_POST['antiReq'];

        update_course($conn, $old_cNum, $old_cDep, $old_cSem, $cNum, $cDep, $cSem, $cName, $cCred, $cDes);
        update_req($conn, 'anti_req', $cNum, $cDep, $cSem, $antiReq);
        update_req($conn, 'pre_req', $cNum, $cDep, $cSem, $preReq);
        // Redirect to the created course after the course creation
        $link = "courseDetailPage.php?cDep_title=" . urlencode($cDep[1]) .
            "&cNum=" . urlencode($cNum) .
            "&cName=" . urlencode($cName) .
            "&cSem=" . urlencode($cSem);
        header("Location: $link");
    }
}

// Query the semesters for selection
function query_semesters(mysqli $conn)
{
    $query = "SELECT distinct semester FROM course;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Query the departments for selection
function query_departments(mysqli $conn)
{
    $query = "SELECT * FROM department;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Get current course info
function get_course_info(
    mysqli $conn,
    string $cNum,
    string $cDep,
    string $cSem
) {
    $query = "SELECT *
        FROM course AS c, department AS d, anti_req AS ar, pre_req AS pr
        WHERE c.c_num='$cNum' AND c.dep_title=d.dep_title AND c.dep_title='$cDep' AND semester='$cSem'
        AND ar.c_num=c.c_num AND ar.cdep_title=c.dep_title AND ar.c_sem=semester
        AND pr.c_num=c.c_num AND pr.cdep_title=c.dep_title AND pr.c_sem=semester;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row[0];
}

// Update course to the database
function update_course(
    mysqli $conn,
    string $old_cNum,
    string $old_cDep,
    string $old_cSem,
    string $new_cNum,
    array $new_cDep,
    string $new_cSem,
    string $new_cName,
    string $new_cCred,
    string $new_cDes
) {
    $query = "UPDATE course
        SET c_num='$new_cNum', dep_title='$new_cDep[1]', course_name='$new_cName', credits='$new_cCred', descript='$new_cDes', semester='$new_cSem'
        WHERE c_num='$old_cNum' AND dep_title='$old_cDep' AND semester='$old_cSem'";
    $conn->query($query);
}

// Update the requisites
function update_req(
    mysqli $conn,
    string $reqType,
    string $cNum,
    array $cDep,
    string $cSem,
    string $req
) {
    if ($reqType == "anti_req") {
        $col = "antirequisites";
    } else {
        $col = "prerequisites";
    }
    $query = "UPDATE $reqType
        SET $col='$req'
        WHERE c_num='$cNum' AND cdep_title='$cDep[1]' AND c_sem='$cSem';";

    $conn->query($query);
}

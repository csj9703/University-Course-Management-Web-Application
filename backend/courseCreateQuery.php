<?php
$cDupErr = 0;
$cSemErr = $cDepErr = $cNumErr = $cNameErr = $cCredErr = $cDesErr = '';
$cSem = $cDep = $cNum = $cName = $cCred = $cDes = '';
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
        $cName = $_POST['course_name'];
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
        $cDes = $_POST['course_description'];
    }

    if (
        empty($cSemErr) && empty($cDepErr) && empty($cNumErr)
        && empty($cNameErr) && empty($cCredErr) && empty($cDesErr)
    ) {
        $cDupErr = create_course($conn, $cNum, $cDep, $cName, $cCred, $cDes, $cSem);
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

// Insert the course info into the database.
function create_course(
    mysqli $conn,
    string $cNum,
    array $cDep,
    string $cName,
    string $cCred,
    string $cDes,
    string $cSem
) {
    $query = "SELECT * FROM course WHERE c_num='$cNum' AND dep_title='$cDep[1]' AND semester='$cSem'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Checks for duplicated courses
    if (sizeof($row) > 0) {
        return -1;
    } else {
        $query = "INSERT INTO course
        VALUES('$cNum', '$cDep[1]', '$cName', '$cCred', '$cDes', '$cDep[0]', '$cSem')";
        $conn->query($query);
        header("Location: courseDetailPage.php");
    }
}

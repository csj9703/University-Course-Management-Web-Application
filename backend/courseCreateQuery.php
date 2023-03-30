<?php
$cDupErr = 0;
$cSemErr = $cDepErr = $cNumErr = $cNameErr = $cCredErr = $cDesErr = '';
$cSem = $cDep = $cNum = $cName = $cCred = $cDes = '';
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
    // If no errors from all the required fields
    if (
        empty($cSemErr)
        && empty($cDepErr)
        && empty($cNumErr)
        && empty($cNameErr)
        && empty($cCredErr)
        && empty($cDesErr)
    ) {
        // Add course to the database
        $cDupErr = create_course($conn, $cNum, $cDep, $cName, $cCred, $cDes, $cSem);
        $preReq = $_POST['preReq'];
        $antiReq = $_POST['antiReq'];
        // If only prerequisites were entered
        if (!empty($preReq) && empty($antiReq) && $cDupErr == 0) {
            $preReqErr = validate_requitsite($conn, $preReq);
            // If all Pre-req exists then add them to the database
            if (empty($preReqErr)) {
                add_Req('pre_req', $conn, $preReq, $cNum, $cDep);
            } else {
                // Remove the course added earlier if we have an invalid requisite
                remove_course($conn, $cNum, $cDep, $cSem);
            }
            // If only antirequisites were entered
        } elseif (empty($preReq) && !empty($antiReq) && $cDupErr == 0) {
            $antiReqErr = validate_requitsite($conn, $antiReq);
            // If all Pre-req exists then add them to the database
            if (empty($antiReqErr)) {
                add_Req('anti_req', $conn, $antiReq, $cNum, $cDep);
            } else {
                // Remove the course added earlier if we have an invalid requisite
                remove_course($conn, $cNum, $cDep, $cSem);
            }
            // If both prerequisites and antirequisites were entered
        } elseif (!empty($preReq) && !empty($antiReq) && $cDupErr == 0) {
            $preReqErr = validate_requitsite($conn, $preReq);
            $antiReqErr = validate_requitsite($conn, $antiReq);
            // If all Pre-req exists then add them to the database
            if (empty($antiReqErr) && empty($preReqErr)) {
                add_Req('pre_req', $conn, $preReq, $cNum, $cDep);
                add_Req('anti_req', $conn, $antiReq, $cNum, $cDep);
            } else {
                // Remove the course added earlier if we have an invalid requisite
                remove_course($conn, $cNum, $cDep, $cSem);
            }
        }
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
    $user_id = $_SESSION['uid'];
    $query = "SELECT * FROM course WHERE c_num='$cNum' AND dep_title='$cDep[1]' AND semester='$cSem'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Checks for duplicated courses
    if (sizeof($row) > 0) {
        return -1;
    } else {
        $query = "INSERT INTO course
        VALUES('$cNum', '$cDep[1]', '$cName', '$cCred', '$cDes', '$cDep[0]', '$cSem');";
        $conn->query($query);
        $query = "INSERT INTO creates_course
        VALUES('$user_id', '$cNum', '$cDep[1]', '$cSem');";
        $conn->query($query);
    }
}

// Removes course from the database
function remove_course(
    mysqli $conn,
    string $cNum,
    array $cDep,
    string $cSem
) {
    $query = "DELETE FROM course WHERE c_num='$cNum' AND dep_title='$cDep[1]' AND semester='$cSem'";
    $conn->query($query);
}

// Validates the requisites
function validate_requitsite(mysqli $conn, string $requitsite,)
{
    // Check each entered requitsites to see if they exist in the course list
    $requitsiteArr = array_map('trim', explode(",", $requitsite));
    for ($i = 0; $i < sizeof($requitsiteArr); $i++) {
        $reqInfo = explode(" ", $requitsiteArr[$i]);
        $req_Num = $reqInfo[1];
        $req_DepTitle = $reqInfo[0];
        $query = "SELECT * FROM course WHERE c_num='$req_Num' AND dep_title='$req_DepTitle'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // If the requisite course they are trying to add doesn't exist then return it.
        if (sizeof($row) == 0) {
            return $req_DepTitle . ' ' . $req_Num;
        }
    }
}

// Inserts Requisites to the database
function add_Req(
    string $reqType,
    mysqli $conn,
    string $req,
    string $cNum,
    array $cDep
) {
    $reqArr = array_map('trim', explode(",", $req));
    for ($i = 0; $i < sizeof($reqArr); $i++) {
        $reqInfo = explode(" ", $reqArr[$i]);
        $req_Num = $reqInfo[1];
        $req_DepTitle = $reqInfo[0];
        $query = "INSERT INTO $reqType
                    VALUES('$cNum', '$cDep[1]', '$req_Num', '$req_DepTitle');";
        $conn->query($query);
    }
}

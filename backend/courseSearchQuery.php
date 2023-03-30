<?php
$cDupErr = 0;
$cSemErr = $cDepErr = $cNumErr = $cNameErr = $cCredErr = $cDesErr = '';
$cSem = $cDep = $cNum = $cName = $cCred = $cDes = '';
$preReqErr = '';
$antiReqErr = '';
$preReq = $antiReq = '';

if (isset($_POST['search'])) {
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

<?php
$sDupErr = 0;
$sIDErr = $sDayErr = $sSTimeErr = $sETimeErr = $cLocErr = $sCapErr = $sInsErr = '';
$sID = $sDay = $sSTime = $sETime = $cLoc = $sCap = '';
$cName = $_SESSION['current_cName'];
$cNum = $_SESSION['current_cNum'];
$cDep = $_SESSION['current_cDep'];
$cSem = $_SESSION['current_cSem'];

if (isset($_POST['submit'])) {
    // Validate section days selection
    if ($_POST['section_days'] == "Choose Days") {
        $sDayErr = 'Please select section days!';
    } else {
        $sDay = $_POST['section_days'];
    }

    // Validate section ID
    if (empty($_POST['section_id'])) {
        $sIDErr = 'Section id is required!';
    } else {
        $sID = filter_var($_POST['section_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    // Validate section start time
    if (empty($_POST['s_start_time'])) {
        $sSTimeErr = 'Section start time is required!';
    } else {
        $sSTime = filter_var($_POST['s_start_time'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    // Validate section end time
    if (empty($_POST['s_end_time'])) {
        $sETimeErr = 'Section end time is required!';
    } else {
        $sETime = filter_var($_POST['s_end_time'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    // Validate section location
    if (empty($_POST['sect_loc'])) {
        $cLocErr = 'Section location is required!';
    } else {
        $cLoc = filter_var($_POST['sect_loc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    // Validate section capacity
    if (empty($_POST['sect_cap'])) {
        $sCapErr = 'Section capacity is required!';
    } else {
        $sCap = filter_var($_POST['sect_cap'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    // Validate instructor email
    if (empty($_POST['sect_instr'])) {
        $sIns = "TBD";
    } else {
        $sIns = filter_input(INPUT_POST, 'sect_instr', FILTER_SANITIZE_EMAIL);
        if (!instr_exists($conn,  $sIns)) $sInsErr = "Instructor doesn't not exist!";
    }
    // If no errors from all the required fields
    if (
        empty($sIDErr)
        && empty($sDayErr)
        && empty($sSTimeErr)
        && empty($sETimeErr)
        && empty($cLocErr)
        && empty($sCapErr)
        && empty($sInsErr)
        && $sDupErr == 0
    ) {
        if (is_dup_sect_id($conn, $cNum, $cDep, $cSem, $sID)) {
            $sDupErr = -1;
        } else {
            add_section(
                $conn,
                $cNum,
                $cDep,
                $cSem,
                $sID,
                $sDay,
                $sSTime,
                $sETime,
                $cLoc,
                $sCap,
                $sIns
            );
            // Redirect to the created course after the course creation
            header("Location: editSectionPage.php");
        }
    }
}

// Insert the section info into the database.
function add_section(
    mysqli $conn,
    string $cNum,
    string $cDep,
    string $cSem,
    string $sID,
    string $sDay,
    string $sSTime,
    string $sETime,
    string $cLoc,
    string $sCap,
    string $sIns
) {
    $sTime = "{$sSTime} - {$sETime}";
    $query = "INSERT INTO section
        VALUES('$cNum', '$cDep', '$sID', '$cSem', '$sDay', '$sTime', '$cLoc', '$sCap', '$sIns')";
    $conn->query($query);
}

// Check if the section id is unique
function is_dup_sect_id(
    mysqli $conn,
    string $cNum,
    string $cDep,
    string $cSem,
    string $sID
) {
    $query = "SELECT *
        FROM section
        WHERE c_num='$cNum' AND cdep_title='$cDep' AND c_sem='$cSem' AND sect_id='$sID';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return sizeof($row) == 1;
}

function instr_exists(mysqli $conn, string $ins_email)
{
    $query = "SELECT * FROM instructor WHERE email='$ins_email';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return sizeof($row) == 1;
}

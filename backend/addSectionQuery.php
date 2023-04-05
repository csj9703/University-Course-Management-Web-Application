<?php
$sDupErr = 0;
$sIDErr = $sDayErr = $sSTimeErr = $sETimeErr = $cLocErr = $sCapErr = $sInsErr = '';
$sID = $sDay = $sSTime = $sETime = $cLoc = $sCap = $sIns = '';

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
        $sInsErr = 'Section instructor is required!';
    } else {
        $sIns = filter_var($_POST['sect_instr'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
    ) {
        // Add course to the database
        // $cDupErr = create_section($conn, $cNum, $cDep, $cName, $cCred, $cDes, $cSem);
        // Add requisites
        if ($cDupErr == 0) {
        }
        // Redirect to the created course after the course creation
        // $link = "courseDetailPage.php?cDep_title=" . urlencode($cDep[1]) .
        //     "&cNum=" . urlencode($cNum) .
        //     "&cName=" . urlencode($cName) .
        //     "&cSem=" . urlencode($cSem);
        // header("Location: $link");
    }
}

// Insert the course info into the database.
function create_section(
    mysqli $conn,
    string $cNum,
    array $cDep,
    string $cName,
    string $cCred,
    string $cDes,
    string $cSem
) {
}

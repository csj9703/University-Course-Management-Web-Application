<?php
$cDep_title = $_GET['cDep_title'];
$cNum = $_GET['cNum'];
$cName = $_GET['cName'];
$cSem = $_GET['cSem'];
$cDesCr = query_course_des_cred($conn, $cNum, $cDep_title, $cSem);
$cDes = $cDesCr['d'];
$cCr = $cDesCr['cr'];
$cPrAr = query_course_requitsites($conn, $cNum, $cDep_title, $cSem);
$cPre = $cPrAr['pr'];
$cAnti = $cPrAr['ar'];

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
    $query = "SELECT sect_id, day, time, location, capacity, prof_email 
        FROM section 
        WHERE c_num='$cNum' AND cdep_title='$cDep_title' AND c_Sem='$cSem';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Query section professors
function query_section_prof(mysqli $conn, string $prof_email)
{
    $query = "SELECT * FROM professor 
        WHERE email='$prof_email';";
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
    return $row[0];
}

function query_course_evals(mysqli $conn, string $cNum, string $cDep_title, string $cSem)
{
    $query = "SELECT *
        FROM course_eval
        WHERE c_num='$cNum' AND cdep_title='$cDep_title' AND c_sem='$cSem';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

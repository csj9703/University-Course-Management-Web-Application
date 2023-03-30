<?php
$cDep_title = $_GET['cDep_title'];
$cNum = $_GET['cNum'];
$cName = $_GET['cName'];
$cSem = $_GET['cSem'];
$cDesCr = query_course_des_cred($conn, $cNum, $cDep_title, $cSem);
$cDes = $cDesCr['d'];
$cCr = $cDesCr['cr'];

function query_course_des_cred(mysqli $conn, string $cNum, string $cDep_title, string $cSem)
{
    $query = "SELECT descript AS d, credits AS cr FROM course WHERE c_num='$cNum' AND dep_title='$cDep_title' AND semester='$cSem';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row[0];
}

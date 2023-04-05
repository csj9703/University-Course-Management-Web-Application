<?php
$sect_edit_type = $_SESSION['sect_edit_type'];
$sect_cNum = $_SESSION['current_cNum'];
$sect_cDep = $_SESSION['current_cDep'];
$sect_cSem = $_SESSION['current_cSem'];

if (isset($_POST['delete'])) {
    echo $_POST['delete'];
}

function query_section_list(mysqli $conn, string $sect_cNum, string $sect_cDep, string $sect_cSem)
{
    $query = "SELECT *
        FROM section
        WHERE c_num='$sect_cNum' AND cdep_title='$sect_cDep' AND c_sem='$sect_cSem'
        ORDER BY sect_id ASC;";
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
    return $row;
}

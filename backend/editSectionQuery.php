<?php
$sect_cNum = $_SESSION['current_cNum'];
$sect_cDep = $_SESSION['current_cDep'];
$sect_cSem = $_SESSION['current_cSem'];
$sect_cName = $_SESSION['current_cName'];
if (isset($_POST['delete'])) {
    $sID = $_POST['delete'];
    delete_section($conn, $sect_cNum, $sect_cDep, $sect_cSem, $sID);
}

// Query section list
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

// Delete the section from the database.
function delete_section(
    mysqli $conn,
    string $cNum,
    string $cDep,
    string $cSem,
    string $sID
) {
    $query = "DELETE FROM section
       WHERE c_num='$cNum' AND cdep_title='$cDep' AND sect_id='$sID' AND c_sem='$cSem';";
    $conn->query($query);
}

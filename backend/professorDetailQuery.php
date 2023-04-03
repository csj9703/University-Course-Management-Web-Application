<?php
$prof_email = $_GET['prof_email'];

// Query professor info
function query_prof_info(mysqli $conn, string $prof_email)
{
    $query = "SELECT * FROM professor WHERE email='$prof_email';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row[0];
}

// Query courses taught by professor
function query_prof_courses(mysqli $conn, string $prof_email)
{
    $query = "SELECT c.c_num, dep_title, course_name, semester 
        FROM course AS c, section AS s, professor AS p
        WHERE c.c_num=s.c_num AND c.dep_title=s.cdep_title AND semester=s.c_sem 
        AND s.prof_email=p.email AND s.prof_email='$prof_email';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

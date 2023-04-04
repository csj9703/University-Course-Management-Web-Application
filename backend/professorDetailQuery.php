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

// Query Professor evaluations
function query_prof_evals(mysqli $conn, string $prof_email)
{
    $sid = $_SESSION['uid'];
    $query = "SELECT c.c_num, dep_title, course_name, semester, rating, review, eval_date 
        FROM course AS c, professor AS p, section As s, instructor_eval as ie
        WHERE c.c_num=sect_cnum AND dep_title=sect_cdep_title AND semester=sect_c_sem
        AND sect_cnum=s.c_num AND sect_cdep_title=s.cdep_title AND sect_c_sem=s.c_sem
        AND prof_email=email AND prof_email='$prof_email' AND NOT ie.sid='$sid';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Query user's own course evaluation
function query_user_prof_eval(mysqli $conn, string $prof_email)
{
    $sid = $_SESSION['uid'];
    $query = "SELECT c.c_num, dep_title, course_name, semester, rating, review, eval_date
        FROM course AS c, professor AS p, section As s, instructor_eval as ie
        WHERE c.c_num=sect_cnum AND dep_title=sect_cdep_title AND semester=sect_c_sem
        AND sect_cnum=s.c_num AND sect_cdep_title=s.cdep_title AND sect_c_sem=s.c_sem
        AND prof_email=email AND prof_email='$prof_email' AND ie.sid='$sid';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

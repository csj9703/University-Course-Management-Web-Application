<?php
$instr_email = $_GET['instr_email'];

// Query instructor info
function query_prof_info(mysqli $conn, string $instr_email)
{
    $query = "SELECT * FROM instructor WHERE email='$instr_email';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row[0];
}

// Query courses taught by instructor
function query_prof_courses(mysqli $conn, string $instr_email)
{
    $query = "SELECT c.c_num, dep_title, course_name, semester 
        FROM course AS c, section AS s, instructor AS p
        WHERE c.c_num=s.c_num AND c.dep_title=s.cdep_title AND semester=s.c_sem 
        AND s.instr_email=p.email AND s.instr_email='$instr_email';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Query instructor evaluations
function query_prof_evals(mysqli $conn, string $instr_email)
{
    $sid = $_SESSION['uid'];
    $query = "SELECT c.c_num, dep_title, course_name, semester, rating, review, eval_date 
        FROM course AS c, instructor AS p, section As s, instructor_eval as ie
        WHERE c.c_num=sect_cnum AND dep_title=sect_cdep_title AND semester=sect_c_sem
        AND sect_cnum=s.c_num AND sect_cdep_title=s.cdep_title AND sect_c_sem=s.c_sem
        AND instr_email=email AND instr_email='$instr_email' AND NOT ie.sid='$sid';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Query user's own course evaluation
function query_user_prof_eval(mysqli $conn, string $instr_email)
{
    $sid = $_SESSION['uid'];
    $query = "SELECT c.c_num, dep_title, course_name, semester, rating, review, eval_date
        FROM course AS c, instructor AS p, section As s, instructor_eval as ie
        WHERE c.c_num=sect_cnum AND dep_title=sect_cdep_title AND semester=sect_c_sem
        AND sect_cnum=s.c_num AND sect_cdep_title=s.cdep_title AND sect_c_sem=s.c_sem
        AND instr_email=email AND instr_email='$instr_email' AND ie.sid='$sid';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

function user_taken_course_with_prof(mysqli $conn, string $instr_email)
{
    $sid = $_SESSION['uid'];
    $query = "SELECT *
        FROM student_course_taken AS c, instructor AS p, section As s
        WHERE c.c_num=s.c_num AND dep_title=cdep_title AND c.c_sem=s.c_sem
        AND instr_email=email AND instr_email='$instr_email' AND c.sid='$sid';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (sizeof($row) > 0) {
        return True;
    } else {
        return False;
    }
}

<?php
// Query the student's Major and Minor and store them into the SESSION variable
function setupMajorMinor(mysqli $conn)
{
    $user_id = $_SESSION['uid'];
    $query = "SELECT major_in.dep_name AS major, minor_in.dep_name AS minor 
        FROM user, major_in, minor_in 
        WHERE major_in.sid='$user_id' AND minor_in.sid='$user_id';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $user_arr = $row[0];
    $_SESSION['major'] = $user_arr['major'];
    $_SESSION['minor'] = $user_arr['minor'];
}

// Get the number of course taken per semester
function query_num_of_course_taken_per_sem(mysqli $conn)
{
    $user_id = $_SESSION['uid'];
    $query = "SELECT c.semester, COUNT(*) AS count
        FROM student_course_taken AS sc
        INNER JOIN course AS c ON c.c_num=sc.c_num AND c.dep_title=sc.dep_title AND c.semester=sc.c_sem
        INNER JOIN student AS s ON s.uid=sc.sid AND s.uid='$user_id'
        GROUP BY semester;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Get the course taken per semester
function query_courses_taken_on_semester(mysqli $conn, string $semester)
{
    $sid = $_SESSION['uid'];
    $query = "SELECT c.dep_title, c.c_num, c.course_name AS c_name
        FROM course AS c, student_course_taken AS sc
        WHERE sc.sid='$sid' AND c.c_num=sc.c_num AND c.dep_title=sc.dep_title AND semester='$semester';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

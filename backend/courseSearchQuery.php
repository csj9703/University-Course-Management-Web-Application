<?php
$cSem = $cDep = $cNumRange = $cName = '';
$preReq = $antiReq = '';
$cond_arr = array();
$base_query =
    "SELECT c.c_num, dep_title, semester, course_name, descript, dep_name, prerequisites, antirequisites
    FROM course AS c
    INNER JOIN pre_req AS p ON p.c_num = c.c_num AND p.cdep_title=c.dep_title AND p.c_sem=semester
    INNER JOIN anti_req AS a ON a.c_num = c.c_num AND a.cdep_title=c.dep_title AND a.c_sem=semester";

if (isset($_POST['search'])) {
    // If a semester is chosen
    if ($_POST['course_semester'] != "Choose Semester") {
        $cSem = $_POST['course_semester'];
        $cond_arr['semester'] = "'$cSem'";
    }
    // If a department title is chosen
    if ($_POST['course_department'] != "Choose Course Department") {
        $cDep = explode(",", $_POST['course_department']);
        $cond_arr['dep_title'] = "'$cDep[1]'";
    }
    // If a course number range is chosen
    if ($_POST['cNumRange'] != "Choose Course Number Range") {
        $cNumRange = explode(",", $_POST['cNumRange']);
        $cNumStart = $cNumRange[0];
        $cNumEnd = $cNumRange[1];
        $cond_arr['c_num'] = "(c.c_num BETWEEN $cNumStart AND $cNumEnd)";
    }
    // If course name was entered
    if (!empty($_POST['course_name'])) {
        $cName = $_POST['course_name'];
        $cond_arr['course_name'] = "LIKE '%$cName%'";
    }
    // If a prerequisite was entered
    if (!empty($_POST['antiReq'])) {
        $antiReq = $_POST['antiReq'];
        $cond_arr['antirequisites'] = "LIKE '%$antiReq%'";
    }
    // If an antirequisite was entered
    if (!empty($_POST['preReq'])) {
        $preReq = $_POST['preReq'];
        $cond_arr['prerequisites'] = "LIKE '%$preReq%'";
    }
    $query = build_query($cond_arr, $base_query);
    $_SESSION['search_results'] = query_search($conn, $query);
    header("Location: searchResultPage.php");
}

// Query the semesters for selection
function query_semesters(mysqli $conn)
{
    $query = "SELECT distinct semester FROM course;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Query the departments for selection
function query_departments(mysqli $conn)
{
    $query = "SELECT * FROM department;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

// Build the SQL query from form inputs
function build_query(array $cond_arr, string $base_query)
{
    if (sizeof($cond_arr) > 0) {
        $base_query .= " WHERE ";
        foreach ($cond_arr as $key => $value) {
            if ($key == 'c_num') {
                $base_query .= "{$value} AND ";
            } elseif ($key == 'course_name' || $key == 'antirequisites' || $key == 'prerequisites') {
                $base_query .= "{$key} {$value} AND ";
            } else {
                $base_query .= "{$key}={$value} AND ";
            }
        }
    }
    $base_query = rtrim($base_query, "AND ");
    $base_query .= " ORDER BY semester DESC";
    return $base_query;
}

// Query the course search
function query_search(mysqli $conn, string $query)
{
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $row;
}

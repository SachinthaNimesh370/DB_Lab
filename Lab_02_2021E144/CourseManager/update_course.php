<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize inputs
    $code     = $conn->real_escape_string($_POST['code']);
    $name     = $conn->real_escape_string($_POST['name']);
    $credit   = intval($_POST['credit']);
    $hours    = intval($_POST['hours']);
    $semester = intval($_POST['semester']);
    $maid     = intval($_POST['maid']);

    // Update Course table
    $updateCourse = "UPDATE Course 
                     SET Cname = '$name', Credit = $credit, LectureHours = $hours 
                     WHERE Ccode = '$code'";
    if (!$conn->query($updateCourse)) {
        die("Course update failed: " . $conn->error);
    }

    // Update Manage table
    $updateManage = "UPDATE Manage 
                     SET MAid = $maid, Semester = $semester 
                     WHERE Code = '$code'";
    if (!$conn->query($updateManage)) {
        die("Manage update failed: " . $conn->error);
    }
}

// Redirect after update
header("Location: index.php");
exit;
?>

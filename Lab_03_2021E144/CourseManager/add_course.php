<?php
include 'db.php';

$code = $_POST['code'];
$name = $_POST['name'];
$credit = $_POST['credit'];
$hours = $_POST['hours'];
$maid = isset($_POST['maid']) ? intval($_POST['maid']) : 0;
$semester = isset($_POST['semester']) ? intval($_POST['semester']) : 0;

if ($maid === 0 || $semester === 0) {
    echo "MAid and Semester must be provided.<br><a href='index.php'>Go back</a>";
    exit;
}

$insertCourse = "INSERT INTO Course (Ccode, Cname, Credit, LectureHours)
                 VALUES ('$code', '$name', $credit, $hours)";
$insertManage = "INSERT INTO Manage (Code, MAid, Semester)
                 VALUES ('$code', $maid, $semester)";

if ($conn->query($insertCourse) === TRUE && $conn->query($insertManage) === TRUE) {
    echo "Course saved successfully.<br><a href='index.php'>Go back</a>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>

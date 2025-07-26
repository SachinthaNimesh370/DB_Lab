<?php
include 'db.php';

$sql = "CALL UpdateLectureHours()";

if ($conn->query($sql) === TRUE) {
    header("Location: course_page.php?updated=1"); // Change to your page's filename
    exit();
} else {
    header("Location: course_page.php?error=" . urlencode($conn->error)); // Change to your page's filename
    exit();
}

$conn->close();
?>

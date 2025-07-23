<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['code'])) {
    $code = $_POST['code'];

    // Delete from Manage first (due to foreign key constraint), then Course
    $conn->query("DELETE FROM Manage WHERE Code = '$code'");
    $conn->query("DELETE FROM Course WHERE Ccode = '$code'");
}

header("Location: index.php"); // Redirect back
exit;
?>

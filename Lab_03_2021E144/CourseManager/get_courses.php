<?php
include 'db.php';

$semester = isset($_GET['semester']) ? $_GET['semester'] : '';

$sql = "SELECT Course.Ccode, Cname, Credit, LectureHours, Manage.Semester, MAid
        FROM Course 
        JOIN Manage ON Course.Ccode = Manage.Code";

if ($semester !== '') {
    $sql .= " WHERE Manage.Semester = " . intval($semester);
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Course Management</title>
  <link rel="stylesheet" href="style.css"> <!-- Linking external CSS -->
</head>
<body>

<h3>Courses <?= $semester !== '' ? "for Semester $semester" : "(All Semesters)" ?></h3>

<table id="courseTable">
  <tr>
    <th>Code</th>
    <th>Course Name</th>
    <th>Credit</th>
    <th>Lecture Hours</th>
    <th>Semester</th>
  </tr>

  <?php while ($row = $result->fetch_assoc()): ?>
    <tr id="row-<?= $row['Ccode'] ?>">
      <form method="POST" action="update_course.php">
        <td><input type="text" name="code" value="<?= htmlspecialchars($row['Ccode']) ?>" readonly></td>
        <td><input type="text" name="name" value="<?= htmlspecialchars($row['Cname']) ?>"></td>
        <td><input type="number" name="credit" value="<?= htmlspecialchars($row['Credit']) ?>"></td>
        <td><input type="number" name="hours" value="<?= htmlspecialchars($row['LectureHours']) ?>"></td>
        <td>
          <button type="submit">Edit</button>
      </form>
      <form method="POST" action="delete_course.php" onsubmit="return confirm('Are you sure you want to delete this course?');">
        <input type="hidden" name="code" value="<?= htmlspecialchars($row['Ccode']) ?>">
        <button type="submit" class="delete">Delete</button>
      </form>
        </td>
    </tr>
  <?php endwhile; ?>
</table>

</body>
</html>

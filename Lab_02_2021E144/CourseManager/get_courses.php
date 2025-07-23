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

<h3>Courses <?= $semester !== '' ? "for Semester $semester" : "(All Semesters)" ?></h3>
<table border='1' id="courseTable">
<tr>
  <th>Code</th>
  <th>Name</th>
  <th>Credit</th>
  <th>Lecture Hours</th>
  <th>Semester</th>
  <th>MA ID</th>
  <th>Action</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr id="row-<?= $row['Ccode'] ?>">
  <form method="POST" action="update_course.php">
    <td><input type="text" name="code" value="<?= htmlspecialchars($row['Ccode']) ?>" readonly></td>
    <td><input type="text" name="name" value="<?= htmlspecialchars($row['Cname']) ?>"></td>
    <td><input type="number" name="credit" value="<?= htmlspecialchars($row['Credit']) ?>"></td>
    <td><input type="number" name="hours" value="<?= htmlspecialchars($row['LectureHours']) ?>"></td>
    <td><input type="number" name="semester" value="<?= htmlspecialchars($row['Semester']) ?>"></td>
    <td><input type="number" name="maid" value="<?= htmlspecialchars($row['MAid']) ?>"></td>
    <td>
      <button type="submit">Save</button>
  </form>
      <form method="POST" action="delete_course.php" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this course?');">
        <input type="hidden" name="code" value="<?= htmlspecialchars($row['Ccode']) ?>">
        <button type="submit">Delete</button>
      </form>
    </td>
</tr>
<?php endwhile; ?>
</table>

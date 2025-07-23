<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Course Manager</title>
  <script>
    // Load courses on page load
    window.onload = function() {
      showCourses("");
    }

    // Load courses based on semester
    function showCourses(semester) {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function() {
        document.getElementById("courseArea").innerHTML = this.responseText;
      }
      xhttp.open("GET", "get_courses.php?semester=" + semester);
      xhttp.send();
    }

    // Dynamically add a new row with form inputs
    function addCourseRow() {
      const table = document.getElementById("courseTable");

      // Create form
      const form = document.createElement("form");
      form.method = "POST";
      form.action = "add_course.php";

      // Create table row
      const row = document.createElement("tr");

      // Fill row with input fields
      row.innerHTML = `
        <td><input type="text" name="code" required></td>
        <td><input type="text" name="name" required></td>
        <td><input type="number" name="credit" required></td>
        <td><input type="number" name="hours" required></td>
        <td><input type="number" name="semester" min="1" max="5" required></td>
        <td><input type="number" name="maid" required></td>
        <td><button type="submit">Save</button></td>
      `;

      // Append the row to the form, and form to the table's parent
      form.appendChild(row);
      table.parentElement.appendChild(form);
    }
  </script>
</head>
<body>
  <h2>Select Semester</h2>
  <select onchange="showCourses(this.value)">
    <option value="">--All Semesters--</option>
    <option value="1">Semester 1</option>
    <option value="2">Semester 2</option>
    <option value="3">Semester 3</option>
    <option value="4">Semester 4</option>
    <option value="5">Semester 5</option>
  </select>

  <div id="courseArea"></div>

  <br>
  <button onclick="addCourseRow()">Add New Course</button>
</body>
</html>

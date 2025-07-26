<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Course Manager</title>
  <style>
    /* Table styles */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      vertical-align: middle;
    }
    th {
      background-color: #007BFF;
      color: white;
      text-align: left;
    }

    /* Inputs and selects */
    input[type="text"],
    input[type="number"],
    select {
      width: 100%;
      box-sizing: border-box;
      padding: 6px;
      font-size: 14px;
    }

    /* Buttons */
    button {
      padding: 6px 12px;
      border: none;
      background-color: #007BFF;
      color: white;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.2s ease;
    }
    button:hover {
      background-color: #0056b3;
    }
  </style>

  <script>
    // Load all courses on page load
    window.onload = function() {
      showCourses("");
    }

    // Fetch and display courses filtered by semester
    function showCourses(semester) {
      const xhr = new XMLHttpRequest();
      xhr.onload = function() {
        document.getElementById("courseArea").innerHTML = this.responseText;
      };
      xhr.open("GET", "get_courses.php?semester=" + encodeURIComponent(semester));
      xhr.send();
    }

    // Add a new row with input fields inside a form to add a new course
    function addCourseRow() {
  const table = document.getElementById("courseTable");
  if (!table) {
    alert("Please select a semester first to load courses.");
    return;
  }

  const semesterSelect = document.querySelector('select');
  const selectedSemester = semesterSelect.value;
  if (!selectedSemester) {
    alert("Please select a semester first.");
    return;
  }

  // Create table row
  const row = document.createElement("tr");

  // Create form element inside the row (one cell with colspan covering all columns)
  row.innerHTML = `
  <td colspan="5" style="padding: 0;">
    <form method="POST" action="add_course.php" 
          style="display: flex; padding: 6 6px; gap: 8px; align-items: center; width: 100%;">
      
      <input type="text" name="code" required placeholder="Code" 
             style="width: 15%;">
             
      <input type="text" name="name" required placeholder="Name" 
             style="width: 25%;">
             
      <input type="number" name="credit" required min="0" placeholder="Credit" 
             style="width: 15%;">
             
      <input type="number" name="hours" required min="0" placeholder="Hours" 
             style="width: 15%;">
             
      <input type="number" name="maid" required placeholder="MAid" 
             style="width: 15%;">
             
      <input type="hidden" name="semester" value="${selectedSemester}">
      
      <button type="submit" 
               min-width: 80px; background-color: #007BFF; color: white; border: none; border-radius: 4px; padding: 6px;">
        Save
      </button>
    </form>
  </td>
`;



  table.querySelector('tbody')?.appendChild(row) || table.appendChild(row);
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
    <option value="5">Semester 6</option>
  </select>

  <div id="courseArea"></div>

  <br>
  <button onclick="addCourseRow()">Add New Course</button>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management System</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #F08080;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #FFFFFF;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-family:Georgia, serif;
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #FF7F50;
        }
    </style>
</head>
<body>
    <?php include "includes/header.php"; ?>

    <div class="container">
        <h2>Course Management System</h2>

        <ul>
            <li><a href="MA/CreateCourse.php">Click here to Create Course</a></li>
        </ul>
    </div>
</body>
</html>

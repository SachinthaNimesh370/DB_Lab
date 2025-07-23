<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #F08080;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"],
        button {
            background-color: #FF0000;
            color: #FFFFFF;
            padding: 10px 20px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
        }
        input[type="submit"]:hover,
        button:hover {
            background-color: #FF6347;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Course Details here.</h2>

        <form method="post" action="../includes/insert.php">
		
		    <label for="code">Course code</label>
            <input type="text" name="code" id="code">
			
            <label for="name">Course Name</label>
            <input type="text" name="name" id="name">

            

            <input type="submit" name="submit" value="Submit">
        </form>

        <a href="course.php" class="back-link">Back</a>
    </div>
</body>
</html>

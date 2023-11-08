<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Attendance Management System</h1>
<form action="login.php" method="post">
<?php if(isset($_GET["error"])){?>
             <p class="error"><?php echo $_GET["error"]."<br>"; ?></p>
        <?php }?>
<label for="users">Choose a user:</label>
  <select name="user" required>
    <option value="">Select</option>
    <option value="A">Admin</option>
    <option value="S">Student</option>
    <option value="F">Faculty</option>
  </select><br />
    <label>Username</label>
        <input type="text" placeholder="Enter Username" name="uname"><br>
    <label>Password</label>
        <input type="password" placeholder="Enter Password" name="password"><br>
    <button type="submit">LOGIN</button>
</form>
</body>
</html>
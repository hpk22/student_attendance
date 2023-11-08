<?php
include 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type ="text/css" href="css.bootstrap.min.css">
   
</head>
<body>
    <div>
        <?php
        $sub_sql="SELECT sub_name, sub_id from subject;";
        $sub_res=mysqli_query($conn, $sub_sql);
        if(isset($_POST['create'])){
            $sid= $_POST['sid'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $c_name =$_POST['c_name'];
            $subjects=$_POST['subject'];
            $user_sql="INSERT INTO users VALUES ('$sid','$password','S');";
            $user_res=mysqli_query($conn, $user_sql);
            $stud_sql="INSERT INTO student values('$sid', '$name', '$password', '$c_name');";
            $stud_res=mysqli_query($conn, $stud_sql);
            foreach($subjects as $sub)
            {
                $insert_subs="INSERT INTO studies values('$sid', '$sub');";
                $in_sub_res=mysqli_query($conn, $insert_subs);
            }
            if($stud_res and $user_res and $in_sub_res)
            {
                echo 'Successfully saved';
            }
            else{
                echo 'there were one or more errors while saving the data.';
            }
        }
    ?>
    </div>

<div>
    <form action="#" method="post">
        <div class="container">

            <div class="row">
                <div class="col-sm-3">
                <h1>Student Registration</h1>
                <p?> Fill up the form with correct values.</p>

                <label for="sid"><b>Student ID</b></label>
                <input class="form-control" type="text" name="sid" required>

                <label form ="password"><b>Password</b></label>
                <input class="form-control" type="text" name="password" required>

                <label form ="name"><b>Name</b></label>
                <input class="form-control" type="text" name="name" required>

                <label form ="c_name"><b>Class</b></label>
                <select class="form-control" type="text" name="c_name" required>
                    <option value = " "></option> 
                    <option value ="te-ce-b">TE-CE-B</option>
                    <option value = "te-ce-a">TE-CE-A</option>
                </select><br>
                <label for="subjects"><b>Subjects:</b></label>
                <?php while($row=mysqli_fetch_array($sub_res)){ ?>
                <?=$row['sub_name'];?><input type="checkbox" name="subject[]" value="<?=$row['sub_id'];?>" /><br>
                <?php }?>
                <hr class="mb-3">
                <input class= "btn btn-primary" type="submit" name="create" value ="Submit">
            </div>
            <button><a href="./logout.php">Logout</a></button>
        </div>
    </form>
</div>

</body>
</html>
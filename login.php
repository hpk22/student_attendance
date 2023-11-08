<?php
session_start();
include 'db_conn.php';

function validate($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

if(isset($_POST['uname']) && isset($_POST['password']))
{
    $uname=validate($_POST['uname']);
    $pass=validate($_POST['password']);
    $_SESSION['uid']=$uname;
    $_SESSION['pass']=$pass;
}

if(empty($uname))
{
    header("Location: index.php?error=Username is required.");
    exit();
}

if(empty($pass))
{
    header("Location: index.php?error=Password is required.");
    exit();
}
if($_POST['user']=='A')
{
$sql0="SELECT * FROM admin WHERE adid='$uname' and password='$pass'";
$result0=mysqli_query($conn, $sql0);
if(mysqli_num_rows($result0)==1)
{
    $row=mysqli_fetch_assoc($result0);
    $_SESSION['name']=$row['adname'];
    header ('Location: adminHome.php');
    exit();
}
else{
    header('Location: index.php?error=Username or password is incorrect');
    exit();
}
}
else if($_POST['user']=='F')
{
    $sql1="SELECT * FROM faculty WHERE fid='$uname' and password='$pass'";
    $result1=mysqli_query($conn, $sql1);
    if(mysqli_num_rows($result1)==1)
    {
    $row=mysqli_fetch_assoc($result1);
    $_SESSION['name']=$row['fname'];
    header ('Location: facultyHome.php');
    exit();
    }
    else{
        header('Location: index.php?error=Username or password is incorrect');
        exit();
    }
}
else{
    $sql2="SELECT * FROM student WHERE sid='$uname' and password='$pass'";
    $result2=mysqli_query($conn, $sql2);
    if(mysqli_num_rows($result2)==1)
    {
    $row=mysqli_fetch_assoc($result2);
    $_SESSION['name']=$row['sname'];
    $_SESSION['class']=$row['c_name'];
    header ('Location: studentHome.php');
    exit();
    }
    else{
        header('Location: index.php?error=Username or password is incorrect');
        exit();
    }
}
?>

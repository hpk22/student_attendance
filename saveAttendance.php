<?php 
include 'db_conn.php'; 
session_start();

if (isset($_POST['save'])){
    $students=$_POST['student'];
    $time=$_SESSION['selectedTime'];
    $subid=$_SESSION['selectedSubject'];
    $date=$_SESSION['selectedDate'];
    $class=$_SESSION['selectedClass'];
    foreach($students as $item)
    {
        echo $item . "<br>";
        $att_sql="INSERT INTO attendance(sid, sub_id, DateOfAtt, timeslot, att) VALUES('$item', '$subid', '$date', '$time', 'P');";
        $present=mysqli_query($conn, $att_sql);
    }
    $absent_sql="INSERT INTO attendance(sid, sub_id, DateOfAtt, timeslot, att) SELECT s1.sid, '$subid', '$date', '$time', 'A' from student s1, studies s2 where s1.sid=s2.sid and s2.sub_id='$subid' and s1.c_name='$class' and s1.sid not in(select sid from attendance where sub_id='$subid' and att='P' and DateOfAtt='$date' and timeslot='$time');";
    $absent=mysqli_query($conn, $absent_sql);
    if($present and $absent)
    {
        header("location: facultyHome.php?msg=Attendance Saved Successfully!");
        exit();
    }
    else{
        header("location: facultyHome.php?msg=Attendance not Saved!");
        exit();
    }
}
?>
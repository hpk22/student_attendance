<?php
session_start();    
include ("db_conn.php");
$date=$_SESSION['selectedDate'];
$subid=$_SESSION['selectedSubject'];
$time=$_SESSION['selectedTime'];
$sub_sql="SELECT sub_name from subject where sub_id='$subid';";
$sub_result=mysqli_query($conn, $sub_sql);
$sub_row=mysqli_fetch_array($sub_result);
$sql="SELECT sid, sub_id, DateOfAtt, timeslot, att from attendance where DateOfAtt='$date' and sub_id='$subid' and timeslot='$time';";
$result=mysqli_query($conn,$sql);

if(isset($_SESSION['update']))
{
    unset($_SESSION['update']);
    $clear_temp="DELETE FROM temp_attendance;";
    $clear_temp_res=mysqli_query($conn, $clear_temp);
    $in_sql= "INSERT INTO temp_attendance(sid, sub_id, DateOfAtt, timeslot, att) SELECT sid, sub_id, DateOfAtt, timeslot, att from attendance where DateOfAtt='$date' and sub_id='$subid' and timeslot='$time';";
    $in_result=mysqli_query($conn, $in_sql);
}

if (isset($_POST["save"])){
    unset($_POST["save"]);
    $presentOnes=$_POST['updated_present'];
    $del_og="DELETE FROM attendance where sid in (select sid from temp_attendance) and sub_id='$subid' and DateOfAtt='$date' and timeslot='$time';";
    $del_og= mysqli_query($conn, $del_og);
    foreach($presentOnes as $item){
        $sql="INSERT INTO attendance(sid, sub_id, DateOfAtt, timeslot, att) values('$item', '$subid', '$date','$time', 'P');";
        $pr_res=mysqli_query($conn, $sql);        
    }
    $ab_sql="INSERT INTO attendance(sid, sub_id, DateOfAtt, timeslot, att) SELECT sid, sub_id, DateOfAtt, timeslot, 'A' from temp_attendance where sid not in(SELECT sid from attendance where sid in (select sid from temp_attendance) and sub_id='$subid' and DateOfAtt='$date' and timeslot='$time' and att='P');";
    $ab_result=mysqli_query($conn, $ab_sql);
    if($pr_res and $ab_result){
        echo "Successfully updated!";
    }
    else{
        echo "Not Updated";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Attendance</title>
</head>
<body>
    <h3>Updating Attendance for Date: <?=$date?> and Subject: <?=$sub_row['sub_name']?></h3>
    <?php  if(mysqli_num_rows($result)>0){ ?>
    <form action="#" method="post">
        <table style="text-align: center;">
            <b><tr>
                <td>Student</td>
                <td>Timeslot</td>
                <td>Original Attendance</td>
                <td>New Attendance</td>
            </tr></b>
            <?php while($row=mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?=$row['sid'];?></td>
                    <td><?=$row['timeslot']?></td>
                    <td><?=$row['att'];?></td>
                    <td><input type="checkbox" name="updated_present[]" value="<?=$row['sid'];?>" /></td>
                </tr>
                <?php }?>
        </table>
        <button type="submit" name="save" id="togglebtn">Save</button>
    </form>
    <?php }else{echo "No Attendance records for given criteria!";}?>
    <br><br>
    <button><a href="facultyHome.php">Back to home page</a></button>
</body>
</html>
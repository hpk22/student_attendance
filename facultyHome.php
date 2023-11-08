<?php
session_start();
include 'db_conn.php';
if(isset($_SESSION['uid']) && isset($_SESSION['pass']))
{ 
    $uid=$_SESSION['uid'];
    $cls_sql="SELECT c_name from teaches where fid='$uid';";
    $cls_res=mysqli_query($conn, $cls_sql);
    $sub_sql="SELECT ts.sub_id, s.sub_name from takes_sub ts, subject s where ts.sub_id=s.sub_id and ts.fid='$uid';";
    $sub_res=mysqli_query($conn, $sub_sql);
    if(isset($_GET['SHOW'])){
    $all_sql="SELECT s.sub_name, sid, DateOfAtt, s.sub_id, timeslot, att from attendance a, subject s where a.sub_id in (SELECT sub_id from takes_sub where fid='$uid') and s.sub_id=a.sub_id;";
    $all_res=mysqli_query($conn, $all_sql);
    }
    if(isset($_POST['search']))
    {
        $_SESSION['selectedDate']=$_POST['doa'];
        $_SESSION['selectedTime']=$_POST['timeslot']; //use these in saveAttendance.php, when submit is pressed.
        $_SESSION['selectedSubject']=$_POST['subject'];
        $_SESSION['selectedClass']=$_POST['class'];
        $subid=$_SESSION['selectedSubject'];
        $class=$_SESSION['selectedClass'];
        $stud_sql="SELECT s1.sid, s1.sname, s0.sub_name from student s1, studies s2, subject s0 where s0.sub_id=s2.sub_id and s1.c_name='$class' and s2.sub_id='$subid' and s1.sid=s2.sid;";
        $stud_res=mysqli_query($conn, $stud_sql);
    }
    else if(isset($_POST['update']))
    {
        $_SESSION['selectedDate']=$_POST['doa'];
        $_SESSION['selectedTime']=$_POST['timeslot']; //use these in saveAttendance.php, when submit is pressed.
        $_SESSION['selectedSubject']=$_POST['subject'];
        //$_SESSION['selectedClass']=$_POST['class'];
        $_SESSION['update']=1;
        header("Location: updateAtt.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./home.css">
</head>
<body>
    <div class="main">
        <p id="user">Faculty</p>
        <h1>Welcome <?php echo $_SESSION['name'] ?>!</h1>
        <form method="post">
        <label for="class">Choose class:</label>
        <select name="class" required>
            <option value="">Select</option>
            <?php while($cls=mysqli_fetch_array($cls_res)){?>
                <option value="<?=$cls['c_name']?>"><?=$cls['c_name']?></option>
            <?php }?>
        </select>
        <label for="subject">Subject:</label>
        <select name="subject" required>
            <option value="">Select</option>
            <?php while($cls=mysqli_fetch_array($sub_res)){?>
                <option value="<?=$cls['sub_id']?>"><?=$cls['sub_name']?></option>
            <?php }?>
        </select>
        <label for="Date">Date:</label>
            <input name="doa" type="date" />
        <label for="Time">TimeSlot:</label>
        <select name="timeslot" required>
        <option value="">Select</option>
        <option value="8:30am to 9:30am">8:30am to 9:30am</option>
        <option value="9:30am to 10:30am">9:30am to 10:30am</option>
        <option value="10:45am to 12:45pm">10:45am to 12:45pm</option>
        <option value="1:45pm to 2:45pm">1:45pm to 2:45pm</option>
        <option value="3:00pm to 5:00pm">3:00pm to 5:00pm</option>
        </select>
            <button type="submit" name="search" id="togglebtn">Search</button>
            <button type="submit" name="update" id="togglebtn">Show/Edit</button>
        </form>
        <?php if(isset($_POST['search'])){ unset($_POST['search']);
            if(mysqli_num_rows($stud_res)>=1){ ?>
        <form action="saveAttendance.php" method="post">
            <table>
                <tr>
                    <td>SrNo.</td>
                    <td>Name</td>
                    <td>Class</td>
                    <td>Subject</td>
                    <td>Attendance</td>
                </tr>
                <?php $i=0; while($stud=mysqli_fetch_array($stud_res)){ $i=$i+1;?>
                <tr>
                    <td><?=$i;?>.</td>
                    <td><?=$stud['sname'];?></td>
                    <td><?=$class?></td>
                    <td><?=$stud['sub_name'];?></td>
                    <td><input type="checkbox" name="student[]" value="<?= $stud['sid'];?>" /></td>
                </tr>
                <?php }?>
            </table>
            <button type="submit" name="save" id="togglebtn">Save</button>
        </form>
        <?php }
        else{
            echo "No records found!";
        }
    } ?>
        <?php if(isset($_GET["msg"])){?>
             <p class="msg"><?php echo $_GET["msg"]; ?></p>
        <?php }?>
        <a class="logout" href="./logout.php" style="margin-top:0px">Logout</a>
        <form action="#" method="get">
            <button type="submit" name="SHOW" id="togglebtn">Show Attendance</button>
        </form>

        <?php if(isset($_GET['SHOW'])){unset($_GET['SHOW']);   
           if(mysqli_num_rows($all_res)>0){ ?>
            <h3>All Previous Attendance: </h3>
        <table id="allatt" style="text-align: center">
                <tr>
                    <td>SrNo.</td>
                    <td>Student</td>
                    <td>Subject</td>
                    <td>Date</td>
                    <td>Timeslot</td>
                    <td>Attendance<td>
                </tr>
                <?php $i=0; while($allrow=mysqli_fetch_array($all_res)){ $i=$i+1;?>
                <tr>
                    <td><?=$i;?>.</td>
                    <td><?=$allrow['sid'];?></td>
                    <td><?=$allrow['sub_name'];?></td>
                    <td><?=$allrow['DateOfAtt']?></td>
                    <td><?=$allrow['timeslot']?></td>
                    <td><?=$allrow['att']?></td>
                </tr>
                <?php }?>
            </table>
            <?php }else{ echo "No previous attendance records!";}}?>
    </div>
</body>
</html>

<?php
}
else{
    header ("Location: index.php");
    exit();
}
<?php
session_start();
include 'db_conn.php';

if(isset($_SESSION['uid']) && isset($_SESSION['pass']))
{
    $sid=$_SESSION['uid'];
    $sub_sql="SELECT s2.sub_id, s3.sub_name from student s1, studies s2, subject s3 where s1.sid='$sid' and s1.sid=s2.sid and s2.sub_id=s3.sub_id;";
    $sub_res=mysqli_query($conn, $sub_sql);
    if(isset($_POST['srch-by-sub']))
    {
        $subid=$_POST['subject'];
        $forsubname="SELECT sub_name from subject where sub_id='$subid';";
        $showsubname=mysqli_query($conn, $forsubname);
        $resultsub=mysqli_fetch_array($showsubname);
        
        $att_sql="SELECT DateOfAtt, timeslot, att from attendance where sid='$sid' and sub_id='$subid';";
        $att_res=mysqli_query($conn, $att_sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./home.css">
   
</head>
<body>
    <div class="main">
        <p id="user">Student</p>
        <h1>Welcome <?php echo $_SESSION['name'] ?>!</h1>
        <form method="POST" action="#">
        <p class="mess">Your class is: <?php echo $_SESSION['class'];?>.</p>
        <select name="subject" required>
            <option value="">Select</option>
            <?php while($sub=mysqli_fetch_array($sub_res)){?>
                <option value="<?=$sub['sub_id']?>"><?=$sub['sub_name']?></option>
            <?php }?>
        </select>
        <button name="srch-by-sub" id="togglebtn">Search</button>
        </form>
        <?php if(isset($_POST['srch-by-sub'])){ unset($_POST['srch-by-sub']);?>
            <p class="mess">Showing attendance for subject: <?=$resultsub['sub_name']; ?>.</p>
            <?php if(mysqli_num_rows($att_res)>=1){ ?>
            <table>
                <tr>
                    <td>SrNo.</td>
                    <td>Date<td>
                    <td>Timeslot<td>
                    <td>Attendance<td>
                </tr>
                <?php $i=0; while($att=mysqli_fetch_array($att_res)){ $i=$i+1;?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?=$att['DateOfAtt'];?></td>
                        <td><?=$att['timeslot'];?></td>
                        <td><?=$att['att'];?></td>
                    <tr>
                <?php }?>
            </table>
        <?php }else{echo "No records found!";}
        }?>
        <a href="./logout.php" class="logout">Logout</a>
    </div>
</body>
</html>

<?php
}
else{
    header ('Location: index.php');
    exit();
}
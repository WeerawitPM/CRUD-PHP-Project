<?php

session_start();
include 'php/server.php';

if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
    echo "<script>window.location='php/login.php';</script>";
} else {
    $id=$_GET['user_id'];
    $sql="SELECT * FROM `tb_user` WHERE `user_id`='$id' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="container"> 
        <div class=" h4 text-center  alert alert-success mb-4 " role="alert"> แสดงข้อมูลสมาชิก </div>
        <a href="xi-member.php" class="btn btn-success mb-4">เพิ่มข้อมูล</a>
    <table class="table table-striped">
        <tr>
            <th>UserID</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>ตำแหน่งงาน</th>
            <th>Username</th>
            <th>วันที่สมัคร</th>
            <th>สถานะ</th>
            <th></th>
            <th></th>
        </tr>
      <?php
        $sql = "SELECT * FROM `tb_user`";
        $result=mysqli_query($conn,$sql);
        $user_status = 'user_status';

        while($row=mysqli_fetch_array($result)){ 
        ?>
            <tr>
                <td><?=$row["user_id"]?></td>
                <td><?=$row["user_fname"]?></td>
                <td><?=$row["user_lname"]?></td>
                <td><?=$row["user_position"]?></td>
                <td><?=$row["user_username"]?></td>
                <td><?=$row["user_datereg"]?></td>
                <td><?=$row["user_status"]?></td>
                <td><a href="admin_edit.php ?user_id=<?=$row["user_id"]?>"  class="btn btn-warning">แก้ไขข้อมูล</a>   </td>
                <td><a href="delete_member.php ?user_id=<?=$row["user_id"]?>"  class="btn btn-danger" onclick="Del(this.href); return false;">ลบข้อมูล</a>   </td>
            </tr>
            <?php
        }
        mysqli_close($conn); //ปิดการเชื่อมต่อฐานข้อมูล
        ?>
    </table>
</body>
</html>

<script language="JavaScript">
    function Del(mypage){
        var agree=confirm("คุณต้องการลบข้อมูลหรือไม่");
        if(agree){
            window.location=mypage;
        }
    }
</script>
<?php

session_start();
include 'php/server.php';

if (!isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
    echo "<script>window.location='php/login.php';</script>";
} else {
    $id=$_SESSION['user_login'];
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
    <title>Add member</title>
     <!-- Bootstrap CSS -->
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class=" h4 text-center  alert alert-success mb-4 " role="alert"> แก้ไขข้อมูลสมาชิก </div>
                <form method="POST" action="user_update.php">
                    <label>UserID</label>
                    <input type="text" name="user_id"  class="form-control" value=<?=$row['user_id']?> readonly> <br>
                    <label>ชื่อ</label>
                    <input type="text" name="user_fname"  class="form-control" value=<?=$row['user_fname']?> required> <br>
                    <label>นามสกุล</label>
                    <input type="text" name="user_lname" class="form-control" value=<?=$row['user_lname']?> required> <br>
                    <label>ตำแหน่งงาน</label>
                    <input type="text" name="user_position" class="form-control" value=<?=$row['user_position']?> required><br>
                    <label>รหัสผ่าน</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" required><br>
                    <label>ยืนยันรหัสผ่าน</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required><br>
                    <input type="submit" value="Update" class="btn btn-success" >
                    <a href="php/pic.php"  class="btn btn-danger">Cancel</a>   
                </form>
            </div>
        </div>
    </div>
</form>  
</body>
</html>
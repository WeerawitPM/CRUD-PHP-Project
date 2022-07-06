<?php

session_start();

include 'php/server.php';
$user_id=$_POST['user_id'];
$user_fname=$_POST['user_fname'];
$user_lname=$_POST['user_lname'];
$user_position=$_POST['user_position'];
$user_password=$_POST['user_password'];
$confirm_password = $_POST['confirm_password'];
$password = md5($user_password);
$errors = array();

if (empty($user_password)) {
    array_push($errors, "กรุณากรอกรหัสผ่าน");
    echo "<script>alert('กรุณากรอกรหัสผ่าน');</script>";
}

if (empty($confirm_password)) {
    array_push($errors, "กรุณากรอกรหัสผ่าน");
    echo "<script>alert('กรุณากรอกรหัสผ่าน');</script>";
}

if ($user_password != $confirm_password) {
    array_push($errors, "รหัสผ่านไม่ตรงกัน");
    echo "<script>alert('รหัสผ่านไม่ตรงกัน');</script>";
}
if (count($errors) == 0) {
    $sql = "UPDATE `tb_user` set `user_fname`='$user_fname', `user_lname`='$user_lname', `user_position`='$user_position', `user_password`='$password' WHERE `user_id`= '$user_id' ";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='php/pic.php';</script>";
    }else{
        echo "<script>alert('เกิดข้อผิดพลาด');</script>";
        echo "<script>window.location='php/pic.php';</script>";
    }
} else {
    echo "<script>window.location='php/pic.php';</script>";
}


?>

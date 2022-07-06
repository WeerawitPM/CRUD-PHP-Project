<?php
include 'php/server.php';
$user_fname = $_POST['user_fname'];
$user_lname = $_POST['user_lname'];
$user_position = $_POST['user_position'];
$user_username = $_POST['user_username'];
$user_password = $_POST['user_password'];
$user_status = $_POST['user_status'];

$sql = "INSERT INTO `tb_user`(user_fname,user_lname,user_position,user_username,user_password,user_status) 
        VALUES('$user_fname','$user_lname','$user_position','$user_username','$user_password','$user_status',) ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
    echo "<script>window.location='show_member.php';</script>";
}else{
    echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
}
mysql_close($conn);

?>
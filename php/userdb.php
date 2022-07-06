<?php

session_start();

include('server.php');

$user_fname = $_POST['user_fname'];
$user_lname = $_POST['user_lname'];
$user_position = $_POST['user_position'];
$user_username = $_POST['user_username'];
$user_password = $_POST['user_password'];
$password = md5($user_password);
$confirm_password = $_POST['confirm_password'];
$user_status = filter_input(INPUT_POST, 'user_status', FILTER_SANITIZE_STRING);
$errors = array();

if ($user_password != $confirm_password) {
    array_push($errors, "รหัสผ่านไม่ตรงกัน");
    $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
}

$user_check_query = "SELECT * FROM `tb_user` WHERE user_username = '$user_username'";
$query = mysqli_query($conn, $user_check_query);
$result = mysqli_fetch_assoc($query);

if ($result) {
    if ($result['user_username'] === $user_username) {
        array_push($errors, "ชื่อผู้ใช้มีคนอื่นใช้แล้ว");
        $_SESSION['error'] = 'ชื่อผู้ใช้มีคนอื่นใช้แล้ว';
    }
}

if (count($errors) == 0) {
    $sql = "INSERT INTO `tb_user` (`user_fname`, `user_lname`, `user_position`, `user_username`, `user_password`, `user_datereg`, `user_status`) 
            VALUES ('$user_fname', '$user_lname', '$user_position', '$user_username', '$password', NOW(), '$user_status')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='login.php' class='alert-link'>คลิกที่นี่</a> เพื่อเข้าสู่ระบบ";
        header('location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header('location: index.php');
    foreach ($errors as $error) :
        echo ($error);
    endforeach;
}

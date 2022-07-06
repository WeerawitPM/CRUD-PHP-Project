<?php
    session_start();
    include('server.php');

    $errors = array();

    if(isset($_POST['login_user'])) {
        $user_username = mysqli_real_escape_string($conn, $_POST['user_username']);
        $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);

        $password = md5($user_password);
        $query = "SELECT * FROM `tb_user` WHERE user_username = '$user_username' AND user_password = '$password' ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            while($row = $result->fetch_assoc()) {
                // echo "id: " . $row["user_id"]. " - Name: " . $row["user_username"]. " " . "<br>";
                $_SESSION['user_login'] = $row["user_id"];
                header('location: pic.php');
            }
        } else {
            $_SESSION['error'] = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
            header('location: login.php');
        }
    }
?>

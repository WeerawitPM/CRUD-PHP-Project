<?php
    session_start();
    include 'server.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT-TECHNOCOM</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <div class="title">
            <img src="../images/IT.png">
            <h1>ลงทะเบียน</h1>
        </div><br>
        <hr><br>
        <form action="userdb.php" method="POST">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert-1" role="alert">
                    <p>
                        <?php
                            echo $_SESSION['error'];
                            unset($_SESSION['error']); 
                        ?>
                    </p>
                </div><br>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert-2" role="alert">
                    <p>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']); 
                        ?>
                    </p>
                </div><br>
            <?php } ?>
            <div class="user-details">
                <div class="input-box">
                    <label class="details">ชื่อ</span>
                    <input type="text" placeholder="Your Name" id="user_fname" name="user_fname" required><br>
                </div>
                <div class="input-box">
                    <label class="details">นามสกุล</span>
                    <input type="text" placeholder="Your Lastname" id="user_lname" name="user_lname" required><br>
                </div>
            </div><br>
            <div class="form-group">
                <label class="details">ตำแหน่งงาน</span>
                <input type="text" placeholder="Your Job" id="user_position" name="user_position" required><br>
            </div><br>
            <div class="title1">
                ข้อมูลสมัครสมาชิก
            </div><br>
            <div class="form-group">
                <span class="details">Username</span>
                <input type="text" id="user_username" name="user_username" required><br>
            </div><br>
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" id="user_password" name="user_password" required><br>
                </div>
                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" id="confirm_password" name="confirm_password" required><br>
                </div>
            </div><br>
            <div class="form-group">
                <div class="input-box">
                    <span class="details">เลือกสถานะของคุณ</span><br>
                    <select name="user_status" id="user_status">
                        <option value="0">Admin</option>
                        <option value="1">User</option>
                    </select>
                </div>
            </div><br>
            <div class="title2">
                มีรหัสผ่านแล้วใช่ไหม? <a href='login.php' class='alert-link'>คลิกที่นี่</a> เพื่อเข้าสู่ระบบเลย
            </div><br>
            <div class="button-right">
                <button type="submit" value="register" name="register">ลงทะเบียน</button>
                <button class="reset" type="reset" value="Reset">ยกเลิก</button>
            </div>
        </form>
    </div>
</body>

</html>
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
            <h1>เข้าสู่ระบบ</h1>
        </div><br>
        <hr><br>
        <form action="login_db.php" method="POST">
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
            <div class="form-group">
                <label class="details">Username</span>
                <input type="text" id="user_username" name="user_username" required><br>
            </div><br>
            <div class="form-group">
                <span class="details">Password</span>
                <input type="password" id="user_password" name="user_password" required><br>
            </div><br>
            <div class="button-right">
                <button onClick="location.href='index.php'" value="Register">ลงทะเบียน</button>
                <button class="reset"  type="submit" name="login_user">เข้าสู่ระบบ</button>
            </div>
        </form>
    </div>
</body>

</html>
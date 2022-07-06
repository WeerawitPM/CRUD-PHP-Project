<?php
    session_start();
    include 'server.php';

    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
        echo "<script>alert('กรุณาเข้าสู่ระบบ');</script>";
        echo "<script>window.location='login.php';</script>";
    } else {
        $id=$_SESSION['user_login'];
        $sql="SELECT * FROM `tb_user` WHERE `user_id`='$id' ";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $user_fname = $row['user_fname'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT-TECHNOCOM</title>

    <link rel="stylesheet" href="../css/style_pic.css">
</head>

<body>
    <div class=user>
        <p>สวัสดีคุณ, <?php echo  $user_fname; ?></p>
        <div class="button-right">
            <button class="logout" href="logout.php" onclick="Logout(); return false;"> ออกจากระบบ </button>
            <button class="edit" href="../user_edit.php ?user_id=<?=$_SESSION['user_login']?>" onclick="Edit();">แก้ไขข้อมูล</button>
        </div>
    </div>
    <div class="container">
        <div class="title">
            <img src="../images/IT.png">
            <h1>อัพโหลดรูปภาพ</h1>
        </div><br>
        <hr><br>
        <form action="picdb.php" method="POST" enctype="multipart/form-data">
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
            <div class="form-group">
                <label for="file">เพิ่มรูป</label>
                <input type="file" id="file" name="file">
            </div><br>
            <div class="button-right">
                <button class="upload" type="submit" name="submit" value="submit">อัพโหลด</button>
                <button class="reset"  type="reset" name="login_user">ยกเลิก</button>
            </div>
            <div class="column">
                <?php
                $id = $_SESSION['user_login'];
                $query = $conn->query("SELECT * FROM `tb_face` WHERE `user_id` = '$id' AND `face_pic` ORDER BY `face_detetime` DESC");

                if ($query->num_rows > 0) {
                    while($row = $query->fetch_assoc()) {
                        $imageURL = '../upload_images/'.$row["face_pic"];
                ?>
                    <img src="<?php echo $imageURL; ?>" alt="" />
                <?php }
                }else{ ?>
                    <p>No image(s) found...</p>
                <?php } ?>
            </div>
        </form>
    </div>
</body>

</html>

<script language="JavaScript">
    function Logout(){
        var agree=confirm("คุณต้องการออกจากระบบใช่หรือไม่?");
        if(agree){
            window.location='logout.php';
        }
    }
    function Edit(){
        window.location='../user_edit.php';
    }
</script>
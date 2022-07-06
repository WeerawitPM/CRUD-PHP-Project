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
    <div class=" h4 text-center  alert alert-success mb-4 " role="alert"> เพิ่มข้อมูลสมาชิก </div>
<form method="POST" action="insert_member.php">
    <label>ชื่อ</label>
    <input type="text" name="ชื่อ"  class="form-control" placeholder="...ชื่อ" required ><br>
    <label>นามสกุล</label>
    <input type="text" name="นามสกุล" class="form-control" placeholder="...นามสกุล" required ><br>
    <label>ตำแหน่งงาน</label>
    <input type="text" name="ตำแหน่งงาน" class="form-control" placeholder="...ตำแหน่งงาน" required ><br>
    <label>password</label>
    <input type="text" name="password" class="form-control" placeholder="...password" required ><br>
    <label>firmpassword</label>
    <input type="text" name="firmpassword" class="form-control" placeholder="...firmpassword" required ><br>
    <input type="submit" value="submit" class="btn btn-success" >
    <a href="show_member.php"  class="btn btn-danger">Cancel</a>   
</form>  
</body>
</html>
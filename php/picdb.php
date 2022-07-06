<?php

session_start();
// Include the database configuration file
include 'server.php';

$id = $_SESSION['user_login'];
// File upload path
$targetDir = "../upload_images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into `tb_face` (`user_id`, `face_pic`, `face_detetime`) VALUES ('$id','$fileName', NOW())");
            if($insert){
                $_SESSION['success'] = "อัพโหลดไฟล์ ".$fileName. " สำเร็จ";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
    $_SESSION['error'] = 'กรุณาอัพโหลดไฟล์';
}
header('location: pic.php');
?>

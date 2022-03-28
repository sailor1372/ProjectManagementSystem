<?php
    session_start();
    $conn = mysqli_connect('localhost','PMSDB','9sZyQ6Y9','PMSDB'); //连接数据库
    $conn->query("set names'utf8'");
    $conn->set_charset('utf8_general_ci');
    $email = $_SESSION['email'];

    //把图片保存到服务器指定位置，并且把图片路径插入到数据库中
    if($_FILES["file"]["error"]){
        echo $_FILES["file"]["error"];
    } else {
        //控制上传文件的类型，大小
        if(($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/png") && $_FILES["file"]["size"]<1024000){
            //找到文件存放的位置
            //在服务器中新建一个uploads文件夹,图片名中也加入当前时间
            $imgname = $_FILES["file"]["name"];
            
            $filename = "static/user/".$_FILES["file"]["name"];
            //转换编码格式，只有转换成GB2312，move_uploaded_file函数才不会把图片名字里的中文变成乱码
            $filename1 = iconv("UTF-8","gb2312",$filename);
            
            //保存文件，将上传的临时文件移到web服务器中，见《PHP和MySQL web开发》P330
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename1);
            //这里的filename要utf8_general_ci格式,不然和数据库中编码不一致

            $sql="UPDATE USER SET IMAGE = '$imgname' WHERE EMAIL = '$email'";
            if($conn->query($sql)){
                $_SESSION['image'] = $imgname;
                echo "<script> parent.location.href='Profile-Account.php'; </script>";
            }else{
                echo "数据未插入数据库";
            };
        } else {
            echo "文件类型不正确！";
        }
    }
    $conn->close();
?>

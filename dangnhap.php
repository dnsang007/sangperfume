<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/stylelog.css">
</head>
<body>

    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="comback_home">  
                        <a href="index.php"> <img class="img-responsive pic-in" src="admin/resources/images/home.png" alt=" " ></a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Đăng nhập</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Tài khoản"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Lưu mật khẩu</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập"/>
                            </div>
                        </form>

                        <?php
                        if(isset($_POST['signin']))
                    {
                        $tendangnhap='';
                        $matkhau='';
                        if($_POST['your_name']==null)
                        {
                            echo "Vui lòng điền tên đăng nhập! <br />";
                        } 
                        else
                        {
                            $tendangnhap=($_POST['your_name']);
                        }
                        if($_POST['your_pass']==null)
                        {
                            echo "Vui lòng điền mật khẩu! <br />";
                        }
                        else
                        {
                            $matkhau=($_POST['your_pass']);
                        }
                        if($tendangnhap !='' && $matkhau !='')
                        {
                            include('include/connect.php');
                            $query = "SELECT * FROM khachhang WHERE taikhoan ='$tendangnhap' and matkhau='$matkhau'";
                            $stm = $obj->prepare($query);
                            $stm->execute();
                            $data = $stm->fetch(); 
                            if($data==0)
                            {
                                echo "Sai ten tai khoan hoac mat khau";
                            }
                            else 
                            {
                                $_SESSION['taikhoan']=$data['taikhoan'];
                                $_SESSION['idkhachhang']=$data['idkhachhang'];
                                $_SESSION['tenkhachhang']=$data['tenkhachhang'];
                                $_SESSION['sdt']=$data['sdt'];
                                $_SESSION['mail']=$data['mail'];
                                $_SESSION['diachi']=$data['diachi'];
                                echo $_SESSION['taikhoan'];
                                header('location:index.php');
                            }
                        }
                    }
                        ?>
                        <div class="social-login">
                            <span class="social-label">Hoặc đăng nhập với</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="signin-image">
                        <figure><img src="admin/resources/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="dangky.php" class="signup-image-link">Tạo tài khoản mới</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
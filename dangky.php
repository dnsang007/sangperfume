<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dang ky</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/stylelog.css">
</head>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="comback_home">  
                        <a href="dangnhap.php"> <img class="img-responsive pic-in" src="admin/resources/images/log_in.png" alt=" " ></a>
                    </div>
                    <div class="signup-form">
                        <h2 class="form-title">Đăng ký</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="tenkhachhang" id="tenkhachhang" placeholder="Họ và tên"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="sdt" id="sdt" placeholder="Số điện thoại"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="mail" id="mail" placeholder="Email của bạn"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="diachi" id="diachi" placeholder="Địa chỉ"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="taikhoan" id="taikhoan" placeholder="Tên tài khoản"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="matkhau" id="matkhau" placeholder="Mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="xnmatkhau" id="xnmakhau" placeholder="Xác nhận lại mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" value="1" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>Tôi đồng ý tất cả các tuyên bố trong <a href="#" class="term-service">Điều khoản dịch vụ</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký"/>
                            </div>
                            <?php
                                if(isset($_POST['signup']))
                                {
                                    if(isset($_POST['agree-term'])=='1')
                                {
                                    include('include/connect.php');
                                    $tenkhachhang='';
                                    $sdt='';
                                    $mail='';
                                    $diachi='';
                                    $taikhoan='';
                                    $matkhau='';
                                    $xnmatkhau='';
                                    if($_POST['tenkhachhang']==null)
                                    {
                                        echo "Vui lòng nhập tên của bạn! <br />";
                                    } 
                                    else
                                    {
                                        $tenkhachhang=$_POST['tenkhachhang'];
                                    }
                                    if($_POST['sdt']==null)
                                    {
                                        echo "Vui lòng nhập số điện thoại! <br />";
                                    } 
                                    else
                                    {
                                        $sdt=$_POST['sdt'];
                                    }
                                    if($_POST['mail']==null)
                                    {
                                        echo "Vui lòng nhập email! <br />";
                                    } 
                                    else
                                    {
                                        $mail=$_POST['mail'];
                                    }
                                    if($_POST['diachi']==null)
                                    {
                                        echo "Vui lòng nhập địa chỉ! <br />";
                                    } 
                                    else
                                    {
                                        $diachi=$_POST['diachi'];
                                    }
                                    if($_POST['taikhoan']==null)
                                    {
                                        echo "Vui lòng nhập tên tài khoản! <br />";
                                    } 
                                    else
                                    {
                                        $taikhoan=$_POST['taikhoan'];
                                    }
                                    if($_POST['matkhau']==null)
                                    {
                                        echo "Vui lòng nhập mật khẩu! <br />";
                                    } 
                                    else
                                    {
                                        $matkhau=$_POST['matkhau'];
                                    }
                                    if($_POST['xnmatkhau']==null)
                                    {
                                        echo "Vui lòng nhập lại mật khẩu! <br />";
                                    } 
                                    else
                                    {
                                        $xnmatkhau=$_POST['xnmatkhau'];
                                    }
                                    if($xnmatkhau == $matkhau)
                                    {
                                        $sql="INSERT INTO `khachhang`( tenkhachhang, sdt, mail, diachi, taikhoan, matkhau) VALUES ('$tenkhachhang','$sdt','$mail','$diachi','$taikhoan','$matkhau')";
                                        $data= $obj->prepare($sql);
                                        $data->execute();
                                        if($data)
                                        {
                                                echo "Đăng ký tài khoản thành công";
                                                //header('location:dangnhap.php');
                                        }
                                        else
                                        {  
                                                echo "Đăng ký tài khoản không thành công";
                                        }
                                    }
                                    else
                                    {
                                        echo "Mật khẩu nhập lại không chính xác !!!";
                                    }
                                }
                                else echo "Bạn phải đồng ý với Điều khoản dịch vụ !!!";
                                }
                            
                            ?>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="admin/resources/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="dangnhap.php" class="signup-image-link">Tôi đã là thành viên</a>
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
<?php
session_start();
?>
<style>
.form-group
{
    padding-left:
    padding-top:10px;
}
.form-group img
{
    width:150px;
    height:150px;
}
input[type=text] {
    width: 50%;
}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>SangPerfume's Admin</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		
		
  
		<!-- jQuery -->
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- jQuery Datepicker Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
		<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
		<!--[if IE]><script type="text/javascript" src="resources/scripts/jquery.bgiframe.js"></script><![endif]-->

		
		
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile">Admin</a>, bạn có <a href="#messages" rel="modal" title="3 Messages">3 tin nhắn</a><br />
				<br />
				<a href="#" title="View the Site">Xem trang web</a> | <a href="logout.php" title="Sign Out">Đăng xuất</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="http://www.google.com/" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
					Bảng điều khiển
					</a>       
				</li>
				
				<li> 
					<a href="#" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->
					Sản phẩm
					</a>
					<ul>
						<li><a class="current" href="index.php">Quản lý sản phẩm</a></li> <!-- Add class "current" to sub menu items also -->
						<li><a href="add-sp.php">Thêm sản phẩm mới</a></li>
						<li><a href="#">Quản lý danh mục</a></li>
						<li><a href="#">Quản lý bình luận</a></li>
					</ul>
				</li>
				
				
				<li>
					<a href="#" class="nav-top-item">
						Đơn hàng
					</a>
					<ul>
						<li><a href="#">Quản lý đơn hàng</a></li>
						<li><a href="#">Chưa xử lý</a></li>
						<li><a href="#">Đang vận chuyển</a></li>
						<li><a href="#">Không thành công</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Tin tức
					</a>
					<ul>
						<li><a href="#">Quản lý tin tức</a></li>
						<li><a href="#">Thêm tin tức</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Cài đặt
					</a>
					<ul>
						<li><a href="#">Chung</a></li>
						<li><a href="#">Thông tin của bạn</a></li>
						<li><a href="#">Quyền và Người quản trị</a></li>
					</ul>
				</li>    
			</ul> <!-- End #main-nav -->
		</div></div> <!-- End #sidebar -->
		<?php
		if(isset($_GET['page_layout'])){
			switch ($_GET['page_layout']) {
				case 'xoa':
					include 'xoa.php';
					break;

				case 'sua':
					include 'sua.php';
					break;

			}
		}else{
		}
	?>
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<div class="content-box"><!-- Start Content Box -->
				
            <?php 
    include('include/connect.php');
    $idsanpham=$_GET['idsanpham'];
    $sqlhienthi= "SELECT * FROM `sanpham` WHERE `idsanpham`=$idsanpham";
	$datahienthi= $obj->prepare($sqlhienthi);
	$datahienthi->execute();
	if(isset($_POST['sbm'])){
        $iddanhmuc=$_POST['iddanhmuc'];
		$tensanpham=$_POST['tensanpham'];

		$anhsanpham=$_FILES['anhsanpham']['name'];
		$anhsanpham_tmp=$_FILES['anhsanpham']['tmp_name'];

		$giasanpham=$_POST['giasanpham'];
		$motasanpham=$_POST['motasanpham'];
		$thuonghieu=$_POST['thuonghieu'];

        $sql_addsp= "INSERT INTO `sanpham` (`idsanpham`, `idhoadon`, `iddanhmuc`, `idkhuyenmai`, `tensanpham`, `anhsanpham`, `giasanpham`, `giakhuyenmai`, `thuonghieu`, `motasanpham`) 
        VALUES (NULL, NULL, '$iddanhmuc', NULL, '$tensanpham', '$anhsanpham', '$giasanpham', NULL, '$thuonghieu', '$motasanpham')";
		$data= $obj->prepare($sql_addsp);
	    $data->execute();
		move_uploaded_file($anhsanpham_tmp,'resources/images/'.$anhsanpham);
    }
 ?>
<div class="container-fluid">
	<div class="card">
		<div style="text-align:center;padding-top:10px;">
			<h2>Cập nhật sản phẩm</h2>
            <hr>
		</div>
		<div class="card-body">
        <?php
            foreach($datahienthi as $v)
            {
        ?>
			<form method="POST" enctype="multipart/form-data" accept-charset="utf-8">
            
                <div class="form-group">
					<label for="">Danh mục sản phẩm</label>
					<input type="number" min="1" max="3" name="iddanhmuc"  class="form-control"  required="">
				</div>
                
				<div class="form-group">
					<label for="">Tên sản phẩm</label>
					<input type="text" name="tensanpham"  class="form-control" required="">
				</div>

				<div class="form-group">
					<label for="">Ảnh sản phẩm</label>
					<a href=""><img src="resources/images/<?php echo($v['anhsanpham']) ?>" alt=" " >
				</div>

				<div class="form-group">
					<label for="">Giá sản phẩm</label>
					<input type="number" name="giasanpham" class="form-control" required="">
				</div>

				<div class="form-group">
					<label for="">Thương hiệu</label>
					<input type="text" name="thuonghieu"  class="form-control" required="">
				</div>

				<div class="form-group">
					<label for="">Mô tả sản phẩm</label>
					<input type="text" name="motasanpham" size="1000"  class="form-control" required="">
				</div>



				<button name="sbm" class="btn btn-success" type="submit" >Thêm</button>
			</form>
        <?php
            }
        ?>   
		</div>
	</div>
</div>
				
			</div> <!-- End .content-box -->
				
			<div class="clear"></div>
			
			
		</div> <!-- End #main-content -->
		
	</div></body>
  
</html>

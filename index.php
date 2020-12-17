<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('include/head.php') ?>
</head>
<body> 
	<!--header-->
	<?php include('include/header.php');?>
	<!--content-->
	<div class="content">
		<div class="container">
		<div class="women-in">
			<div class="col-md-9 col-d">
				<div class="banner">
				<img class="img-responsive pic-in" src="admin/resources/images/banner.jpg" alt=" " >
					<div class="banner-matter">
						<p>Trang phục của bạn sẽ không bao giờ là hoàn chỉnh nếu như không có nước hoa - C. JoyBell C. </p>		
						</div>
				</div>
				<!---->
				<div class="lady-in">
						<?php include ('include/content-left-sanpham.php') ?>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<?php include('include/content-right-nam.php'); ?>	
			<div class="clearfix"> </div>
			</div>
			<!--content-down-->
			<?php include('include/content-down.php'); ?>
	<!---->
	<?php include('include/footer.php'); ?>
</body>
</html>
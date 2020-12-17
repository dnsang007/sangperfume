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
						<li><a href="donhang.php">Quản lý đơn hàng</a></li>
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
				
				<div class="content-box-header">
					
					<h3>Quản lý sản phẩm</h3>
					
					<div class="clear"></div>
					
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
					
						</div>
						
						<table>
							
						<div>
	    <table class="box-qlsp">
	    		<tr>
		    		<td width="3%">id</td>
		    		<td width="13%">Tên sản phẩm</td>
		    		<td width="8%">Ảnh sản phẩm</td>
		    		<td width="6%">Giá</td>
		    		<td>Mô tả</td>		    		
		    		<td width="6%">Thương hiệu</td>
		    		<td width="7%">Hành động</td>
				</tr>
				<?php
					include('include/connect.php');
					$sql="SELECT * FROM `sanpham` order by idsanpham asc";
					$data= $obj->prepare($sql);
					$data->execute();
				?>
	    		<?php
					foreach($data as $row)
				{
				?>
					<table class="box-qlsp">
			    		<tr>
				    		<td width="3%;"><?php echo $row['idsanpham'];; ?></td>
				    		<td width="13%"><?php echo $row['tensanpham']; ?></td>
				    		<td width="8%">
							<img style="width:100%;" src="resources/images/<?php echo($row['anhsanpham']) ?>" alt=" " >		
				    		</td>
				    		<td width="6%"><?php echo number_format($row['giasanpham']); ?></td>
				    		<td><?php echo 'motasanpham' ?></td>
				    		
				    		<td width="6%"><?php echo $row['thuonghieu']; ?></td>
				    		<td width="7%"><a href="update.php?idsanpham=<?php echo $row['idsanpham']; ?>">Sửa <img src="resources/images/icons/pencil.png" alt="Edit"> </br>
							<a onclick="return Del ('<?php echo $row['tensanpham'] ?>')" href="index.php?page_layout=xoa&id=<?php echo $row['idsanpham']; ?>"> Xóa <img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" />
							</td>
				    	
				    	</tr>
					</table>
				<?php 
				}
				?>

	    </table>
						 
							<tfoot>
								<tr>
									<td colspan="6">
										
										
										<div class="pagination">
											<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
											<a href="#" class="number current" title="1">1</a>
											<a href="#" class="number" title="2">2</a>
											<a href="#" class="number " title="3">3</a>
											<a href="#" class="number" title="4">4</a>
											<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
				
			<div class="clear"></div>
			
			
		</div> <!-- End #main-content -->
		
	</div></body>
  
</html>

<?php 
	include 'include/connect.php';
 ?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'include/head.php'?>
</head>
<body>
	<?php
		if(isset($_GET['page_layout'])){
			switch ($_GET['page_layout']) {
				case 'danhsach':
					include 'include/danhsach.php';
					break;

				case 'them':
					include 'them.php';
					break;

				case 'xoa':
					include 'include/xoa.php';
					break;

				case 'sua':
					include 'include/sua.php';
					break;

				default:
					include 'include/danhsach.php';
					break;
			}
		}else{
			include 'include/danhsach.php';
		}
	?>
</body>
</html>

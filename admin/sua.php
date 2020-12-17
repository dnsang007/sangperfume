<?php 
	$id=$_GET['id'];


	$sql_up = "SELECT * FROM sanpham WHERE idsanpham = $id";
	$squery_up = mysqli_query($conn,$sql_up);
	$row_up = mysqli_fetch_assoc($squery_up);

	if(isset($_POST['sbm'])){
		$tensanpham=$_POST['tensanpham'];

		if($_FILES['anhsanpham']['name']==''){
			$anhsanpham = $row_up['anhsanpham'];
		}else{
			$anhsanpham = $_FILES['anhsanpham']['name'];
			$anhsanpham_tmp = $_FILES['anhsanpham']['tmp_name'];
			move_uploaded_file($anhsanpham_tmp,'./img/'.$anhsanpham);
		}

		$giasanpham=$_POST['giasanpham'];
		$mota=$_POST['mota'];
		$maloai=$_POST['maloai'];
		$thuonghieu=$_POST['thuonghieu'];

		$sql= "UPDATE sanpham SET tensanpham = '$tensanpham',anhsanpham = '$anhsanpham'  ,giasanpham = '$giasanpham' ,mota = '$mota',thuonghieu = '$thuonghieu' WHERE idsanpham = $id ";
		$query = mysqli_query($conn,$sql);
		
		header('location:index.php?page_layout=danhsanphamsach');
	}
 ?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2>Sửa sản phẩm</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data" accept-charset="utf-8">
				<div class="form-group">
					<label for="">Tên sản phẩm</label>
					<input type="text" name="tensanpham" class="form-control" required value="<?php echo $row_up['tensanpham']; ?> ">
				</div>

				<div class="form-group">
					<label for="">Ảnh sản phẩm</label>
					<input type="file" name="anhsanpham" >
				</div>

				<div class="form-group">
					<label for="">Giá sản phẩm</label>
					<input type="number" name="giasanpham" class="form-control" required value="<?php echo $row_up['giasanpham'];?>">
				</div>
				<div class="form-group">
					<label for="">Mô tả sản phẩm</label>
					<input type="text" name="mota" class="form-control" required="">
				</div>


				<div class="form-group">
					<label for="">Thương hiệu</label>
					<input type="text" name="thuonghieu" class="form-control" required="">
				</div>

				<button name="sbm" class="btn btn-success" type="submit" >Sửa</button>
			</form>
		</div>
	</div>
</div>
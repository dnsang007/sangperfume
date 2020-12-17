<?php 
	include('include/connect.php');
	$sql_danhmuc = "SELECT * FROM danhmuc";
	$data= $obj->prepare($sql_danhmuc);
	$data->execute();
	if(isset($_POST['sbm'])){
		$tensanpham=$_POST['tensanpham'];

		$anhsanpham=$_FILES['anhsanpham']['name'];
		$anhsanpham_tmp=$_FILES['anhsanpham']['tmp_name'];


		$giasanpham=$_POST['giasanpham'];
		$motasanpham=$_POST['motasanpham'];
		$maloai=$_POST['maloai'];
		$thuonghieu=$_POST['thuonghieu'];

		$sql= "INSERT INTO sanpham (tensanpham,giasanpham,anhsanpham,motasanpham,maloai,thuonghieu) VALUES ('$tensanpham','$giasanpham','$anhsanpham','$motasanpham','$maloai','$thuonghieu')";
		$query = mysqli_query($conn,$sql);
		move_uploaded_file($anhsanpham_tmp,'./img/'.$anhsanpham);
		header('location:index.php?page_layout=danhsanphamsach');
	}
 ?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h2>Thêm sản phẩm</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data" accept-charset="utf-8">
				<div class="form-group">
					<label for="">Tên sản phẩm</label>
					<input type="text" name="tensanpham" class="form-control" required="">
				</div>

				<div class="form-group">
					<label for="">Ảnh sản phẩm</label>
					<input type="file" name="anhsanpham" >
				</div>

				<div class="form-group">
					<label for="">Giá sản phẩm</label>
					<input type="number" name="giasanpham" class="form-control" required="">
				</div>

				<div class="form-group">
					<label for="">Mô tả sản phẩm</label>
					<input type="text" name="motasanpham" class="form-control" >
				</div>


				<div class="form-group">
					<label for="">Thương hiệu</label>
					<input type="text" name="motasanpham" class="form-control" >
				</div>

				<button name="sbm" class="btn btn-success" type="submit" >Thêm</button>
			</form>
		</div>
	</div>
</div>
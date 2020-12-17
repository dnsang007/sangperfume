<?php
	include('include/connect.php');
	$sql="SELECT * FROM `sanpham` order by idsanpham asc";
	$data= $obj->prepare($sql);
	$data->execute();
 ?>

<div class="container-fluid">
	<div class="card ">
	  <div class="card-header">
	    <h2>Danh sách sản phẩm</h2>
	  </div>
	  <div>
	    <table class="box-qlsp">
	    		<tr>
		    		<td width="3%">id</td>
		    		<td width="8%">Tên sản phẩm</td>
		    		<td width="8%">Ảnh sản phẩm</td>
		    		<td width="6%">Giá</td>
		    		<td>Mô tả</td>		    		
		    		<td width="6%">Thương hiệu</td>
		    		<td width="4%">Hành động</td>
	    		</tr>
	    		<?php
					foreach($data as $row)
				{
				?>
					<table class="box-qlsp">
			    		<tr>
				    		<td width="3%;"><?php echo $row['idsanpham'];; ?></td>
				    		<td width="8%"><?php echo $row['tensanpham']; ?></td>
				    		<td width="8%">
							<img style="width:100%;" src="images/<?php echo($row['anhsanpham']) ?>" alt=" " >		
				    		</td>
				    		<td width="6%"><?php echo number_format($row['giasanpham']); ?></td>
				    		<td><?php echo 'motasanpham' ?></td>
				    		
				    		<td width="6%"><?php echo $row['thuonghieu']; ?></td>
				    		<td width="4%"><a href="index.php?page_layout=sua&id=<?php echo $row['idsanpham']; ?>">Sửa </br>
							<a onclick="return Del ('<?php echo $row['tensanpham'] ?>')" href="index.php?page_layout=xoa&id=<?php echo $row['idsanpham']; ?>"> Xóa
							</td>
				    	
				    	</tr>
					</table>
				<?php 
				}
				?>

	    </table>
	    <a class="btn btn-primary" href="index.php?page_layout=them" >THÊM MỚI </a>
	    <a class="btn btn-primary" href="logout.php" >ĐĂNG XUẤT </a>
	  </div>
	</div>
</div>
<script>
	function Del(name){
		return confirm("Bạn có chắc muốn xóa sản phẩm " + name + "?");
	}
</script>
<?php
	include('include/connect.php');
	$id=$_GET['id'];
	$sql="DELETE FROM sanpham where idsanpham = $id" ;
	$data= $obj->prepare($sql);
	$data->execute();
	header('location:index.php?page_layout=danhsach');
 ?>
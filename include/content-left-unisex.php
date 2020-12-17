<div class="col-md-9 col-d">
				<div class="in-line">
					<div class="para-an" >
						<h3>NƯỚC HOA UNISEX</h3>
					</div>
					<div class="lady-in">
					<?php 
						 include('include/connect.php');
						//$danhmuc=$_GET['danhmuc'];
						$sql="SELECT * FROM `sanpham` WHERE `iddanhmuc`=3"  ;
						$data= $obj->prepare($sql);
						$data->execute();
						//print_r($data);
						foreach ($data as $v)
						{
						?>
						<div class="col-md-4 you-para" >
							<table class="box-product">
							<a href="chitiet.php?idsanpham=<?php echo $v['idsanpham']?>"><img class="img-responsive pic-in" src="admin/resources/images/<?php echo($v['anhsanpham']) ?>" alt=" " ></a>
							<p><?php echo $v['tensanpham']  ?></p>
							<span><?php echo number_format($v['giasanpham']);  ?> <label class="cat-in"> </label> <a href="chitiet.php?idsanpham=<?php echo $v['idsanpham']?>">Xem sản phẩm </a></span>
						</table>
						</div>
						<?php
						}
					?>
						<div class="clearfix"> </div>
					</div>
				</div>
</div>
                  
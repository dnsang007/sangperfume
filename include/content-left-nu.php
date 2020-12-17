<div class="col-md-9 col-d">
				<div class="in-line">
					<div class="para-an" >
						<h3>NƯỚC HOA NỮ</h3>
					</div>
					<div class="lady-in">
					<?php 
						 include('include/connect.php');
						$sql="SELECT * FROM `sanpham` WHERE `iddanhmuc`=2	"  ;
						$data= $obj->prepare($sql);
						$data->execute();
						foreach ($data as $v)
						{
						?>
						<div class="col-md-4 you-para" >
							<table>
							<a href="chitiet.php?idsanpham=<?php echo $v['idsanpham']?>"><img class="img-responsive pic-in" src="admin/resources/images/<?php echo($v['anhsanpham']) ?>" alt=" " ></a>
							<p><?php echo $v['tensanpham']  ?></p>
							<span><?php echo number_format($v['giasanpham'])  ?> <label class="cat-in"> </label> <a href="chitiet.php?idsanpham=<?php echo $v['idsanpham']?>">Xem sản phẩm </a></span>
						</table>
						</div>
						<?php
						}
					?>
						<div class="clearfix"> </div>
					</div>
				</div>
</div>
                  
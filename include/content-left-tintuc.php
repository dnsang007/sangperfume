<div class="col-md-9 col-d">
			<div class="in-line">
				<div class="para-an" >
						<h3>TIN TỨC</h3>
				</div>
				<div class="lady-in">
					<?php 
						 include('include/connect.php');
						$sql="SELECT * FROM `tintuc`";
						$data= $obj->prepare($sql);
						$data->execute();
						foreach ($data as $v)
						{
						?>
						<table class="box-tintuc">
                            <tr>
                            <td width=30%> <a href="index.php?idtintuc=<?php echo $v['idtintuc'] ?>"><img src="admin/resources/images/<?php echo $v['hinhanh'] ?>" alt=""></td></a>
                            <td width=70%> <a href="index.php?idtintuc=<?php echo $v['idtintuc'] ?>"><?php echo $v['tieudetin'] ?></a></br></br >
                            <h5> Số lần xem:<?php echo $v['solanxem'] ?> </br >Ngày đăng: <?php echo $v['ngaydangtin'] ?></h5>
                            </td>
                            </tr>
                        </table>
                        </br>
						<?php
						}
					?>
						<div class="clearfix"> </div>
				</div>
			</div>
</div>                  
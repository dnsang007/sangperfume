<div class="lady-in-on">
			<div class="buy-an">
						<h3>SẢN PHẨM BÁN CHẠY</h3>
				<br></br>
					</div>
					<ul id="flexiselDemo1">	
					<?php 
						 include('include/connect.php');
						$sql="SELECT * FROM `sanpham` LIMIT 5	"  ;
						$data= $obj->prepare($sql);
						$data->execute();
						foreach ($data as $v)
						{
						?>
				<li><a href="chitiet.php?idsanpham=<?php echo $v['idsanpham']?>"><img class="img-responsive women" src="admin/resources/images/<?php echo $v['anhsanpham'] ?>" alt=""></a>
				<div class="hide-in">
				<p> <?php echo $v['tensanpham'] ?></p>
				<span> <?php echo number_format($v['giasanpham']) ?> |  <a href="#">Mua ngay </a></span>
				</div></li>
				<?php
						}
					?>
            </ul>
            		<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 4,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>
	</div>
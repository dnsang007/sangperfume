<?php   
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        include('include/css-giohang.php');
        include('include/connect.php');
        if(!isset($_SESSION['taikhoan']))
        {
            echo "Khách hàng chưa Đăng nhập"; 
            $chuadangnhap = ' </br> Quay lại  <a href="dangnhap.php">Đăng nhập</a>';
            echo $chuadangnhap;
            exit;
        }
        if (!isset($_SESSION["cart"]))
        {
            $_SESSION["cart"] = array();
        }
        if (isset($_GET['action']))
        {
            function update_cart($add = false)
            {
                
                foreach ($_POST['quantity'] as $id => $quantity)
                {
                    if($quantity>0)
                   {
                        if ($quantity == 0)
                        {
                            unset($_SESSION["cart"][$id]);
                        }
                        else
                        {
                            if ($add)
                            {
                                $_SESSION["cart"][$id] += $quantity;
                            }
                            else
                            {
                                $_SESSION["cart"][$id] = $quantity;
                            }
                        }
                }
                }
            }
            switch ($_GET['action'])
            {
                case "add":
                    //update_cart(true); Tăng số lượng sp khi người dùng thêm vào giỏ hàng sản phẩm đã có trong giỏ hàng
                    update_cart();
                    break;
                case "delete":
                    if(isset($_GET['id']))
                    {
                    unset($_SESSION["cart"][$_GET['id']]);
                    }
                    break;
                case "submit":
                    if(isset($_POST['update_click']))
                    {
                        update_cart();
                    }
                    elseif($_POST['order_click'])
                    {
                        if (!empty($_POST['quantity']))
                        {
                            $sql = "SELECT * FROM `sanpham` WHERE `idsanpham` IN (" . implode(",", array_keys($_POST['quantity'])) . ")";
                            $total=0;
                            $stm = $obj->prepare($sql);
                            $stm->execute();
                            $data = $stm->fetchAll();
                            foreach($data as $v)
                            {
                                    $total+= $v['giasanpham'] * $_SESSION["cart"][$v['idsanpham']];
                            }
                            $time= date('Y-m-d H:i:s');
                            $idkh=$_SESSION['idkhachhang'];
                            $laphoadon="INSERT INTO `hoadon` (`idhoadon`, `idkhachhang`, `idtinhtrang`, `ngaylaphoadon`, `tonggia`) VALUES (NULL, '$idkh', '1', '$time', '$total')";
                            $stm = $obj->prepare($laphoadon);
                            $stm->execute();
                            $datalhd = $stm->fetchAll();
                            echo "Quý khách đã đặt hàng thành công. SangPerfume sẽ xử lý đơn hàng và giao cho quý khách trong thời gian sớm nhất
                            có thể. </br>Trong quá trình nhận hàng quý khách có thắc mắc
                            vấn đề gì xin liên hệ Hotline:0909000999 để chúng tôi giải quyết tức thời cho quý khách ạ.</br>Trân thành cám ơn quý khách đã luôn tin tưởng và ủng hộ sản phẩm tại SangPerfume ạ !!!";
                            unset($_SESSION["cart"]);
                            $backhome = ' </br> Quay lại  <a href="index.php">Trang chủ</a>';
                            echo $backhome;exit;
                        }
                    }
                    break;
            }
        }
        if (!empty($_SESSION["cart"]))
        {
            $products = "SELECT * FROM `sanpham` WHERE `idsanpham` IN (".implode(",", array_keys($_SESSION["cart"])).")";
            $stm = $obj->prepare($products);
            $stm->execute();
            $datab = $stm->fetchAll();
            
        }
        else
        {
            echo"Giỏ hàng rỗng";
            $my_var = ' </br> Quay lại  <a href="index.php">Trang chủ</a>';
            echo $my_var;
            exit;
        }
?>
            <h2 style="text-align:center;font-weight:bold;">GIỎ HÀNG</h2></BR>
            <form id="cart-form" action="giohang.php?action=submit" method="POST">
                <table> 
                    <tr>
                        <th class="product-number">STT</th>
                        <th class="product-name">Tên sản phẩm</th>
                        <th class="product-img">Ảnh sản phẩm</th>
                        <th class="product-price">Đơn giá</th>
                        <th class="product-quantity">Số lượng</th>
                        <th class="total-money">Thành tiền</th>
                        <th class="product-delete">Xóa</th>
                    </tr>
                    <?php
                    $num = 1;
                    $total=0;
                    foreach($datab as $v)
                    {
                    ?>
                    <tr>
                        <td class="product-number"><?=$num++;?></td>
                        <td class="product-name"><?=$v['tensanpham']?></td>
                        <td class="product-img"><img class="img-responsive pic-in" src="admin/resources/images/<?php echo($v['anhsanpham'])?>" alt=" " ></td>
                        <td class="product-price"><?=number_format($v['giasanpham'])?></td>
                        <td class="product-quantity"><input type="number"  value="<?=$_SESSION["cart"][$v['idsanpham']]?>" name="quantity[<?=$v['idsanpham']?>]" /></td>
                        <td class="total-money"><?=number_format($v['giasanpham'] * $_SESSION["cart"][$v['idsanpham']])?></td>
                        <td class="product-delete"><a href="giohang.php?action=delete&id=<?php echo $v['idsanpham']?>">Xóa</a></td>
                
                    </tr>
                    <?php
                    $total+= $v['giasanpham'] * $_SESSION["cart"][$v['idsanpham']];
                    if(!empty($_SESSION["cart"]))
                    {
                        $_SESSION['slsp']=$num-1;
                    }
                    elseif(empty($_SESSION["cart"]))
                    {
                        $_SESSION['slsp']=0;
                    }
                    }
                    ?>
                    <tr id="row-total">
                        <td class="product-number">&nbsp;</td>
                        <td class="product-name">Tổng tiền</td>
                        <td class="product-img">&nbsp;</td>
                        <td class="product-price">&nbsp;</td>
                        <td class="product-quantity">&nbsp;</td>
                        <td class="total-money"><span style="color: red;font-size:20px;font-weight:bold;"><?php echo number_format($total)?></span></td>
                        <td class="product-delete">&nbsp;</td>
                    </tr>
                </table>
                <div id="form-button">
                    <input type="submit" name="update_click" value="Cập nhật Giỏ hàng"/>
                </div>
                <hr>
                <div align="center">
                <table class="box-thanhtoan">
                <tr>
                <td> <p>Người nhận:</p> </td><td> <p> <?php echo $_SESSION['tenkhachhang'];?> </p></td> 
                </tr>
                <tr>
                <td> <p>Điện thoại:</p> </td><td> <p> <?php echo $_SESSION['sdt'];?> </p></td> 
                </tr>
                <tr>
                <td> <p>Email:</p>  </td><td><p> <?php echo $_SESSION['mail'];?> </p></td   > 
                </tr>
                <tr>
                <td> <p>Địa chỉ:</p>  </td><td><p> <?php echo $_SESSION['diachi'];?> </p></td> 
                </tr>
                </table>
                <input type="submit" name="order_click" value="Đặt hàng" />
                </br></br>
                </div>
            </form>
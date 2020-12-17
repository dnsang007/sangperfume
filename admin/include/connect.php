<?php
  $obj=new PDO("mysql:host=localhost;dbname=sangperfume", 'root','');
if (!$obj) 
{
    exit('Kết nối không thành công!');
}
$obj->query("set names utf8");
?>
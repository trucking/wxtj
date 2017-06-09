<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-10-21
 * Time: ÏÂÎç9:41
 */
header("Content-type: text/json ; charset=GB2312");
include_once('../class/supplier.class.php');
$_POST['id'];
$obj = new supplier();
$result = $obj->tcSupplier($id);
echo json_encode($result);
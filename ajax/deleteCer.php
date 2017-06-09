<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-4-22
 * Time: 下午4:13
 */
header("Content-type: text/json ; charset=GB2312");
include_once('../class/certification.class.php');
$id     = $_POST['id'];
$obj    = new certification();
$result = $obj->delete($id);
echo json_encode($result);
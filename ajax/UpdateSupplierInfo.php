<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-4-21
 * Time: 下午4:36
 */

header("Content-type: text/json ; charset=GB2312");
include_once('../class/supplier.class.php');
$id             = utf8_to_gbk($_POST['id']);
$UID            = utf8_to_gbk($_POST['supplierId']);
$supplierName   = utf8_to_gbk($_POST['supplierName']);
$supplierAddress= utf8_to_gbk($_POST['supplierAddress']);
$goods          = utf8_to_gbk($_POST['goods']);
$remark         = utf8_to_gbk($_POST['remark']);
$obj = new supplier();
$result = $obj->updateSupplierInfo($id,$UID,$supplierName,$supplierAddress,$goods,$remark);
echo json_encode($result);

function utf8_to_gbk($str){
    return mb_convert_encoding($str, 'gbk', 'utf-8');
}
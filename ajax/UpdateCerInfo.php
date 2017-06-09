<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-4-21
 * Time: 下午9:02
 */

header("Content-type: text/json ; charset=GB2312");
include_once('../class/certification.class.php');
$id         = $_POST['id'];
$certificate= utf8_to_gbk($_POST['name']);
$due_time   = $_POST['dueTime'];
$update_time= $_POST['updateTime'];

$obj            = new certification();
$result         = $obj->updateInfo($id,$certificate,$due_time,$update_time);

echo json_encode($result);

function utf8_to_gbk($str){
    return mb_convert_encoding($str, 'gbk', 'utf-8');
}
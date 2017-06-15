<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-19
 * Time: ÏÂÎç3:39
 */
error_reporting(0);
header("Content-type: text/json ; charset=GB2312");
include_once('../class/record.class.php');
$date = trim($_POST['date']);
if($date == NULL)
{
    $result = false;
}else
{
    $obj = new record();
    $result = $obj->getList($date);
}
$result = gbkToUtf8($result);
echo json_encode($result);

function gbkToUtf8($str)
{
    foreach($str as $k=>$v)
    {
        foreach($v as $key=>$val)
        {
            $str[$k][$key] = iconv("GB2312","UTF-8//IGNORE",$val);
        }
    }
    return $str;
}

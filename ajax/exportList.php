<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-6-14
 * Time: 下午4:26
 */
error_reporting(0);
include_once('../class/export.class.php');
include_once('../class/record.class.php');
$fileName = $_POST['date'].'外委维修统计表';
$title = array('编号','报告单号','车间/部门','报告名称','申请日期','委托单位','委托时间','费用预估','负责人');
$obj = new record();
$value = $obj->getList($_POST['date']);
new export($fileName,$title,$value);

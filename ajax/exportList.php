<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-6-14
 * Time: ����4:26
 */
error_reporting(0);
include_once('../class/export.class.php');
include_once('../class/record.class.php');
$fileName = $_GET['date'].'��ίά��ͳ�Ʊ�';
$title = array('���','���浥��','����/����','��������','��������','ί�е�λ','ί��ʱ��','����Ԥ��','������');
$obj = new record();
$value = $obj->getList($_GET['date']);
new export($fileName,$title,$value);

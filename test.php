<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-9-29
 * Time: ????3:02
 */
/*try{
    include_once('class/database.class.php');
    $a = new database();
    $value = array(
        'mission_no'=>'xx1',
        'mission_maintainthing'=>'???????????',
        'mission_name'=>'????????',
        'mission_type'=>'??????',
        'mission_project'=>'?????',
        'mission_lasttime'=>'2016-10-01',
        'mission_thistime'=>'2016-11-01',
        'mission_cycle'=>30,
        'mission_remindtime'=>'2016-10-20',
        'mission_user'=>'liyanwei'
    );
    $table = 'rwtx_missionlist';
    $condition = 'mission_sysno = 1';

    $a->delete($table,$condition);
}catch (Exception $e)
{
    echo $e->getMessage();
}*/


/*$conn = mysql_connect('127.0.0.1','root','wqdxyf5305');
mysql_select_db('TD_OA',$conn);
$sql = 'select * from rwtx_missionlist';
$obj = mysql_query($sql,$conn);
$result = mysql_fetch_array($obj);
var_dump($result);*/
include_once('inc.php');
$test = new record();
$arr = $test->getList('2017-05');
print_r($arr);
//Database::echoSql();
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
$fileName = 'test';
$title = array('编号','报告单号','车间/部门','报告名称','申请日期','委托单位','委托时间','费用预估','完工日期','验收情况','合同费用','负责人');
$value = array( array('nihao','我不好','3','4','5','6','7','8','9','0','11','12'),
                array('nihao','我不好','3','4','5','6','7','8','9','0','11','12'),
                array('nihao','我不好','3','4','5','6','7','8','9','0','11','12'));
$test = new export($fileName,$title,$value);

//Database::echoSql();
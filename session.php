<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-8-15
 * Time: ����4:54
 */
//include_once('inc/auth.php');
$content['userID'] = $_SESSION['LOGIN_USER_ID'];
$content['username'] = $_SESSION['LOGIN_USER_NAME'];
//��ȡ�û���������
$content['loginDeptID'] = $_SESSION['LOGIN_DEPT_ID'];
$sql = 'select DEPT_NAME from department where DEPT_ID = '.$content['loginDeptID'];
$exeResult = exequery($connection,$sql);
$result = mysql_fetch_array($exeResult);
$content['deptName'] = $result['DEPT_NAME'];
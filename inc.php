<?php
    error_reporting(E_ALL^E_NOTICE^E_WARNING);
    include_once('inc/auth.php');
    include_once('./Smarty/libs/Smarty.class.php');
    include_once('./session.php');
    include_once('./class/database.class.php');
    include_once('./class/filter.class.php');
    include_once('./class/record.class.php');
    include_once('./class/user.class.php');
    include_once('./class/export.class.php');

    $smarty = new Smarty();
    $smarty->template_dir       = './temp/';
    $smarty->compile_dir        = './temp_c/';
    $smarty->config_dir         = './configs/';
    $smarty->cache_dir          = './cache/';
    $smarty->left_delimiter     = "{<";
    $smarty->right_delimiter    = ">}";


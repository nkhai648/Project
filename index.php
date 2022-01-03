<?php 

/*
* --------------------------------------------------------------------
* APP PATH
* --------------------------------------------------------------------
*/
$app_path = dirname(__FILE__);
define('APPPATH', $app_path);

/*
* --------------------------------------------------------------------
* CONFIG PATH
* --------------------------------------------------------------------
*/
$config_folder = 'config';
define('CONFIGPATH', APPPATH.DIRECTORY_SEPARATOR.$config_folder);

/*
* --------------------------------------------------------------------
* CORE PATH
* --------------------------------------------------------------------
*/
$core_folder = 'core';
define('COREPATH', APPPATH.DIRECTORY_SEPARATOR.$core_folder);

/*
* --------------------------------------------------------------------
* HELPER PATH
* --------------------------------------------------------------------
*/
$helper_folder = 'helper';
define('HELPERPATH', APPPATH.DIRECTORY_SEPARATOR.$helper_folder);

/*
* --------------------------------------------------------------------
* LAYOUT PATH
* --------------------------------------------------------------------
*/
$layout_folder = 'layout';
define('LAYOUTPATH', APPPATH.DIRECTORY_SEPARATOR.$layout_folder);

/*
* --------------------------------------------------------------------
* LIB PATH
* --------------------------------------------------------------------
*/
$lib_folder = 'libraries';
define('LIBPATH', APPPATH.DIRECTORY_SEPARATOR.$lib_folder);

/*
* --------------------------------------------------------------------
* MODULES PATH
* --------------------------------------------------------------------
*/
$modules_folder = 'modules';
define('MODULESPATH', APPPATH.DIRECTORY_SEPARATOR.$modules_folder);


require COREPATH.DIRECTORY_SEPARATOR.'appload.php';
?>


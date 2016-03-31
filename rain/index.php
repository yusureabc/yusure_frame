<?php
define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']).'/');
define('APP_NAME', 'index');
define('FRAMEWORK_PATH', APP_PATH.'framework/');
define('CONFIG_FILE', APP_PATH.APP_NAME.'/Conf/config.php');
define('IN_FW', true);
//open safe model need more running time, but this is very important ,default  value  true
define('OPEN_SAFE_MODEL', true);
define('APP_DEBUG', true);

require(FRAMEWORK_PATH.'Framework.php');

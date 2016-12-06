<?php

define('CFG_PROJECT_NAME', "wdsq");
define('CFG_URL_NAME', "http://www.wdsq.com");
define('CFG_WEB_NAME', "急借通");
define('CFG_DEFAULT_MODULE', "index");
define('CFG_DEFAULT_ACTION', "index");
define('CFG_TEMPLATE_PATH', "tmpl");
define('CFG_TEMPLATE_CACHE_PREFIX', "Cache");
define('CFG_CHAR_SET', "UTF-8");
define('CFG_TEMPLATE_LANGUAGE', "UTF-8");
define('CFG_FILE_WEB', 'http://asset.xwsd.com/xfjr.php');
if (getenv("SERVER_ADDR") == "127.0.0.1") {
    define('CFG_DEBUG_MODE', False);
} else {
    define('CFG_DEBUG_MODE', False);
}
require_once( dirname(__FILE__) . '/../api/config.inc.php');
define('CFG_RUN_TIME', CFG_DEBUG_MODE);
define('CFG_IMG_PATH', CFG_URL_NAME . "/images");
define('CFG_CSS_PATH', CFG_URL_NAME . "/include/css");
define('CFG_JS_PATH', CFG_URL_NAME . "/include/javascript");
define('CFG_API_PATH', CFG_URL_NAME . "/api");
define('CFG_ADMIN_VERIFY', "123456");
define('CACHE_PATH', "./include/cacheTmp/");
define('CFG_DEF_CSS', 'sidebar-collapse');
?>
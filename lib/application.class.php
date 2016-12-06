<?php

/**
 * 开发架构导向器类，部分常量初始化，根据 MODULE 、ACTION 将程式导向具体的功能
 *
 * @author Arnold 2007/04/19
 * @package Core
 */
class Application {

    /**
     * 程式执行时间统计之开始时间
     * 
     * @var int
     */
    var $appStartTime;

    /**
     * 构造函数，定义类实体时自动执行所有操作
     */
    function Application() {
        if (CFG_RUN_TIME)
            $this->startTimer(); // 统计程式运行时间开始
        $this->setup();       // 设定网站资讯
        $this->loadLib();      // 载入架构套件
        $this->getPathFileInfo();    // 获取路径及文件资讯
        $this->varFilter();      // 变数过滤
        return;
    }

    /**
     * 基本设置和常量定义
     */
    function setup() {
		date_default_timezone_set('Etc/GMT-8');
        error_reporting(7); // 设定错误讯息回报的等级
        /**
         * 当前服务器UNIX时间戳
         *
         */
        define('NOW_TIME', time()); // 取得当前时间戳记
        ## 取得当前用户的IP地址
        define('CLIENT_IP', getenv('HTTP_CLIENT_IP'));
        define('FORWARDED_IP', getenv('HTTP_X_FORWARDED_FOR'));
        define('IP', getenv('REMOTE_ADDR'));
    }

    /**
     * 定义路径及文件信息常量
     */
    function getPathFileInfo() {
        define('SCRIPT_FILENAME', $_SERVER['SCRIPT_FILENAME']); // 脚本档案路径及文件名 -> /home/htdocs//admin.php
        define('PHP_SCRIPT', basename(SCRIPT_FILENAME)); // 脚本档案名 -> /admin.php
        $programPrefixArr = split("\.", PHP_SCRIPT);
        define('PROGRAM_PREFIX', $programPrefixArr[0]); // 入口程序组的前缀 index 
        // 服务器上的脚本目录名，例如：/home/htdocs/48/twbbs
        $strpos = strpos(SCRIPT_FILENAME, CFG_PROJECT_NAME);
        if (!$strpos) {
            halt("错误：在工程工作目录中不能找到配置参数指定的工程目录名称");
        }
        if (strspn(CFG_PROJECT_NAME, SCRIPT_FILENAME) != strlen(CFG_PROJECT_NAME)) {
            halt("错误：工程目录名称的配置参数设定与脚 本目录中的其他目录名称重复。");
        }
        define('PHP_SCRIPT_PATH', substr(SCRIPT_FILENAME, 0, $strpos + strlen(CFG_PROJECT_NAME)));
        define('PHP_SCRIPT_FULL_NAME', str_replace(PHP_SCRIPT_PATH, '', SCRIPT_FILENAME));  // 脚本文件全名 -> /php//admin.php
        // 当前脚本到最上一层工作脚本目录的相对路径
        $scriptArray = split("/", PHP_SCRIPT_FULL_NAME);
        $scriptArrayCount = count($scriptArray);
        $scriptLevel = $scriptArrayCount - 2;
        $filePath = '';
        for ($i = 1; $i <= $scriptLevel; $i++) {
            $filePath .= '../';
        }
        if ('' == $filePath)
            $filePath = "./";
        define('FILE_PATH', $filePath);
        return;
    }

    /**
     * 载入开发架构控制类和主函数库
     *
     */
    function loadLib() {
        require_once ("./lib/cortrol.class.php");  // 载入控制类
        require_once ("./lib/main.fun.php");    // 载入函数库
        return;
    }

    /**
     * 变量安全过滤
     * 1、去除左右两端空格；
     * 2、将特殊字元转成 HTML 格式；
     * 3、禁止 javascript；
     */
    function varFilter() {
        $_GET = varFilter($_GET); // 过滤 _GET 阵列
        $_POST = varFilter($_POST); // 过滤 _POST 阵列
        return;
    }

    /**
     * 根据当前脚本档案名自动获取 Module 的路径 (全小写)
     *
     * @return String Module的路径
     */
    function getPath() {
        $path = strtolower("php/" . substr(PHP_SCRIPT, 0, strpos(PHP_SCRIPT, '.')) . "/");
        return $path;
    }

    /**
     * 获取要执行的 Module 名称
     *
     * @return string Module的名称
     */
    function getModule() {
        $module = isset($_POST['module']) ? $_POST['module'] : $_GET['module'];
        if (empty($module)) {
            $module = CFG_DEFAULT_MODULE; // 如果 $module 为空，则赋予预设值
        }
        return $module;
    }

    /**
     * 获取要执行的 Action 名称和定义 Action 前缀常量
     *
     * @return string Action的名称
     */
    function getAction() {
        $action = isset($_POST['action']) ? $_POST['action'] : $_GET['action'];
        $actionPrefix = isset($_POST['action']) ? "do" : "show";
        if (empty($action)) {
            $action = CFG_DEFAULT_ACTION;
        }
        define('ACTION_PREFIX', $actionPrefix); // 定义 Action 字首，post 方式时为 do，get 方式时为 show
        return $action;
    }
	/**
	 * url伪静态
	 *
	 */
	function urlHtml(){
		$path_info = $_SERVER["PATH_INFO"];
		if(strstr($path_info,'.html')){
			$url = substr($path_info,1,-5);
			$tmp = explode('/',$url);
			$num = count($tmp);
			for($i=0;$i<$num;$i++){
				$ttp = array();
				$ttp = explode('_',$tmp[$i]);
				$_GET[$ttp['0']] = $ttp['1'];
			}
		}
	}
    /**
     * 执行指定 Module 中的 Action
     *
     */
    function run() {
		$this->urlHtml();
        define('MODULE_PATH', $this->getPath());     // Module 的路径
        define('MODULE_NAME', $this->getModule());     // Module 的档案名称
        define('ACTION_NAME', $this->getAction());     // Action 的 Module 需要调用的方法名称
        // 载入公共类
        $publicClassFile = FILE_PATH . MODULE_PATH . "public.class.php";
        if (file_exists($publicClassFile)) {
            require_once ($publicClassFile);
        }
        // 载入具体功能的执行类
        $moduleClassFile = FILE_PATH . MODULE_PATH . MODULE_NAME . '.class.php';
        if (file_exists($moduleClassFile)) {
            include_once($moduleClassFile);
        }
        if (!class_exists(MODULE_NAME)) {
            halt("错误：不能载入 " . MODULE_NAME . " 模组。");
        }
        $moduleClass = MODULE_NAME;
        eval('$module = & new '.$moduleClass.'();');          // 对具体功能的类定义实体
        if (CFG_RUN_TIME) {
            echo "<br>RunTime:" . $this->endTimer();    // 统计程式运行时间结束并显示
        }
        exit();
    }

    /**
     * 程式执行时间统计开始
     *
     */
    function startTimer() {
        $mtime = microtime();
        $mtime = explode(' ', $mtime);
        $mtime = $mtime[1] + $mtime[0];
        $this->appStartTime = $mtime;
    }

    /**
     * 程式执行时间统计结束
     *
     * @return float 程序执行所用时间
     */
    function endTimer() {
        $mtime = microtime();
        $mtime = explode(' ', $mtime);
        $mtime = $mtime[1] + $mtime[0];
        $endtime = $mtime;
        $totaltime = round(($endtime - $this->appStartTime), 5);
        return $totaltime;
    }

}

?>
<?php

/**
 * 开发架构控制器类，集成了网站设置处理、资料库初始化、模板处理、分页处理、错误（提示）资讯处理等常用功能
 *
 * @author Arnold 2007/04/23
 * @package Core
 */
class Cortrol {

    /**
     * 网站设置信息
     * 
     * @var array
     */
    var $Setup = array(); // 资料库保存的配置参数
    /**
     * 错误信息
     * 
     * @var string
     */
    var $ErrMsg = "";  // 错误资讯
    /**
     * 提示信息
     * 
     * @var string
     */
    var $PromptMsg = "";  // 提示资讯
    /**
     * 提示后的跳转网址
     * 
     * @var string
     */
    var $UrlJump = "";  // 跳转地址
    /**
     * 模板元素
     * 
     * @var array
     */
    var $Tmpl = array(); // 模板元素
    /**
     * 资料库类实体对象
     *
     * @var object
     */
    var $Q = "";  // 资料库实体物件
    /**
     * 控制类的内部属性
     * $Cortrol['tmplFile']		:	// 模板档案名及路径
     * $Cortrol['tmplCacheFile'] :	// 模板缓存档案名及路径
     * $Cortrol['subTmplFile']	:	// 模板档案名及路径（不含.tpl.php），方便调用子模板
     * 
     * @var array
     */
    var $Cortrol = array();

    /**
     * 构造函数，定义类实体时自动执行所有操作
     */
    function Cortrol() {
        $moduleAction = ACTION_PREFIX . ucfirst(ACTION_NAME);

        if (!method_exists($this, $moduleAction)) { // 检查 do.Action 是否存在
            halt('错误：非法操作！' . $moduleAction . '不存在!');
        }

        $this->getTmplFile();      // 自动获取模板的档案名
        $this->loadSetup();       // 载入 ./include/config/system.inc.php 系统配置文件

        if (!method_exists($this, ucfirst(PROGRAM_PREFIX) . "_Public")) {  // 判断是否存在 public 方法，如果不存在就直接执行方法，如果存在，由 public 方法中去执行
            $this->$moduleAction();
        }

        return;
    }

    /**
     * 载入资料库，由子类中根据是否需要资料库去调用。
     * 
     * @return Object 资料库类实体对象
     */
    function loadDB($debug = false) {
        global $db;
        if (!isset($db)) {
            include_once (dirname(__FILE__) . "/../api/db.class.php");
            global $db;
            if (!isset($db)) {
                $db = new DB(CFG_DB_HOST, CFG_DB_PORT, CFG_DB_USER, CFG_DB_PWD, CFG_DB_NAME, $debug);
            }
            $db->Execute('SET NAMES UTF8');
        }
        return $db;
    }

    /**
     * 载入系统主配置参数文件 _system.ini.php
     */
    function loadSetup() {
        $this->loadIncFile('_system');
        if (isset($this->Setup['active']))
            $this->checkSetupActive();
        if (isset($this->Setup['loadLimit']))
            $this->checkSetupLoadLimit();
        if (isset($this->Setup['denyIp']))
            $this->checkSetupDenyIp();
        return;
    }

    function loadIncFile($fName) {
        $fName = strtolower($fName);
        $incFile = FILE_PATH . 'include/config/' . $fName . '.inc.php';
        if (!file_exists($incFile)) {
            halt('出错,请联系管理员');
        }
        @include_once($incFile);
        if (is_array($_SYSET)) {
            foreach ($_SYSET as $key => $val) {
                if ("1" == $_SYSET[$key]['allowTmpl']) {
                    if (!isset($this->Tmpl[$key])) {
                        $this->Tmpl[$key] = trueHtml($_SYSET[$key]['value']);
                    }
                } else {
                    if (!isset($this->Setup[$key])) {
                        $this->Setup[$key] = $_SYSET[$key]['value'];
                    }
                }
            }
        }
        return;
    }

    /**
     * 根据系统参数 active 检查网站是否关闭，关闭时会显示系统维护网页，actionIp指定的IP可忽略维护提示访问网站，用于调试时。
     */
    function checkSetupActive() {
        if (("true" == strtolower($this->Setup['active'])) || ("admin.php" == PHP_SCRIPT) || (IP == $this->Setup['actionIp'])) {
            return;
        } else {
            if (("false" == strtolower($this->Setup['active'])) || ("0" == strtolower($this->Setup['active']))) {
                $msg = c("出错,请联系管理员");
            } else {
                $msg = $this->Setup['active'];
            }
            include_once("./html/maintenrnce.html");
            exit;
        }
        return;
    }

    /**
     * 根据系统参数 loadLimit 检查系统负核是否过高（仅限 Linux 系统）
     */
    function checkSetupLoadLimit() {
        if (($this->Setup['loadLimit'] > 0) && (PHP_OS == 'Linux') && (PHP_SCRIPT != "admin.php")) {
            if ($fp = @fopen('/proc/loadavg', 'r')) {
                $filestuff = @fread($fp, 6);
                fclose($fp);
                $loadavg = explode(' ', $filestuff);
                if (trim($loadavg[0]) > $this->Setup['loadLimit']) {
                    halt("出错,请联系管理员");
                }
            }
        }
        return;
    }

    /**
     * 根据系统参数 denyIp 检查当前 IP 是否被禁止
     *
     */
    function checkSetupDenyIp() {
        if ($this->Setup['denyIp'] != "0") {
            $ip1 = getenv('REMOTE_ADDR');
            $ip2 = substr($ip1, 0, strrpos($ip1, '.'));
            $denyIPArray = split(",", $this->Setup['denyIp']);
            $denyIp = False;
            if ((!empty($ip1)) && (in_array($ip1, $denyIPArray)))
                $denyIp = True;
            if ((!empty($ip2)) && (in_array($ip2, $denyIPArray)))
                $denyIp = True;
            if ($denyIp) {
                $haltMsg = "<H1>Internal Server Error</H1>The server encountered an internal error or misconfiguration and was unable to complete your request.<P> Please contact the server administrator, ycheng@softwareliberty.org and inform them of the time the error occurred,and anything you might have done that may have caused the error.<P>More information about this error may be available in the server error log.<P><HR><ADDRESS>Apache/1.3.26 Server at " . $this->Tmpl['url'] . " Port 80</ADDRESS>";
                halt($haltMsg);
            }
        }
        return;
    }

    /**
     * 显示提示或错误资讯
     *
     * @param string 提示后操作类别，jump 跳转，close 关闭，默认为 jump
     */
    function promptMsg($type = 'jump') {
        if ($this->ErrMsg != "") {
            $this->Tmpl['message'] = "<b><font color=red>" . $this->ErrMsg . "</font></b>";
            $this->Tmpl['autoJumpUrl'] = $this->UrlJump ? $this->UrlJump : "javascript:history.back(-1);";
            $this->Tmpl['waitSecond'] = "3";
        } else if ($this->PromptMsg != "") {
            $this->Tmpl['message'] = "<b><font color=blue>" . $this->PromptMsg . "</font></b>";
            $this->Tmpl['autoJumpUrl'] = $this->UrlJump ? $this->UrlJump : "javascript:history.back(-1);";
            $this->Tmpl['waitSecond'] = "1";
        }
        if ('jump' == $type) {
            $this->Tmpl['errorType'] = "请等待系统转向...<br> <br> (<a href='" . $this->Tmpl['autoJumpUrl'] . "'>如果您不想等待，请点击此处链结</a>)";
        } else if ('close' == $type) {
            $this->Tmpl['autoJumpUrl'] = "javascript:window.close();";
            $this->Tmpl['waitSecond'] = "5";
            $this->Tmpl['errorType'] = "请等待窗口关闭<br> <br> (<a href='" . $this->Tmpl['autoJumpUrl'] . "'>如果您不想等待，请点击此处关闭</a>)";
        }

        $this->Tmpl['message'] = autoCharSet($this->Tmpl['message']);
        $this->Tmpl['errorType'] = autoCharSet($this->Tmpl['errorType']);

        $this->loadTmplate(TEMPLATE_PATH . "public/prompt.tpl.php"); // 调用资讯显示模板
        exit;
    }

    /**
     * 获取模板档案名
     */
    function getTmplFile() {
        /**
         * 根据模板目录和模板缓存目录默认前缀构造模板缓存目录
         */
        define('CFG_TEMPLATE_CACHE_PATH', CFG_TEMPLATE_PATH . CFG_TEMPLATE_CACHE_PREFIX);
        $tmplModulePath = substr(MODULE_PATH, strpos(MODULE_PATH, '/')) . MODULE_NAME . "/";
        $this->Cortrol['subTmplFile'] = FILE_PATH . CFG_TEMPLATE_PATH . $tmplModulePath . ACTION_NAME;
        $this->Cortrol['tmplFile'] = FILE_PATH . CFG_TEMPLATE_PATH . $tmplModulePath . ACTION_NAME . ".tpl.php";
        $this->Cortrol['tmplCacheFile'] = FILE_PATH . CFG_TEMPLATE_CACHE_PATH . $tmplModulePath . ACTION_NAME . ".tpl.php";
        /**
         * 起始文件对应的模板路径，方便模板中调用其他模板
         */
        define('TEMPLATE_PATH', FILE_PATH . CFG_TEMPLATE_CACHE_PATH . substr(MODULE_PATH, strpos(MODULE_PATH, '/')));
        return;
    }

    /**
     * 打开并切割子模板文件
     * 
     * @param string 子模板文件名
     * @return string 子模板文件内容
     */
    function getSubTmplFileContent($subTmplName) {
        $subTmplName = $this->Cortrol['subTmplFile'] . "." . $subTmplName . ".tpl.php";
        $subTmplContent = explode("<!--TMPL:Line-->", autoCharSet(fileRead($subTmplName)));
        $subTmplContent = $this->samepath($subTmplContent); // 同步子模板中的路径
        return $subTmplContent;
    }

    /**
     * 替换模板中的变数为变量内容
     * 
     * @param string 模板内容
     * @return string 已替换模板变量后的模板内容
     */
    function tmplVarReplace(& $tmplContent) {
        $tmplContent = preg_replace('/(\{\$)(.+?)(\})/is', '$\\2', $tmplContent);
        extract($this->Tmpl, EXTR_OVERWRITE);
        $temp = AddSlashes($tmplContent);
        eval("\$temp = \"$temp\";");
        $temp = StripSlashes($temp);
        return $temp;
    }

    /**
     * 检查模板是否变动，如果变动，要重新编译模板
     *
     * @param string 模板文件名
     * @return bool True 为源模板文件有更新，False 为源模板文件没有更新
     */
    function checkCache(& $tmplCacheFile) {
        $tmplFile = str_replace(CFG_TEMPLATE_CACHE_PATH, CFG_TEMPLATE_PATH, $tmplCacheFile);
        if (!file_exists($tmplCacheFile)) {
            $tmplCahceFileDir = substr($tmplCacheFile, 0, strrpos($tmplCacheFile, "/"));
            $tmplCacheFileDirDown = $tmplCahceFileDir;
            $tmplCacheFileDirUp = substr($tmplCacheFileDirDown, 0, strrpos($tmplCacheFileDirDown, "/"));
            if (!file_exists($tmplCacheFileDirUp)) {
                mkdir($tmplCacheFileDirUp);
            }
            if (!file_exists($tmplCacheFileDirDown)) {
                mkdir($tmplCacheFileDirDown);
            }
            return True;
        } elseif (filemtime($tmplFile) > filemtime($tmplCacheFile)) {
            return True;
        }
        return False;
    }

    /**
     * 载入模板文件
     *
     * @param string 模板文件名
     * @return string 模板文件内容
     */
    function readTmplate(& $tmplCacheFile) {
        $tmplFile = str_replace(CFG_TEMPLATE_CACHE_PATH, CFG_TEMPLATE_PATH, $tmplCacheFile);
        $tmplContent = implode("", file($tmplFile));
        return $tmplContent;
    }

    /**
     * 写入模板缓存文件（转换网站语言编码） 
     *
     * @param string 模板缓存文件名
     * @param string 编译完成的模板文件内容
     */
    function writeCache(& $tmplCacheFile, & $tmplContent) {
        $tmplContent = autoCharSet($this->compiler($tmplContent));

        if (strlen($tmplContent) > 0) {
            fileWrite($tmplCacheFile, $tmplContent);
        }
        return;
    }

    /**
     * 编译模板文件
     * 
     * @param string 模板文件原内容
     * @return string 模板文件编译后内容
     */
    function compiler(& $tmplContent) {
        $tmplContent = preg_replace('/(\{\$)(.+?)(\})/is', '<' . '?php echo $\\2?' . '>', $tmplContent);
        $tmplContent = preg_replace('/(charset=)(.+?)(\")/is', 'charset=UTF-8"', $tmplContent);
        $tmplContent = str_replace('#?#', '?', $tmplContent);
        $tmplContent = $this->samepath($tmplContent);
        return $tmplContent;
    }

    /**
     * 同步模板缓存页面中的路径
     * 
     * @param string 模板文件内容
     * @return 同步路径后的棋板文件内容
     */
    function samePath(& $tmplContent) {
        $tmplContent = str_replace("../../../images", CFG_IMG_PATH, $tmplContent);
        $tmplContent = str_replace("../../../include", "./include", $tmplContent);
        return $tmplContent;
    }

    /**
     * 载入模板文件
     * 
     * @param string 模板文件名
     * @param string 类型 main 为主模板，sub为子模板
     */
    function loadTmplate($tmplCacheFile, $mode = "sub") {
        if ($this->checkCache($tmplCacheFile)) {
            $tmplContent = $this->readTmplate($tmplCacheFile);
            $this->writeCache($tmplCacheFile, $tmplContent);
        }
        extract($this->Tmpl, EXTR_OVERWRITE);
        @extract($this->Tmpl, EXTR_OVERWRITE);
        if ((defined('HTML_FILE')) && ("main" == $mode)) {
            ob_start();
        }
        include_once($tmplCacheFile);
        if ((defined('HTML_FILE')) && ("main" == $mode)) {
            $htmlContent = ob_get_contents();
            $this->writeHtml($htmlContent);
        }
        return;
    }

    /**
     * 写入HTML静态文件
     * 
     * @param string 要写入的HTML静态文件内容
     */
    function writeHtml(& $htmlContent) {
        $dirArr = split("/", HTML_FILE);
        @array_pop($dirArr);
        $dir1 = implode("/", $dirArr);
        @array_pop($dirArr);
        $dir2 = implode("/", $dirArr);
        @array_pop($dirArr);
        $dir3 = implode("/", $dirArr);
        if (!file_exists($dir1)) {
            if (!file_exists($dir2)) {
                if (!file_exists($dir3)) {
                    mkdir($dir3);
                    mkdir($dir2);
                    mkdir($dir1);
                } else {
                    mkdir($dir2);
                    mkdir($dir1);
                }
            } else {
                mkdir($dir1);
            }
        }
        fileWrite(HTML_FILE, $htmlContent);
        return;
    }

    /**
     * 调用模板，输出完整网页
     */
    function display() {
        $this->Tmpl['power'] = $_SESSION['userinfo']['power'];
        $this->loadTmplate($this->Cortrol['tmplCacheFile'], "main");
        return;
    }

}

?>
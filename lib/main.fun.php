<?php

Function autoCharSet($fStr, $fFrom = CFG_TEMPLATE_LANGUAGE, $fTo = CFG_CHAR_SET) {
    $fStr = iconv($fFrom, $fTo, $fStr);
    Return $fStr;
}

Function goBack($msg, $url = '') {
    if ($url == "exit") {
        echo "<script language=javascript>\n";
        echo "window.alert('$msg');";
        echo "</script>\n";
        echo $msg;
        exit;
    }
    echo "<script language=javascript>\n";
    if ($msg != '') {
        echo "window.alert('$msg');";
    }
    if ($url == "close") {
        echo "self.close();";
    } elseif ($url != '') {
        if (strstr($url, '|')) {
            $url_ary = explode('|', $url);
            echo $url_ary[0] . ".location.href='" . $url_ary[1] . "'\n";
        } else {
            echo "document.location.href='$url'\n";
        }
    } else {
        echo "window.history.go(-1);";
    }
    echo "</script>\n";
    exit();
}

Function setUTF8Header() {
    header("Content-type:text/html;charset=utf-8");
}

Function setGBKHeader() {
    header("Content-type:text/html;charset=gb2312");
}

Function ob_gzip($content) {
    if (!headers_sent() &&
            extension_loaded("zlib") &&
            strstr($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) {
        $content = gzencode($content . " \n//此页已压缩", 9);

        header("Content-Encoding: gzip");
        header("Vary: Accept-Encoding");
        header("Content-Length: " . strlen($content));
    }
    return $content;
}

Function getZip($htmlfile) {
    if (extension_loaded('zlib'))
        ob_start('ob_gzip'); //实现gzip压缩开始
    echo $htmlfile;
    if (extension_loaded('zlib'))
        ob_end_flush();   //实现gzip压缩结束
}

Function sStaticHtml($name, $id, $etime = 6) {
    $cacheFile = CACHE_PATH;
    if (!empty($_GET['module']) AND ! empty($_GET['action'])) {
        $cacheFile .= $_GET['module'] . '-' . $_GET['action'] . '/';
    }
    $cacheFile .= $name . '-' . $id . '.html';
    if (file_exists($cacheFile)) {
        date_default_timezone_set('PRC');
        $time = time();
        $endTime = $etime * 60 * 60;
        if ($time - filemtime($cacheFile) < $endTime) {
            $filecontent = @file_get_contents($cacheFile);
            echo $filecontent;
            exit;
        }
    }
    ob_start();
}

Function eStaticHtml($name, $id) {
    $cacheFile = CACHE_PATH;
    if (!empty($_GET['module']) && !empty($_GET['action'])) {
        $cacheFile .= $_GET['module'] . '-' . $_GET['action'] . '/';
    }
    $cacheName = $name . '-' . $id . '.html';
    $temp = ob_get_contents();
    ob_end_flush();
    if (!is_dir($cacheFile)) {
        @mkdir($cacheFile, 0755);
    }
    $file = $cacheFile . $cacheName;
    $fp = fopen($file, 'w');
    fwrite($fp, $temp) or die('Sorry!请求错误，请重新加载！');
    fclose($fp);
}
/**
 * stock提交数据
 * @param type $ip
 * @param type $port
 * @param type $data
 * @return type
 */
Function socketPost($ip, $port, $data) {
    error_reporting(E_ALL);
    set_time_limit(0);
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($socket < 0) {
        echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
    } else {
        
    }
    $result = socket_connect($socket, $ip, $port);
    if ($result < 0) {
        echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
    } else {
        
    }
    $in = $data . "\r\n";
    $out = '';
    if (!socket_write($socket, $in, strlen($in))) {
        
    } else {
        
    }
    $data = '';
    while ($out = socket_read($socket, 8192)) {
        $data .= $out;
    }
    socket_close($socket);
    return $data;
}
function CurlPost($url, $data) {
    return json_decode(socketPost($url, '9508', $data));
}

function CurlPostWeb($url, $data, $cmd = '1') { // 模拟提交数据函数
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:')); //设置header
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在
    if ($cmd) {
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    }
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $response = curl_exec($curl); // 执行操作
    if (curl_errno($curl)) {
        echo 'Errno' . curl_error($curl); //捕抓异常
    }
    curl_close($curl); // 关闭CURL会话
    return $response; // 返回数据
}

/**
 * 模拟提交数据
 */
Function post($url, $dataArray) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:')); //设置header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataArray);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        print curl_error($ch);
    }
    curl_close($ch); //返回
    return $response;
}

Function c($fStr) {
    Return autoCharSet($fStr);
}

Function arrayAutoCharSet($fArray, $fFrom = CFG_TEMPLATE_LANGUAGE, $fTo = CFG_CHAR_SET) {
    if (is_array($fArray)) {
        foreach ($fArray AS $_arrykey => $_arryval) {
            if (is_string($_arryval)) {
                $fArray[$_arrykey] = autoCharSet($fArray[$_arrykey], $fFrom, $fTo);
            } else if (is_array($_arryval)) {
                $fArray[$_arrykey] = arrayAutoCharSet($_arryval, $fFrom, $fTo);
            }
        }
    }
    reset($fArray);
    Return;
}

Function varFilter($fArray) {
    if (is_array($fArray)) {
        foreach ($fArray AS $_arrykey => $_arryval) {
            if (is_string($_arryval)) {
                $fArray[$_arrykey] = trim($fArray[$_arrykey]);
                $fArray[$_arrykey] = htmlspecialchars($fArray[$_arrykey]);
                $fArray[$_arrykey] = str_replace('javascript', 'javascript ', $fArray[$_arrykey]);
                if (!get_magic_quotes_gpc()) {
                    $fArray[$_arrykey] = addslashes($fArray[$_arrykey]);
                }
            } else if (is_array($_arryval)) {
                $fArray[$_arrykey] = varFilter($_arryval);
            }
        }
    } else {
        $fArray = trim($fArray);
        $fArray = htmlspecialchars($fArray);
        $fArray = str_replace("javascript", "javascript ", $fArray);
    }
    Return $fArray;
}

Function varResume($fArray) {
    if (is_array($fArray)) {
        foreach ($fArray AS $_arrykey => $_arryval) {
            if (is_string($_arryval)) {
                $fArray[$_arrykey] = str_replace('&quot;', '\'', $fArray[$_arrykey]);
                $fArray[$_arrykey] = str_replace('&lt;', '<', $fArray[$_arrykey]);
                $fArray[$_arrykey] = str_replace('&gt;', '>', $fArray[$_arrykey]);
                $fArray[$_arrykey] = str_replace('&amp;', '&', $fArray[$_arrykey]);
                $fArray[$_arrykey] = str_replace('javascript ', 'javascript', $fArray[$_arrykey]);
            } else if (is_array($_arryval)) {
                $fStr[$_arrykey] = varResume($_arryval);
            }
        }
    } else {
        $fArray = str_replace("&quot;", "\"", $fArray);
        $fArray = str_replace("&lt;", "<", $fArray);
        $fArray = str_replace("&gt;", ">", $fArray);
        $fArray = str_replace("&amp;", "&", $fArray);
        $fArray = str_replace("javascript ", "javascript", $fArray);
    }
    Return $fArray;
}

Function trueHtml($fStr) {
    $fStr = varResume($fStr);
    $fStr = StripSlashes($fStr);
    Return $fStr;
}

/**
 * 随机数17位
 * @param type $fMin
 * @param type $fMax
 * @return type 
 */
Function getRand($fMin, $fMax) {
    srand((double) microtime() * 1000000);
    $fLen = "%0" . strlen($fMax) . "d";
    Return sprintf($fLen, rand($fMin, $fMax));
}

Function halt($fStr) {
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\">";
    echo "<html><head>";
    echo "<meta http-equiv='Content-Type' content='text/html; charset=" . CFG_CHAR_SET . " />";
    echo "<title>" . c("运行出错") . "</title>";
    echo "</head>";
    echo "<body leftmargin='20' topmargin='20' marginwidth='0' marginheight='0'>";
    echo c($fStr);
    echo "</body>";
    echo "</html>";
    exit;
}

Function fileRead($fFileName) {
    return file_get_contents($fFileName);
}

Function fileWrite($fFileName, $fContent, $fTag = 'w') {
    ignore_user_abort(TRUE);
    $fp = fopen($fFileName, $fTag);
    if (flock($fp, LOCK_EX)) {
        fwrite($fp, $fContent);
        flock($fp, LOCK_UN);
    }
    fclose($fp);
    ignore_user_abort(FALSE);
    return;
}

Function rowColor($fVar, $fColor1 = "", $fColor2 = "") {
    if (!isset($fVar)) {
        $fVar = $fColor1;
    } else {
        if ($fColor1 == $fVar) {
            $fVar = $fColor2;
        } else {
            $fVar = $fColor1;
        }
    }
    Return $fVar;
}

function lenStr($str, $handle, $onlyCh = 0) {
    $length = strlen($str);
    if ($handle == 3 && $onlyCh == 0) {
        return $length;
    } else {
        $i = 0;
        if ($onlyCh == 1) {
            $k = 0;
        } else {
            $k = 1;
        }
        while ($i < $length) {
            if (preg_match("/^[" . chr(0xa1) . "-" . chr(0xff) . "]+$/", $str[$i])) {
                $i += 3;
                $n += $handle;
            } else {
                $i += 1;
                $n += $k;
            }
        }
        return $n;
    }
}

Function msubstr($fStr, $fStart, $fLen, $fCode = CFG_CHAR_SET) {
    $fCode = strtolower($fCode);
    switch ($fCode) {
        case 'utf8':
        case 'utf-8':
            $fStr = trueHtml($fStr);
            preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $fStr, $ar);
            $i = 0;
            $aC = count($ar[0]);
            foreach ($ar[0] as $value) {
                $i++;
                if (ord($value) > 127) {
                    if (1 == strlen($result)) {
                        $ar[1][] = $result . " ";
                        $result = "";
                    }
                    $ar[1][] = $value;
                } else {
                    $result .= htmlspecialchars($value);
                    if (strlen($result) > 1) {
                        $ar[1][] = $result;
                        $result = "";
                    } elseif ($i == $aC) {
                        $ar[1][] = $result;
                    }
                }
            }
            if (func_num_args() >= 3) {
                if (count($ar[1]) > $fLen) {
                    return @join("", array_slice($ar[1], $fStart, $fLen)) . "..";
                }
                return @join("", array_slice($ar[1], $fStart, $fLen));
            } else {
                return @join("", array_slice($ar[1], $fStart));
            }
            break;
        default:
            $fStart = $fStart * 2;
            $fLen = $fLen * 2;
            $strlen = strlen($fStr);
            for ($i = 0; $i < $strlen; $i++) {
                if ($i >= $fStart && $i < ( $fStart + $fLen )) {
                    if (ord(substr($fStr, $i, 1)) > 129)
                        $tmpstr .= substr($fStr, $i, 2);
                    else
                        $tmpstr .= substr($fStr, $i, 1);
                }
                if (ord(substr($fStr, $i, 1)) > 129)
                    $i++;
            }
            if (strlen($tmpstr) < $strlen)
                $tmpstr .= "...";
            Return $tmpstr;
    }
}

Function is_session($fStr) {
    if ((isset($_SESSION[$fStr])) && (!empty($_SESSION[$fStr]))) {
        return True;
    } else {
        return False;
    }
}

Function doLog($fLogPath, $fLogMaxSize, $fLog) {
    if (!file_exists($fLogPath))
        fileWrite($fLogPath, '');
    if (filesize($fLogPath) > $fLogMaxSize) {
        fileWrite($fLogPath, '');
    }
    ignore_user_abort(TRUE);
    $fp = fopen($fLogPath, 'a');
    if (flock($fp, LOCK_EX)) {
        fwrite($fp, $fLog);
        flock($fp, LOCK_UN);
    }
    fclose($fp);
    ignore_user_abort(FALSE);
}

Function numToMoney($fVal) {
    $len = strlen($fVal);
    if ($len > 3) {
        $num = "";
        for ($i = 0; $i < $len; $i++) {
            $num .= substr($fVal, $i, 1);
            if (0 == (($len - $i - 1) % 3)) {
                if (($len - $i - 1) > 0)
                    $num .= ",";
            }
        }
    }else {
        $num = $fVal;
    }
    Return $num;
}

function randArray($dealArray, $num) {
    if (!is_array($dealArray))
        Return "";
    if ($num > count($dealArray))
        Return $dealArray;
    if ($num <= 0)
        Return "";
    srand((float) microtime() * 10000000);
    $rand_keys = array_rand($dealArray, $num);
    if ($num == 1) {
        $resultArray[$rand_keys] = $dealArray[$rand_keys];
    } else {
        for ($j = 0; $j < $num; $j++) {
            $resultArray[$rand_keys[$j]] = $dealArray[$rand_keys[$j]];
        }
    }
    return $resultArray;
}

Function chkLang($fVal1, $fVal2 = "") {
    if (empty($fVal2)) {
        $language = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
    } else {
        $language = $fVal2;
    }
    $len1 = strlen($language);
    $language = str_replace($fVal1, "", $language);
    $len2 = strlen($language);
    if ($len1 == $len2) {
        return False;
    } else {
        return True;
    }
}

function download($filename, $content) {
    ob_end_clean();
    header("Content-Encoding: none");
    header("Content-type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Accept-Length: " . strlen($content));
    header("Content-Disposition: attachment; filename=" . addslashes($filename));
    header('Pragma: no-cache');
    header('Expires: 0');
    echo $content;
    return;
}

function loadClass($fType, $fName, &$fMainClass) {
    $fType = strtolower($fType);
    $fName = strtolower($fName);
    if ('tool' == $fType) {
        $fDir = 'tools';
    } else {
        $fDir = $fType;
    }
    $classFile = FILE_PATH . 'include/' . $fDir . '/' . $fName . '.' . $fType . '.php';
    if (!file_exists($classFile)) {
        halt('Load Class 文件不存在');
    }
    @include_once($classFile);
    $className = ucfirst($fType) . '_' . ucfirst($fName);
    if (!class_exists($className)) {
        halt('Load Class 文件失' . $className . '不存在');
    }
    $result = new $className($fMainClass);
    return $result;
}

function dbConnection($debug = false) {
    global $db;
    if (!isset($db)) {
        global $DB_TYPE, $DB_HOST, $DB_USER, $DB_PASS, $DB_DATABASE;
        require_once("adodb/adodb.inc.php");
        $db = NewADOConnection("$DB_TYPE");
        $db->debug = $debug;
        $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        if (!$db->Connect("$DB_HOST", "$DB_USER", "$DB_PASS", "$DB_DATABASE")) {
            exit('<a href="/" target="_top">服务器忙,请稍候再访问</a>');
        }
    }
    return $db;
}

function dbClose() {
    global $db;
    if (isset($db)) {
        $db->Close();
    }
}

function sec2hour($sec) {
    $m = intval($sec / 60);
    $ysec = $sec % 60;
    return $m . "分" . $ysec . "秒";
}

function update_from_array($ar) {
    $return = "";
    if (is_array($ar)) {
        foreach ($ar as $k => $v) {
            $return.=($return) ? "," . str_replace('\'', '', $k) . "='$v'" : "" . str_replace('\'', '', $k) . "='$v'";
        }
    }
    return $return;
}

function insert_from_array($ar) {
    $return = "";
    $str_key = "";
    $str_val = "";
    if (is_array($ar)) {
        foreach ($ar as $k => $v) {
            $str_key .= "`" . str_replace('\'', '', $k) . "`,";
            $str_val .= "'" . trim($v) . "',";
        }
    }
    $return = "(" . substr($str_key, 0, -1) . ") VALUES (" . substr($str_val, 0, -1) . ")";
    return $return;
}

function xlsBOF() {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
}

function xlsEOF() {
    echo pack("ss", 0x0A, 0x00);
    return;
}

function xlsWriteNumber($Row, $Col, $Value) {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
}

function xlsWriteLabel($Row, $Col, $Value) {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
}

function utf2gb($str) {
    return iconv("UTF-8", "gb2312", $str);
}

function passport_encrypt($txt, $key) {
    srand((double) microtime() * 1000000);
    $encrypt_key = md5(rand(0, 32000));
    $ctr = 0;
    $tmp = '';
    for ($i = 0; $i < strlen($txt); $i++) {
        $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
        $tmp .= $encrypt_key[$ctr] . ($txt[$i] ^ $encrypt_key[$ctr++]);
    }
    return base64_encode(passport_key($tmp, $key));
}

function passport_decrypt($txt, $key) {
    $txt = passport_key(base64_decode($txt), $key);
    $tmp = '';
    for ($i = 0; $i < strlen($txt); $i++) {
        $tmp .= $txt[$i] ^ $txt[++$i];
    }
    return $tmp;
}

function passport_key($txt, $encrypt_key) {
    $encrypt_key = md5($encrypt_key);
    $ctr = 0;
    $tmp = '';
    for ($i = 0; $i < strlen($txt); $i++) {
        $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
        $tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
    }
    return $tmp;
}

if (!function_exists('json_encode')) {

    function json_encode($a = false) {
        if (is_null($a))
            return 'null';
        if ($a === false)
            return 'false';
        if ($a === true)
            return 'true';
        if (is_scalar($a)) {
            if (is_float($a)) {
                return floatval(str_replace(",", ".", strval($a)));
            }
            if (is_string($a)) {
                static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
                return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
            } else
                return $a;
        }
        $isList = true;
        for ($i = 0, reset($a); $i < count($a); $i++, next($a)) {
            if (key($a) !== $i) {
                $isList = false;
                break;
            }
        }
        $result = array();
        if ($isList) {
            foreach ($a as $v)
                $result[] = json_encode($v);
            return '[' . join(',', $result) . ']';
        } else {
            foreach ($a as $k => $v)
                $result[] = json_encode($k) . ':' . json_encode($v);
            return '{' . join(',', $result) . '}';
        }
    }

}
if (!function_exists('json_decode')) {

    function json_decode($json) {
        $comment = false;
        $out = '$x=';
        for ($i = 0; $i < strlen($json); $i++) {
            if (!$comment) {
                if ($json[$i] == '{')
                    $out .= ' array(';
                else if ($json[$i] == '}')
                    $out .= ')';
                else if ($json[$i] == ':')
                    $out .= '=>';
                else
                    $out .= $json[$i];
            } else
                $out .= $json[$i];
            if ($json[$i] == '"')
                $comment = !$comment;
        }
        eval($out . ';');
        return $x;
    }

}

function objectToArray($object) {
    $object = empty($object) ? array() : $object;
    $result = array();
    $object = is_object($object) ? get_object_vars($object) : $object;
    foreach ($object as $key => $val) {
        $val = (is_object($val) || is_array($val)) ? objectToArray($val) : $val;
        $result[$key] = $val;
    }
    return $result;
}

//随机数
function randStr($num = 4) {
    $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
    $code = '';
    for ($i = 0; $i < $num; $i++) {
        $code .= $str[mt_rand(0, strlen($str) - 1)];
    }
    return $code;
}

//上传图片 $file = $_FILES['file']  $file_path = "./images/upload/"
Function updateImg($file, $file_path) {
    $destination = "";
    if ($file['size'] > 1024 * 1024) {
        echo '上传文件太大';
        return "";
    }
    $array = array('image/jpg', 'image/png', 'image/jpeg', 'image/pjpeg', 'image/gif', 'image/bmp', 'image/x-png');
    if (!in_array($file['type'], $array)) {//判断文件的类型
        echo '上传文件类型不符';
        return "";
    }
    $file_string = $file_path . date("Ym");
    if (!file_exists($file_string)) {
        mkdir($file_string);
    }
    $finfo = pathinfo($file['name']);
    $destination = $file_string . "/" . time() . "." . $finfo['extension'];
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        echo "移动文件出错";
        return "";
    }
//处理后，适用于伪静态使用
    $destination = substr($destination, 1);
    return $destination;
}

//分享代码
Function writeJiaThis() {
    return '<!-- JiaThis Button BEGIN -->
<div class="jiathis_style">
	<span class="jiathis_txt">分享到：</span>
	<a class="jiathis_button_qzone"></a>
	<a class="jiathis_button_tsina"></a>
	<a class="jiathis_button_tqq"></a>
	<a class="jiathis_button_weixin"></a>
	<a href="http://www.jiathis.com/share?uid=1831124" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
</div>
<script type="text/javascript">
var jiathis_config = {data_track_clickback:\'true\'};
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1377218010704539" charset="utf-8"></script>
<!-- JiaThis Button END -->';
}

//删除文件夹，及下面的文件
Function deldir($dir) {
    $dh = opendir($dir);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $dir . "/" . $file;
            if (!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldir($fullpath);
            }
        }
    }
    closedir($dh);
    return true;
    /* if (rmdir($dir)){
      return true;
      } else {
      return false;
      } */
}

//生为二维码
/*
  $chl 信息内容 url:地址,name:姓名,phone:号码
 */
function generateQRfromGoogle($chl, $widhtHeight = '150', $EC_level = 'L', $margin = '0') {
    $chl = urlencode($chl);
    return '<img src="http://chart.apis.google.com/chart?chs=' . $widhtHeight . 'x' . $widhtHeight . '&cht=qr&chld=' . $EC_level . '|' . $margin . '&chl=' . $chl . '" alt="QR code" widht="' . $widhtHeight . '" Height="' . $widhtHeight . '"/>';
}

//判断奇数，是返回TRUE，否返回FALSE
function is_odd($num) {
    return (is_numeric($num) & ($num & 1));
}

//判断偶数，是返回TRUE，否返回FALSE
function is_even($num) {
    return (is_numeric($num) & (!($num & 1)));
}

//设置CooKies数据
function setCookies($array) {
    foreach ($array as $key => $val) {
        setcookie($key, strtolower($val));
    }
}

/**
 * 数组转xml
 * @param type $arr
 * @param DOMDocument $dom
 * @param type $item
 * @return type string
 */
function arrayToXml($arr, $dom = 0, $item = 0) {
    if (!$dom) {
        $dom = new DOMDocument("1.0");
    }
    if (!$item) {
        $item = $dom->createElement("root");
        $dom->appendChild($item);
    }
    foreach ($arr as $key => $val) {
        $itemx = $dom->createElement(is_string($key) ? $key : "item");
        $item->appendChild($itemx);
        if (!is_array($val)) {
            $text = $dom->createTextNode($val);
            $itemx->appendChild($text);
        } else {
            arrayToXml($val, $dom, $itemx);
        }
    }
    $xml = $dom->saveXML();
    $tmp = explode("\n", $xml);
    $xmlstring = "";
    foreach ($tmp as $val) {
        $xmlstring .= $val;
    }
    return $xmlstring;
}

/**
 * xml转数组
 * @param type $xmlstring
 * @return type array
 */
function xmlToArray($xmlstring) {
    $tmp = explode("\n", $xmlstring);
    $xmlstring = "";
    foreach ($tmp as $val) {
        $xmlstring .= trim($val);
    }
    return json_decode(json_encode((array) simplexml_load_string($xmlstring)), true);
}
/**
 * 去除空数据
 * @param type $arrData
 * @return type
 */
function arrayDelNull($arrData){
    $array = [];
    foreach($arrData as $key=>$val){
        if(0 != strlen($val)){
            $array[$key] = $val;
        }
    }
    return $array;
}
/**
 * 还款计算公式  payInterest('50000', '0.1', '3', '1');
 * @param type $money  借款总金额
 * @param type $yearInterest  年化率
 * @param type $month  借月份数
 * @param type $type  1：按月付息，到期还本  2：一次性还款  3：等额本息
 * @return type array
 */
Function payInterest($money, $yearInterest, $month, $type = '1') {
    $array = array();
    $money = floatval($money);
    $yearInterest = floatval($yearInterest);
    $interset = round((($money * $yearInterest) / 12), 2);
    switch ($type) {
        case '1': //按月付息，到期还本
            for ($i = 1; $i <= $month; $i++) {
                $array['notes'][$i]['lixi'] = $interset;
                if ($i != $month) {
                    $array['notes'][$i]['month'] = $i;
                    $array['notes'][$i]['benjin'] = '0';
                    $array['notes'][$i]['zonger'] = $interset;
                    $array['notes'][$i]['yuer'] = $money;
                } else {
                    $array['notes'][$i]['month'] = $i;
                    $array['notes'][$i]['benjin'] = $money;
                    $array['notes'][$i]['zonger'] = round(($money + $interset), 2);
                    $array['notes'][$i]['yuer'] = '0';
                }
                $yingli = 3 * $interset;
            }
            $array['yingli'] = $yingli;
            break;
        case '2'://一次性还款
            $lixi = round(($interset * $month), 2);
            $array['notes']['0']['lixi'] = $lixi;
            $array['notes']['0']['month'] = '1';
            $array['notes']['0']['benjin'] = $money;
            $array['notes']['0']['zonger'] = round(($money + $lixi), 2);
            $array['notes']['0']['yuer'] = '0';
            $array['yingli'] = $lixi;
            break;
        case '3'://等额本息
            $monthInterest = $yearInterest / 12;
            $zonger = monthHuan($money, $monthInterest, $month);
            $k = 1;
            for ($j = ($month - 1); $j >= 0; $j--) {
                $array['notes'][$k]['month'] = $k;
                if (($month - 1) == $j)
                    $yuer = $money;
                else
                    $yuer = ($j + 1) * $zonger;
                $lixi = round(($yuer * $monthInterest), 2);
                $array['notes'][$k]['lixi'] = $lixi;
                $array['notes'][$k]['benji'] = $zonger - $lixi;
                $array['notes'][$k]['zonger'] = $zonger;
                $array['notes'][$k]['yuer'] = $j * $zonger;
                $k++;
            }
            $array['yingli'] = $zonger * 3 - $money;
            break;
    }
    return $array;
}

Function monthHuan($a, $i, $n) {
    $b = ($a * $i * pow((1 + $i), $n)) / (pow((1 + $i), $n) - 1);
    return round($b, 2);
}

/**
 * 系统生成20位商品订单号 
 * @return type 
 */
Function setOddNumber() {
    $array = explode(" ", microtime());
    return $array['1'] . substr($array['0'], 2, 6) . rand(0000, 9999);
}

/**
 * cache写入函数
 */
function writetocache($script, $cachenames, $cachedata = '', $prefix = 'cache_', $rootpath, $photo_dir) {
    if (is_array($cachenames) && !$cachedata) {
        foreach ($cachenames as $name) {
            $cachedata .= getcachearray($name);
        }
    }
    $dir = $rootpath . $photo_dir;
    if (!is_dir($dir)) {
        mkdir($dir, 0777);
    }
    if ($fp = fopen("$dir/$prefix$script.php", 'w')) {
        fwrite($fp, "<?php\n//XINFEIYOU! cache file, DO NOT modify me!\n" .
                "//Created on " . date("M j, Y, G:i") . "\n\n$cachedata?>");
        fclose($fp);
    } else {
        dexit('Can not write to cache files, please check directory ./forumdata/ and ./forumdata/cache/ .');
    }
}

/**
 * 字符串处理函数
 * */
function getcachevars($data, $type = 'VAR') {
    $evaluate = '';
    foreach ($data as $key => $val) {
        if (is_array($val)) {
            $evaluate .= "\$$key = " . arrayeval($val) . ";\n";
        } else {
            $val = addcslashes($val, '\'\\');
            $evaluate .= $type == 'VAR' ? "\$$key = '$val';\n" : "define('" . strtoupper($key) . "', '$val');\n";
        }
    }
    return $evaluate;
}

/**
 * 字符串处理函数
 */
function arrayeval($array, $level = 0) {
    $space = '';
    for ($i = 0; $i <= $level; $i++) {
        $space .= "\t";
    }
    $evaluate = "Array\n$space(\n";
    $comma = $space;
    foreach ($array as $key => $val) {
        $key = is_string($key) ? '\'' . addcslashes($key, '\'\\') . '\'' : $key;
        $val = !is_array($val) && (!preg_match("/^\-?\d+$/", $val) || strlen($val) > 12) ? '\'' . addcslashes($val, '\'\\') . '\'' : $val;
        if (is_array($val)) {
            $evaluate .= "$comma$key => " . arrayeval($val, $level + 1);
        } else {
            $evaluate .= "$comma$key => $val";
        }
        $comma = ",\n$space";
    }
    $evaluate .= "\n$space)";
    return $evaluate;
}
/**
 * 计算时间间隔天数
 * @param type $stime
 * @param type $etime
 * @return type
 */
function timeSpace($stime, $etime) {
    $tmp = explode('-', $stime);
    $ttp = explode('-', $etime);
    $startdate = mktime("0", "0", "0", "$tmp[1]", "$tmp[2]", "$tmp[0]");
    $enddate = mktime("0", "0", "0", "$ttp[1]", "$ttp[2]", "$ttp[0]");
    $days = round(($enddate - $startdate) / 3600 / 24);
    return $days;
}

/**
 * 将备注内的内容转码
 * @param type $str {SYSTEM}:{ODD}20150609000000000001{REHEAR}{SUCCESS}
 * @return string
 */
function transcodeStr($str) {
    $array = array(
        '{SYSTEM}' => '系统',
        '{LOAN}' => '借款',
        '{ODD}' => '单号',
        '{INVEST}' => '投资',
        '{SUCCESS}' => '成功',
        '{FAIL}' => '失败',
        '{MONEY}' => '金额',
        '{AUTOMATIC}' => '自动投标',
        '{SHOUDONG}' => '手动投标',
        '{OPERATE}' => '操作',
        '{FREEZE}' => '冻结',
        '{UNFREEZE}' => '解冻',
        '{USER}' => '用户',
        '{DANGER}' => '非法',
        '{NULLDATA}' => '空数据',
        '{DATA}' => '数据',
        '{WRITELOG}' => '写日志',
        '{REPEAT}' => '重复',
        '{CLAIMS}' => '债权',
        '{TRANSFER}' => '转让',
        '{WORK}' => '工作流',
        '{NO}' => '未',
        '{HUANQI}' => '进入还款期',
        '{BUY}' => '购买',
        '{ADD}' => '添加',
        '{LESS}' => '扣除',
        '{LOG}' => '日志',
        '{BUGUO}' => '不够',
        '{YIBEI}' => '已被',
        '{PARAMETER}' => '参数有误',
        '{RELOAD}' => '更新状态',
        '{REHEAR}' => '复审',
        '{LOCKED}' => '锁死',
        '{GET}' => '获取',
        '{PRINCIPAL}' => '本金',
        '{SERVICE}' => '服务',
        '{APREAD}' => '推广',
        '{END}' => '结束',
        '{MORTGAGE}' => '抵押额',
        '{CREDIT}' => '信用额',
        '{GUARANTEE}' => '担保额',
        '{QISHU}' => '期数',
        '{HUANKUANLIST}' => '还款列表',
        '{LOANUSER}' => '借款者',
        '{HUANKUAN}' => '还款',
        '{INTEREST}' => '利息',
        '{SHOUYI}' => '收益表',
        '{COMPANY}' => '商家',
        '{TRIAL}' => '初审',
        '{DENY}' => '拒绝',
        '{JIEKUAN}' => '借款',
        '{HOUTAI}' => '后台',
        '{CHONGZHI}' => '充值',
        '{BALANCE}' => '余额',
        '{SHENGYU}' => '剩余',
    );
    return strtr($str, $array);
}

/**
 * 贴图库图片列表
 * @param type $json
 * @return type
 */
function tietukuJson($json) {
    $array = explode('[[', htmlspecialchars_decode($json));
    $i = 0;
    foreach ($array as $val) {
        $tmp = (json_decode(json_decode($val, TRUE), TRUE));
        if (!empty($tmp)) {
            $tie_array[$i] = $tmp;
            $i++;
        }
    }
    return $tie_array;
}

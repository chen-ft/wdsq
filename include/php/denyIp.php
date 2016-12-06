<?php
/**
 * 开发架构当前IP是否禁止检查模块
 *
 * @author Arnold 2007/04/25
 * @package Core
 */
	@include_once ("./include/config/denyIp.inc.php");
	$clientIp = getClientIp();
    if (isCookieDeny($clientIp, $denyIp)) {
    	denyMsg();
    } elseif (isDenyIp($clientIp, $denyIp)) {
    	denyMsg();
    }
	unset($denyIp);
/**
 * 取得客户端IP
 *
 * @return array 客户端ip数组，含 REMOTE_ADDR HTTP_X_FORWARDED_FOR CLIENT_IP 的4、3、2段
 */
function getClientIp()
{
		/*$ipArr = explode('.', getenv('REMOTE_ADDR'));
		$clientIp['REMOTE_ADDR'][0]   = getenv('REMOTE_ADDR');
		$clientIp['REMOTE_ADDR'][1]   = $ipArr[0].".".$ipArr[1].".".$ipArr[2];
		$clientIp['REMOTE_ADDR'][2]   = $ipArr[0].".".$ipArr[1];
	if (getenv('HTTP_X_FORWARDED_FOR')) {
	    $fIpArr = split('\.', getenv('HTTP_X_FORWARDED_FOR'));
	    $clientIp['HTTP_X_FORWARDED_FOR'][0]   = getenv('HTTP_X_FORWARDED_FOR');
	    $clientIp['HTTP_X_FORWARDED_FOR'][1]   = $fIpArr[0].".".$fIpArr[1].".".$fIpArr[2];
   	    $clientIp['HTTP_X_FORWARDED_FOR'][2]   = $fIpArr[0].".".$fIpArr[1];
	}
	if (getenv('CLIENT_IP')) {
		$cIpArr = split('\.', getenv('CLIENT_IP'));
	    $clientIp['CLIENT_IP'][0]   = getenv('CLIENT_IP');
	    $clientIp['CLIENT_IP'][1]   = $cIpArr[0].".".$cIpArr[1].".".$cIpArr[2];
	    $clientIp['CLIENT_IP'][2]   = $cIpArr[0].".".$cIpArr[1];
	}*/
	return $clientIp = '';
}
/**
 * 判断当前客户端是否存在禁止访问Cookie
 *
 * @param String $clientIp 客服端IP
 * @param Array $arrDenyIp 拒绝ip数组
 * @return bool 如果存在 denyAccess Cookie 返回真，否则为假
 */
function isCookieDeny($clientIp, $arrDenyIp)
{
	if (isset($_COOKIE['denyAccess'])) {
		while (list($key,$val)=@each($arrDenyIp)) {
			if (($clientIp['REMOTE_ADDR'][0]  == $val['ip'])||($clientIp['REMOTE_ADDR'][1]  == $val['ip'])||($clientIp['REMOTE_ADDR'][2]  == $val['ip'])) {
				if ($val['cookieTime']<0) {
					setcookie("denyAccess","",time()-36000,"/");
				}
			}
		}
		return True;
	} else {
		return False;
	}
}
/**
 * 判断当前客户端IP是否存在禁止访问列表中
 *
 * @param String $clientIp 客服端IP
 * @param Array $arrDenyIp 拒绝ip数组
 * @return bool 如果存在返回真，否则为假
 */
function isDenyIp($clientIp, $arrDenyIp)
{
	if (is_array($arrDenyIp)) {
		while (list($key,$val)=@each($arrDenyIp)) {
			if (@in_array($val['ip'],$clientIp['REMOTE_ADDR'])||@in_array($val['ip'],$clientIp['HTTP_X_FORWARDED_FOR'])||@in_array($val['ip'],$clientIp['CLIENT_IP'])) {
				if ($val['cookieTime']>0) {
					$cookieTime = $val['cookieTime']*3600;
					$cookieTime = time()+$cookieTime;
					setcookie("denyAccess", "1", $cookieTime, "/");
				}
				return True;
			}
		}
	}
	return False;
}
/**
 * 禁止客户端访问时的错误提示信息
 */
function denyMsg()
{
	$haltMsg = "<H1>Internal Server Error</H1>The server encountered an internal error or misconfiguration and was unable to complete your request.<P> Please contact the server administrator, ycheng@softwareliberty.org and inform them of the time the error occurred,and anything you might have done that may have caused the error.<P>More information about this error may be available in the server error log.<P><HR><ADDRESS>Apache/1.3.26 Server at ".getenv('HTTP_HOST')." Port 80</ADDRESS>";
	echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>";
	echo "<html><head>";
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
	echo "</head>";
	echo "<body leftmargin='20' topmargin='20' marginwidth='0' marginheight='0'>";
	echo $haltMsg;
	echo "</body>";
    echo "</html>";
	exit;
}
?>
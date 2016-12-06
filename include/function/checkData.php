<?
/**
 *功能：表单验证的一些信息
 *功能列表1：邮箱:checkEmail， 中文:checkCn，    存在中文:deCn:，     英文:checkEn
 *功能列表2：数字:checkNumber，字符:checkStr，   百分率:checkPercent，价格:checkMoney，
 *功能列表3：QQ:checkQq，      手机:checkMobile，电话:checkPhone，    身份证:checkIdCard
 *功能列表4：日期:checkDateTime浮点数:checkFloat
 *$str：被验证的字符串
 *日期：2008-5-19
 *作者：刘晨辉
 **/
class checkData
{
	/**
	 *功能：验证邮箱是否准确
	 *日期：2008-5-19
	 **/
	function checkEmail($str)
	{
		if (preg_match("/^([a-zA-Z0-9])+([\w-.])*([a-zA-Z0-9])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)/",$str)) return true;
		else return false;
	}
	
	/**
	 *功能：验证是否全是中文
	 *日期：2008-5-19
	 **/
	function checkCn($str)
	{
		if(!eregi("[^\x80-\xff]","$str")) return true;
		else return false;
	}
	
	/**
	 *功能：判断是否存在中文
	 *日期：2008-5-19
	 **/
	function deCn($str)
	{
		$strlen=strlen($str);
		$length=1;
		for($i=0;$i<$strlen;$i++)
		{
			$tmpstr=ord(substr($str,$i,1));
			if(($tmpstr<=161 || $tmpstr>=247))
			{
				$a=0;
			}else
			{
				$a=1;
				break;
			}
		}
		if($a=='0') return false;
		else return true;
	}

	/**
	 *功能：验证是否全是字母
	 *日期：2008-5-19
	 **/
	function checkEn($str)
	{
		if(preg_match("/^[a-zA-Z]+$/","$str")) return true;
		else return false;
	}
	
	/**
	 *功能：验证是否全是数字
	 *日期：2008-5-19
	 **/
	function checkNumber($str)
	{
		if(preg_match("/\d/","$str")) return true;
		else return false;
	}
	
	/**
	 *功能：验证是否全是字符
	 *日期：2008-5-19
	 **/
	function checkStr($str)
	{
		if(preg_match("/^[a-zA-Z_0-9]+$/","$str")) return true;
		else return false;
	}

	/**
	 *功能：验证是否是百分率
	 *日期：2008-5-19
	 **/
	function checkPercent($str)
	{
		if(preg_match("/^[0-9]+(.[0-9]+)?%$/","$str")) return true;
		else return false;
	}

	/**
	 *功能：验证价格格式是否正确
	 *日期：2008-5-19
	 **/
	 function checkMoney($str)
	 {
		if(preg_match("/^[-]?[0-9]+(.[0-9]+)?$/","$str")) return true;
		else return false;
	 }
	
	/**
	 *功能：验证浮点数
	 *日期：2008-5-27
	 **/
	 function checkFloat($str)
	{
		if(preg_match("/^[0-9]+(.[0-9]+)?$/","$str")) return true;
		else return false;
	}
	 /**
	  *功能：验证QQ号码
	  *日期：2008-5-19
	  **/
	 function checkQq($str)
	 {
		if(preg_match("/^[1-9][0-9]{4,9}$/","$str")) return true;
		else return false;
	 }

	 /**
	  *功能：验证手机号码
	  *日期：2008-5-19
	  **/
	 function checkMobile($str)
	 {
		if(preg_match("/^[0]{0,1}1[0-9]{10}$/","$str")) return true;
		else return false;
	 }

	 /**
	  *功能：验证电话号码
	  *日期：2008-5-19
	  **/
	 function checkPhone($str)
	 {
		if(preg_match("/^[0-9]{3,4}[-]{0,1}[0-9]{7,8}$/","$str")) return true;
		else return false;
	 }

	 /**
	  *功能：验证身份证号码
	  *日期：2008-5-19
	  **/
	 function checkIdCard($str)
	 {
		if(preg_match("/^[1-9][0-9]{17}$/","$str")) return true;
		else return false;
	 }

	 /**
	  *功能：验证日期是否有效
	  *日期：2008-5-19
	  **/
	 function checkDateTime($str)
	 {
		if(preg_match("/^[1-9][0-9]{3}-[0-1]?[0-9]-[0-3][0-9]$/","$str"))
		{
			$tmp_arr = explode("-",$str);
			//				 『月			『日		  『年
			if(checkdate("$tmp_arr[1]","$tmp_arr[2]","$tmp_arr[0]")) return true;
		}else return false;
	 }
}
?>
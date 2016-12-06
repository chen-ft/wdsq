<?
/**
 *���ܣ�����֤��һЩ��Ϣ
 *�����б�1������:checkEmail�� ����:checkCn��    ��������:deCn:��     Ӣ��:checkEn
 *�����б�2������:checkNumber���ַ�:checkStr��   �ٷ���:checkPercent���۸�:checkMoney��
 *�����б�3��QQ:checkQq��      �ֻ�:checkMobile���绰:checkPhone��    ���֤:checkIdCard
 *�����б�4������:checkDateTime������:checkFloat
 *$str������֤���ַ���
 *���ڣ�2008-5-19
 *���ߣ�������
 **/
class checkData
{
	/**
	 *���ܣ���֤�����Ƿ�׼ȷ
	 *���ڣ�2008-5-19
	 **/
	function checkEmail($str)
	{
		if (preg_match("/^([a-zA-Z0-9])+([\w-.])*([a-zA-Z0-9])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)/",$str)) return true;
		else return false;
	}
	
	/**
	 *���ܣ���֤�Ƿ�ȫ������
	 *���ڣ�2008-5-19
	 **/
	function checkCn($str)
	{
		if(!eregi("[^\x80-\xff]","$str")) return true;
		else return false;
	}
	
	/**
	 *���ܣ��ж��Ƿ��������
	 *���ڣ�2008-5-19
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
	 *���ܣ���֤�Ƿ�ȫ����ĸ
	 *���ڣ�2008-5-19
	 **/
	function checkEn($str)
	{
		if(preg_match("/^[a-zA-Z]+$/","$str")) return true;
		else return false;
	}
	
	/**
	 *���ܣ���֤�Ƿ�ȫ������
	 *���ڣ�2008-5-19
	 **/
	function checkNumber($str)
	{
		if(preg_match("/\d/","$str")) return true;
		else return false;
	}
	
	/**
	 *���ܣ���֤�Ƿ�ȫ���ַ�
	 *���ڣ�2008-5-19
	 **/
	function checkStr($str)
	{
		if(preg_match("/^[a-zA-Z_0-9]+$/","$str")) return true;
		else return false;
	}

	/**
	 *���ܣ���֤�Ƿ��ǰٷ���
	 *���ڣ�2008-5-19
	 **/
	function checkPercent($str)
	{
		if(preg_match("/^[0-9]+(.[0-9]+)?%$/","$str")) return true;
		else return false;
	}

	/**
	 *���ܣ���֤�۸��ʽ�Ƿ���ȷ
	 *���ڣ�2008-5-19
	 **/
	 function checkMoney($str)
	 {
		if(preg_match("/^[-]?[0-9]+(.[0-9]+)?$/","$str")) return true;
		else return false;
	 }
	
	/**
	 *���ܣ���֤������
	 *���ڣ�2008-5-27
	 **/
	 function checkFloat($str)
	{
		if(preg_match("/^[0-9]+(.[0-9]+)?$/","$str")) return true;
		else return false;
	}
	 /**
	  *���ܣ���֤QQ����
	  *���ڣ�2008-5-19
	  **/
	 function checkQq($str)
	 {
		if(preg_match("/^[1-9][0-9]{4,9}$/","$str")) return true;
		else return false;
	 }

	 /**
	  *���ܣ���֤�ֻ�����
	  *���ڣ�2008-5-19
	  **/
	 function checkMobile($str)
	 {
		if(preg_match("/^[0]{0,1}1[0-9]{10}$/","$str")) return true;
		else return false;
	 }

	 /**
	  *���ܣ���֤�绰����
	  *���ڣ�2008-5-19
	  **/
	 function checkPhone($str)
	 {
		if(preg_match("/^[0-9]{3,4}[-]{0,1}[0-9]{7,8}$/","$str")) return true;
		else return false;
	 }

	 /**
	  *���ܣ���֤���֤����
	  *���ڣ�2008-5-19
	  **/
	 function checkIdCard($str)
	 {
		if(preg_match("/^[1-9][0-9]{17}$/","$str")) return true;
		else return false;
	 }

	 /**
	  *���ܣ���֤�����Ƿ���Ч
	  *���ڣ�2008-5-19
	  **/
	 function checkDateTime($str)
	 {
		if(preg_match("/^[1-9][0-9]{3}-[0-1]?[0-9]-[0-3][0-9]$/","$str"))
		{
			$tmp_arr = explode("-",$str);
			//				 ����			����		  ����
			if(checkdate("$tmp_arr[1]","$tmp_arr[2]","$tmp_arr[0]")) return true;
		}else return false;
	 }
}
?>
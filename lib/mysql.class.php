<?PHP
/**
 * �����ܹ����ݿ���
 */
Class MySql  {
	/**
	 * ���ݿ�������ַ��ʹ��main.inc.php�е����ã�����ʹ��Ĭ��ֵ
	 * 
	 * @var string
	 */
	Var $Host     = 'localhost';
	/**
	 * ���ݿ����ƣ�ʹ��main.inc.php�е����ã�����ʹ��Ĭ��ֵ
	 * @var string
	 */
	Var $Database = 'dbName';
	/**
	 * ���ݿ��û����ƣ�ʹ��main.inc.php�е����ã�����ʹ��Ĭ��ֵ
	 * 
	 * @var string
	 */
	Var $User     = 'userName';
	/**
	 * ���ݿ��û����룬ʹ��main.inc.php�е����ã�����ʹ��Ĭ��ֵ
	 * 
	 * @var string
	 */
	Var $Password = 'password';
	/**
	 * �Ƿ��Զ��ͷ� MySQL ����
	 * 
	 * @var bool True �Զ��ͷţ�False ���Զ��ͷ�
	 */
	Var $AutoFree    = True;
	/**
	 * ��ʾ������Ѷ
	 * 
	 * @var bool True ��ʾ��False ����ʾ
	 */
	Var $Debug       = False;
	/**
	 * ������
	 * 
	 * @var string yes ��ʾ�����ж�ִ�У�no ���Դ��󣬼���ִ�У�report ��ʾ���󣬼���ִ��
	 */
	Var $HaltOnError = 'yes';
	/**
	 * �Ƿ񱨸���ϸ������Ų�������Ա
	 * 
	 * @var string mail ��ϸ�����mail������Ա��report ֱ����ʾ��ϸ����log ������¼��־
	 */
	Var $ReportError = 'log';
	/**
	 * ��¼��ϸ�������־��ַ
	 * 
	 * @var string 
	 */
	Var $LogPath = 'data/logs/sql/errLog';
	/**
	 * �Ƿ�ʹ�ó�������
	 * 
	 * @var fool True �������ᣬFalse �ǳ�������
	 */
	Var $PconnectOn  = True;
	/**
	 * ��ѯ���
	 *
	 * @var array ������ķ�ʽ����һ�в�ѯ���
	 */
	Var $record = Array();
	/**
	 * ��ǰ���صĲ�ѯ�������
	 *
	 * @var int
	 */
	Var $Row;
	/**
	 * ��ѯ���
	 *
	 * @var string
	 */
	Var $QueryStr = '';
	/**
	 * ������
	 *
	 * @var int
	 */
	Var $Errno = 0;
	/**
	 * ������Ϣ
	 *
	 * @var string
	 */
	Var $Error = '';
	/**
	 * ���Ͽ�����
	 *
	 * @var string
	 */
	Var $Type     = 'MySQL';
    /**
     * ��˾���ƻ���ַ
     *
     * @var string
     */
    Var $Company  = 'www.addcn.com';
	/**
	 * ���Ͽ����Աemail
	 *
	 * @var string
	 */
	Var $AdminMail= 'Arnold@addcn.com';
	/**
	 * ����ID
	 *
	 * @var int
	 */
	Var $LinkID  = 0;
	/**
	 * ��ѯID
	 *
	 * @var int
	 */
	Var $QueryID = 0;
	/**
	 * ������
	 *
	 * @return MySql
	 */
	Function MySql() {
		if (CFG_DEBUG_MODE){
			$this->ReportError = 'report';
		}
		$this->LogPath .= date('Ymd').'.html';
	}
	/**
	 * ��ȡ��ǰ����ID
	 *
	 * @return int
	 */
	Function getLinkID() {
		Return $this->LinkID;
	}
	/**
	 * ��ȡ��ǰ��ѯID
	 *
	 * @return int
	 */
	Function getQueryID() {
		Return $this->QueryID;
	}
	/**
	 * �������Ͽ�
	 *
	 * @return int ����ID
	 */
	Function connect() {
	  /*---------- �������ӣ�ѡ�����Ͽ� ----------*/
		if ( $this->LinkID == 0 ) {
			// ��������
			if ( $this->PconnectOn ) {
				$this->LinkID = @mysql_pconnect($this->Host, $this->User, $this->Password);
			} else {
				$this->LinkID = @mysql_connect($this->Host, $this->User, $this->Password);
			}
			// ���Ӵ���
			if ( $this->LinkID == 0 ) {
				if ( $this->Debug ) {
					$msg = "connect('$this->Host', '$this->User', '$this->Password') ����ʧ�ܣ�";
				} else {
					$msg = '��ʱ�޷��������Ͽ⣬����ϵ����Ա��';
				}
				$this->halt($msg);
				Return False;
			}
			// ѡ�����Ͽ�ʱ����
			if ( !@mysql_select_db($this->Database, $this->LinkID) ) {
				$this->halt("�޷������Ͽ�'".$this->Database."'��");
				Return False;
			}
			mysql_query("SET NAMES '".CFG_CHAR_SET."'");
		}
		Return $this->LinkID;
	}
	/**
	 * �ͷŲ�ѯ���
	 */
	Function free() {
		@mysql_free_result($this->QueryID);
		$this->QueryID = 0;
	}
	/**
	 * ִ��SQL��ѯ���
	 *
	 * @param string ��ѯ���
	 * @return int ��ѯ���
	 */
	Function query($str) {
		if ( $str == '' ) Return False;

		if ( !$this->connect() ) Return False;

	  /*------- �²�ѯ���ͷ�ǰ�εĲ�ѯ��� -------*/
		if ( $this->QueryID ) {
			$this->free();
		}
		
		$str = varResume($str);	// �ָ������˵ı���,��ԭ��ʵ��ֵ
		
		$this->QueryStr = $str;

		$debugMsg = c("����: ���");
		if ( $this->Debug ) printf($debugMsg." = %s<br>\n", $this->QueryStr);

		$this->QueryID = @mysql_query($this->QueryStr, $this->LinkID);
		$this->Row   = 0;
		if ( !$this->QueryID ) {
			$this->halt("�����ѯ:".autoCharSet($this->QueryStr, CFG_CHAR_SET, CFG_TEMPLATE_LANGUAGE));
			Return False;
		} else {
			Return $this->QueryID;
		}
	}
	/**
	 * ��ò�ѯ���
	 *
	 * @return bool True �в�ѯ�����False �޲�ѯ���
	 */
	Function nextRecord() {
		if ( !$this->QueryID ) {
			$this->halt('ִ�д��󣺲�ѯ��Ч��');
			Return False;
		}

		$this->record = @mysql_fetch_array($this->QueryID);
        if ("" != $this->record){
			foreach($this->record as $key => $val) { 
				$this->record[$key] = $val; // �Զ��� ���� ���Ը�ʽ����ת��
			}
			$this->record = varFilter($this->record);	// ȡ����ֵ���а�ȫ����
		}

		$this->Row += 1;
		
		$stat = is_array($this->record);

		if ( !$stat && $this->AutoFree ) {
			$this->free();
		}
		Return $stat;
	}
	/**
	 * ���������¼��ID
	 *
	 * @return int �� False��int Ϊ��ţ�False Ϊ����ʧ��
	 */
	Function insertId(){
		if( $result = mysql_insert_id($this->LinkID) ) {
			Return $result;
		} else {
			Return False;
		}
	}
	/**
	 * insert ���Է���
	 *
	 * @param string ����
	 * @param string �ֶ��б�
	 * @param string ֵ�б�
	 * @return bool True insert �ɹ���False insert ʧ��
	 */
	Function insert($table, $field, $value) {
		$str = "insert into ".$table;
		if ( $field != "" ) $str .= "(".$field.")";
		$str .= " values(".$value.")";
		if ( $this->query($str) ) {
			Return True;
		} else {
			Return False;
		}
	}
	/**
	 * replace ���Է���
	 *
	 * @param string ����
	 * @param string �ֶ��б�
	 * @param string ֵ�б�
	 * @return bool True replace �ɹ���False replace ʧ��
	 */
	Function replace($table, $field, $value) {
		$str = "replace into ".$table;
		if ( $field != "" ) $str .= "(".$field.")";
		$str .= " values(".$value.")";
		if ( $this->query($str) ) {
			Return True;
		} else {
			Return False;
		}
	}
	/**
	 * select ���Է���
	 *
	 * @param string ����
	 * @param string �ֶ��б�
	 * @param string ���
	 * @param string ����
	 * @param string $limit
	 * @return bool True select �ɹ���False select ʧ��
	 */
	Function select($table, $field="*", $condition="", $order="", $limit="") {
		$str = "select ".$field." from ".$table;
		if ( $condition != "" ) $str.=" where ".$condition;
		if ( $order != "" ) $str.=" order by ".$order;
		if ( $limit != "" ) $str.=" limit ".$limit;
		if ( $this->query($str) ) {
			Return True;
		} else {
			Return False;
		}
	}
	/**
	 * update ���Է���
	 *
	 * @param string ����
	 * @param string �ֶκ͸���ֵ���б�
	 * @param string ����
	 * @return bool True update �ɹ���False update ʧ��
	 */
	Function update($table, $value, $condition = '') {
		$str = "update ".$table." set ".$value;
		if ( $condition != "" ) $str.=" where ".$condition;
		if ( $this->query($str) ) {
			Return True;
		} else {
			Return False;
		}
	}
	/**
	 * delete ���Է���
	 *
	 * @param string ����
	 * @param string ����
	 * @return bool True delete �ɹ���False delete ʧ��
	 */
	Function delete($table, $condition="") {
		$str = "delete from ".$table;
		if ( $condition != "" ) $str.=" where ".$condition;
		if ( $this->query($str) ) {
			Return True;
		} else {
			Return False;
		}
	}
	/**
	 * ��ѯ����������һ����¼���
	 *
	 * @param string ��ѯ���
	 * @return bool True ��ѯ�����ؽ���ɹ���False ��ѯ�����ؽ��ʧ��
	 */
	Function selectOne($str) {
		if ( $this->query($str) ) {
			if ( $this->nextRecord() ) {
				Return $this->record;
			} else {
				Return False;
			}
		} else {
			Return False;
		}
	}
	/**
	 * ��ѯ������������� limitLine �����ļ�¼��Ϊ��ֹ���������limit ��ֵ�ɶ�������ָ����sql ���������� limit �Ӿ䣬Ĭ��30��
	 *
	 * @param string ��ѯ���
	 * @param int limit ��ʼλ��
	 * @param int ���������
	 * 
	 * @return array �� bool ��ѯ�ɹ��������ʽ���ؽ����False ��ѯʧ��
	 */
	Function selectAll($str, $limitStart = 0, $limitLine = 30) {
		$str .= ' LIMIT '.$limitStart.', '.$limitLine;
		if ( $this->query($str) ) {
			$resultArr = array();
			while ( $this->nextRecord() ) {
				$resultArr[] = $this->record;
			}
			if (count($resultArr)>0){
				return $resultArr;
			} else {
				Return False;
			}
		} else {
			Return False;
		}
	}	
	/**
	 * count������Է���
	 *
	 * @param string ����
	 * @param string �ֶ�
	 * @param string ����
	 * @return bool True count �ɹ���False count ʧ��
	 */
	Function count($table, $field="*", $condition="") {
		if ( $condition != "" ) $strC=" where ".$condition;
		$str = "select count(".$field.") from ".$table.$strC;
		$this->query($str);
		$this->nextRecord();
		Return $this->record[0];
	}
	/**
	 * ��ȡ������һ���µĲ�ѯ���
	 *
	 * @return array �� False ,array Ϊ���صĲ�ѯ�������FalseΪ���²�ѯ���
	 */
	Function nextData() {
		if ( $this->nextRecord() ) {
			Return $this->record;
		}else{
			Return False;
		}
	}
	/**
	 * ���SQL���ִ�к���Ӱ�������
	 *
	 * @return int
	 */
	Function affectedRows() {
		Return @mysql_affected_rows($this->LinkID);
	}
	/**
	 * ���SQL��ѯ���ִ�к����������ļ�¼����
	 *
	 * @return int
	 */
	Function numRows() {
		Return @mysql_num_rows($this->QueryID);
	}
	/**
	 * ����ֶ���
	 *
	 * @return int
	 */
	Function numFields() {
		Return @mysql_num_fields($this->QueryID);
	}
	/**
	 * numRows�����Է���
	 *
	 * @return int
	 */
	Function nr() {
		Return $this->numRows();
	}
	/**
	 * ��ȡ��ѯ����е�ĳ���ֶ�ֵ
	 *
	 * @param string �ֶ�����
	 * @return string �ֶε�ֵ
	 */
	Function r($name) {
		if ( isset($this->record[$name]) ) {
			Return $this->record[$name];
		}
	}
	/**
	 * ������
	 *
	 * @param string ������Ϣ
	 */
	Function halt($msg) {
		$this->Error = autoCharSet(@mysql_error($this->LinkID), CFG_CHAR_SET, CFG_TEMPLATE_LANGUAGE);
		$this->Errno = @mysql_errno($this->LinkID);
		if ( $this->HaltOnError == 'no' ) Return;

		$this->haltmsg($msg);
		if ( $this->HaltOnError != 'report' ) halt(' ϵͳ���Ͽⷢ�����󣬵�ǰ�����ѱ���ֹ��');
	}

	/**
	 * ��ϸ���������Ϣ
	 *
	 * @param string ������Ϣ
	 */
	Function haltmsg($msg) {
		if ( 'mail' == $this->ReportError ) { // ��Mail�o����T
			$mailTitle = " �Y�ώ���F�e�`��";
			$mailMessage = "�� ".$this->Company." �ϵ��Y�ώ�l���e�`: $msg\n";
			$mailMessage.= "MySQL �����e�`��(MySQL return error message): ".$this->Error."\n";
			$mailMessage.= "MySQL ���ص��e�`̖�a��(Error number): ".$this->Errno."\n";
			$mailMessage.= "���e�r�g(date): ".date("Y-m-d l H:i:s")."\n";
			$mailMessage.= "���e�ĵ�ַ(url): http://".getenv("HTTP_HOST").getenv("REQUEST_URI")."\n";
			$mailMessage.= "ǰһ����ַ��(referer url): ".getenv("HTTP_REFERER")."\n";

			@mail ($this->AdminMail, $this->Company."-".getenv("HTTP_HOST").$mailTitle,$mailMessage);

			$message .="<p>�Y�ώ��Űl�����p΢���e�`��Ո�Ժ��������Lԇһ�¡�</p>";
			$message .= "<p>��ϵ�y�ѽ������e�`ͨ�^E-Mail�l�ͽo�� ".$this->Company." ��<a href=\"mailto:".$this->AdminMail."\">���̎�</a>�� ������}��Ȼ����Ҳ����ֱ���j����</p>";
			$message .= "<p>����Ϊ���δ������Ǹ�⣬ͬʱ��л����֧�֣�</p>";
		} elseif ( 'report' == $this->ReportError ) { // ֱ���@ʾԔ���e�`
			$message  = "</td></tr></table><b>Database error:</b> ".$msg."<br>\n";
			$message .= "<b>MySQL Error</b>: ".$this->Errno." (".$this->Error.")<br>\n";
		} elseif ( 'log' == $this->ReportError ) { // ӛ���־
			$message  = '-----------------------------------------------------------<br>';
			$message  .= 'Date��'.date('Y-m-d H:i:s').'<br>';	
			$message  .= 'Url�� http://'.getenv('HTTP_HOST').getenv('REQUEST_URI').'<br>';
			$message  .= 'Referer Url��'.getenv("HTTP_REFERER").'<br>';
			$message  .= 'Error SQL��'.$msg.'<br>';
			$message  .= 'MySQL Error��'.$this->Errno.'('.$this->Error.')<br>';
			fileWrite($this->LogPath,$message,'a');
			$message ="<p>�Y�ώ��Űl�����p΢���e�`��Ո�Ժ��������Lԇһ�¡�";
			$message .= "<p>��ϵ�y�ѽ������e�`�M����ӛ䛣�����Ϊ���δ������Ǹ�⣬ͬʱ��л����֧�֣�</p>";
		} else {
			$message ="<p>�Y�ώ��Űl�����p΢���e�`��Ո�Ժ��������Lԇһ�¡�";
			$message .= "<p>����Ϊ���δ������Ǹ�⣬ͬʱ��л����֧�֣�</p>";
		}
		echo autoCharSet($message);
	}
}
?>
<?PHP
/**
 * 开发架构数据库类
 */
Class MySql  {
	/**
	 * 数据库主机地址，使用main.inc.php中的设置，否则使用默认值
	 * 
	 * @var string
	 */
	Var $Host     = 'localhost';
	/**
	 * 数据库名称，使用main.inc.php中的设置，否则使用默认值
	 * @var string
	 */
	Var $Database = 'dbName';
	/**
	 * 数据库用户名称，使用main.inc.php中的设置，否则使用默认值
	 * 
	 * @var string
	 */
	Var $User     = 'userName';
	/**
	 * 数据库用户密码，使用main.inc.php中的设置，否则使用默认值
	 * 
	 * @var string
	 */
	Var $Password = 'password';
	/**
	 * 是否自动释放 MySQL 连结
	 * 
	 * @var bool True 自动释放，False 不自动释放
	 */
	Var $AutoFree    = True;
	/**
	 * 显示调试资讯
	 * 
	 * @var bool True 显示，False 不显示
	 */
	Var $Debug       = False;
	/**
	 * 错误处理
	 * 
	 * @var string yes 显示错误，中断执行；no 忽略错误，继续执行；report 显示错误，继续执行
	 */
	Var $HaltOnError = 'yes';
	/**
	 * 是否报告详细错误寄信并给管理员
	 * 
	 * @var string mail 详细错误寄mail给管理员；report 直接显示详细错误；log 仅仅记录日志
	 */
	Var $ReportError = 'log';
	/**
	 * 记录详细错误的日志地址
	 * 
	 * @var string 
	 */
	Var $LogPath = 'data/logs/sql/errLog';
	/**
	 * 是否使用持续连结
	 * 
	 * @var fool True 持续连结，False 非持续连结
	 */
	Var $PconnectOn  = True;
	/**
	 * 查询结果
	 *
	 * @var array 以数组的方式返回一行查询结果
	 */
	Var $record = Array();
	/**
	 * 当前返回的查询结果行数
	 *
	 * @var int
	 */
	Var $Row;
	/**
	 * 查询语句
	 *
	 * @var string
	 */
	Var $QueryStr = '';
	/**
	 * 错误编号
	 *
	 * @var int
	 */
	Var $Errno = 0;
	/**
	 * 错误信息
	 *
	 * @var string
	 */
	Var $Error = '';
	/**
	 * 资料库类型
	 *
	 * @var string
	 */
	Var $Type     = 'MySQL';
    /**
     * 公司名称或网址
     *
     * @var string
     */
    Var $Company  = 'www.addcn.com';
	/**
	 * 资料库管理员email
	 *
	 * @var string
	 */
	Var $AdminMail= 'Arnold@addcn.com';
	/**
	 * 连接ID
	 *
	 * @var int
	 */
	Var $LinkID  = 0;
	/**
	 * 查询ID
	 *
	 * @var int
	 */
	Var $QueryID = 0;
	/**
	 * 构造器
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
	 * 获取当前连接ID
	 *
	 * @return int
	 */
	Function getLinkID() {
		Return $this->LinkID;
	}
	/**
	 * 获取当前查询ID
	 *
	 * @return int
	 */
	Function getQueryID() {
		Return $this->QueryID;
	}
	/**
	 * 连结资料库
	 *
	 * @return int 连结ID
	 */
	Function connect() {
	  /*---------- 建立连接，选择资料库 ----------*/
		if ( $this->LinkID == 0 ) {
			// 建立连接
			if ( $this->PconnectOn ) {
				$this->LinkID = @mysql_pconnect($this->Host, $this->User, $this->Password);
			} else {
				$this->LinkID = @mysql_connect($this->Host, $this->User, $this->Password);
			}
			// 连接错误
			if ( $this->LinkID == 0 ) {
				if ( $this->Debug ) {
					$msg = "connect('$this->Host', '$this->User', '$this->Password') 连接失败！";
				} else {
					$msg = '暂时无法连接资料库，请联系管理员！';
				}
				$this->halt($msg);
				Return False;
			}
			// 选择资料库时错误
			if ( !@mysql_select_db($this->Database, $this->LinkID) ) {
				$this->halt("无法打开资料库'".$this->Database."'！");
				Return False;
			}
			mysql_query("SET NAMES '".CFG_CHAR_SET."'");
		}
		Return $this->LinkID;
	}
	/**
	 * 释放查询结果
	 */
	Function free() {
		@mysql_free_result($this->QueryID);
		$this->QueryID = 0;
	}
	/**
	 * 执行SQL查询语句
	 *
	 * @param string 查询语句
	 * @return int 查询编号
	 */
	Function query($str) {
		if ( $str == '' ) Return False;

		if ( !$this->connect() ) Return False;

	  /*------- 新查询，释放前次的查询结果 -------*/
		if ( $this->QueryID ) {
			$this->free();
		}
		
		$str = varResume($str);	// 恢复被过滤的变数,还原真实的值
		
		$this->QueryStr = $str;

		$debugMsg = c("调试: 语句");
		if ( $this->Debug ) printf($debugMsg." = %s<br>\n", $this->QueryStr);

		$this->QueryID = @mysql_query($this->QueryStr, $this->LinkID);
		$this->Row   = 0;
		if ( !$this->QueryID ) {
			$this->halt("错误查询:".autoCharSet($this->QueryStr, CFG_CHAR_SET, CFG_TEMPLATE_LANGUAGE));
			Return False;
		} else {
			Return $this->QueryID;
		}
	}
	/**
	 * 获得查询结果
	 *
	 * @return bool True 有查询结果，False 无查询结果
	 */
	Function nextRecord() {
		if ( !$this->QueryID ) {
			$this->halt('执行错误：查询无效！');
			Return False;
		}

		$this->record = @mysql_fetch_array($this->QueryID);
        if ("" != $this->record){
			foreach($this->record as $key => $val) { 
				$this->record[$key] = $val; // 自动对 资料 语言格式进行转换
			}
			$this->record = varFilter($this->record);	// 取出的值进行安全过滤
		}

		$this->Row += 1;
		
		$stat = is_array($this->record);

		if ( !$stat && $this->AutoFree ) {
			$this->free();
		}
		Return $stat;
	}
	/**
	 * 获得新增记录的ID
	 *
	 * @return int 或 False，int 为编号，False 为新增失败
	 */
	Function insertId(){
		if( $result = mysql_insert_id($this->LinkID) ) {
			Return $result;
		} else {
			Return False;
		}
	}
	/**
	 * insert 缩略方法
	 *
	 * @param string 表名
	 * @param string 字段列表
	 * @param string 值列表
	 * @return bool True insert 成功，False insert 失败
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
	 * replace 缩略方法
	 *
	 * @param string 表名
	 * @param string 字段列表
	 * @param string 值列表
	 * @return bool True replace 成功，False replace 失败
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
	 * select 缩略方法
	 *
	 * @param string 表名
	 * @param string 字段列表
	 * @param string 表件
	 * @param string 排序
	 * @param string $limit
	 * @return bool True select 成功，False select 失败
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
	 * update 缩略方法
	 *
	 * @param string 表名
	 * @param string 字段和更新值的列表
	 * @param string 条件
	 * @return bool True update 成功，False update 失败
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
	 * delete 缩略方法
	 *
	 * @param string 表名
	 * @param string 条件
	 * @return bool True delete 成功，False delete 失败
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
	 * 查询并立即返回一条记录结果
	 *
	 * @param string 查询语句
	 * @return bool True 查询并返回结果成功，False 查询并返回结果失败
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
	 * 查询并立即返回最大 limitLine 数量的记录，为防止结果集过大，limit 的值由独立参数指定，sql 语句中请勿带 limit 子句，默认30笔
	 *
	 * @param string 查询语句
	 * @param int limit 起始位置
	 * @param int 结果集笔数
	 * 
	 * @return array 或 bool 查询成功以数组格式返回结果，False 查询失败
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
	 * count结果缩略方法
	 *
	 * @param string 表名
	 * @param string 字段
	 * @param string 条件
	 * @return bool True count 成功，False count 失败
	 */
	Function count($table, $field="*", $condition="") {
		if ( $condition != "" ) $strC=" where ".$condition;
		$str = "select count(".$field.") from ".$table.$strC;
		$this->query($str);
		$this->nextRecord();
		Return $this->record[0];
	}
	/**
	 * 获取并返回一行新的查询结果
	 *
	 * @return array 或 False ,array 为返回的查询结果集，False为无新查询结果
	 */
	Function nextData() {
		if ( $this->nextRecord() ) {
			Return $this->record;
		}else{
			Return False;
		}
	}
	/**
	 * 获得SQL语句执行后受影响的行数
	 *
	 * @return int
	 */
	Function affectedRows() {
		Return @mysql_affected_rows($this->LinkID);
	}
	/**
	 * 获得SQL查询语句执行后满足条件的记录行数
	 *
	 * @return int
	 */
	Function numRows() {
		Return @mysql_num_rows($this->QueryID);
	}
	/**
	 * 表的字段数
	 *
	 * @return int
	 */
	Function numFields() {
		Return @mysql_num_fields($this->QueryID);
	}
	/**
	 * numRows的缩略方法
	 *
	 * @return int
	 */
	Function nr() {
		Return $this->numRows();
	}
	/**
	 * 获取查询结果行的某个字段值
	 *
	 * @param string 字段名称
	 * @return string 字段的值
	 */
	Function r($name) {
		if ( isset($this->record[$name]) ) {
			Return $this->record[$name];
		}
	}
	/**
	 * 错误处理
	 *
	 * @param string 错误信息
	 */
	Function halt($msg) {
		$this->Error = autoCharSet(@mysql_error($this->LinkID), CFG_CHAR_SET, CFG_TEMPLATE_LANGUAGE);
		$this->Errno = @mysql_errno($this->LinkID);
		if ( $this->HaltOnError == 'no' ) Return;

		$this->haltmsg($msg);
		if ( $this->HaltOnError != 'report' ) halt(' 系统资料库发生错误，当前操作已被中止。');
	}

	/**
	 * 详细输出错误信息
	 *
	 * @param string 错误信息
	 */
	Function haltmsg($msg) {
		if ( 'mail' == $this->ReportError ) { // 寄Mail給管理員
			$mailTitle = " 資料庫出現錯誤！";
			$mailMessage = "在 ".$this->Company." 上的資料庫發生錯誤: $msg\n";
			$mailMessage.= "MySQL 報告的錯誤是(MySQL return error message): ".$this->Error."\n";
			$mailMessage.= "MySQL 返回的錯誤號碼是(Error number): ".$this->Errno."\n";
			$mailMessage.= "出錯時間(date): ".date("Y-m-d l H:i:s")."\n";
			$mailMessage.= "出錯的地址(url): http://".getenv("HTTP_HOST").getenv("REQUEST_URI")."\n";
			$mailMessage.= "前一個地址是(referer url): ".getenv("HTTP_REFERER")."\n";

			@mail ($this->AdminMail, $this->Company."-".getenv("HTTP_HOST").$mailTitle,$mailMessage);

			$message .="<p>資料庫大概發生了輕微的錯誤，請稍候再重整嘗試一下。</p>";
			$message .= "<p>本系統已經將此錯誤通過E-Mail發送給了 ".$this->Company." 的<a href=\"mailto:".$this->AdminMail."\">工程師</a>， 如果問題依然，您也可以直接聯絡他。</p>";
			$message .= "<p>我们为本次错误深表歉意，同时感谢您的支持！</p>";
		} elseif ( 'report' == $this->ReportError ) { // 直接顯示詳細錯誤
			$message  = "</td></tr></table><b>Database error:</b> ".$msg."<br>\n";
			$message .= "<b>MySQL Error</b>: ".$this->Errno." (".$this->Error.")<br>\n";
		} elseif ( 'log' == $this->ReportError ) { // 記錄日志
			$message  = '-----------------------------------------------------------<br>';
			$message  .= 'Date：'.date('Y-m-d H:i:s').'<br>';	
			$message  .= 'Url： http://'.getenv('HTTP_HOST').getenv('REQUEST_URI').'<br>';
			$message  .= 'Referer Url：'.getenv("HTTP_REFERER").'<br>';
			$message  .= 'Error SQL：'.$msg.'<br>';
			$message  .= 'MySQL Error：'.$this->Errno.'('.$this->Error.')<br>';
			fileWrite($this->LogPath,$message,'a');
			$message ="<p>資料庫大概發生了輕微的錯誤，請稍候再重整嘗試一下。";
			$message .= "<p>本系統已經將此錯誤進行了記錄，我们为本次错误深表歉意，同时感谢您的支持！</p>";
		} else {
			$message ="<p>資料庫大概發生了輕微的錯誤，請稍候再重整嘗試一下。";
			$message .= "<p>我们为本次错误深表歉意，同时感谢您的支持！</p>";
		}
		echo autoCharSet($message);
	}
}
?>
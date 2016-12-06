<?php

class DB {

    private $db;

    /*
     * 链接数据库
     */

    function DB($host, $port, $user, $pass, $table, $key) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->table = $table;
        $this->port = $port;
        $this->key = $key;
        $this->db = mysql_connect($this->host . ':' . $this->port, $this->user, $this->pass) or die("Could not connect: " . mysql_error());
        mysql_select_db($this->table, $this->db);
        mysql_query("SET NAMES UTF8", $this->db);
    }

    /*
     * 执行SQL语句
     */

    function execute($sql_str) {
        $res = mysql_query($sql_str, $this->db);
        if ($this->key) {
            echo $sql_str."<hr>";
        }
        return $res;
    }

    /*
     *  取得前一次 MySQL 操作所[insert delete update]影响的记录行数
     */

    function getAffRow() {
        return mysql_affected_rows();
    }

    /*
     * 获取上一步 INSERT 操作产生的 ID 
     */

    function getInsertId() {
        return mysql_insert_id();
    }

    /**
     * 运行错误
     * @return type
     */
    function ErrorMsg() {
        return mysql_errno();
    }

    /*
     * 返回单个数据
     */

    function getOne($sql_str) {
        $res = $this->execute($sql_str);
        $tmp = array();
        $tmp = mysql_fetch_row($res);
        return $tmp['0'];
    }

    /*
     * 返回一组数据
     */

    function getRow($sql_str) {
        $res = $this->execute($sql_str);
        if($res) return mysql_fetch_array($res, MYSQL_ASSOC);
        else return array();
    }

    function fetchArray($res) {
        return mysql_fetch_array($res, MYSQL_ASSOC);
    }

    /*
     * 返回全部数组
     */

    function getAll($sql_str) {
        $array = array();
        $i = 0;
        $res = $this->execute($sql_str);
        while ($data = mysql_fetch_array($res, MYSQL_ASSOC)) {
            foreach ($data as $key => $val) {
                $array[$i][$key] = $val;
            }
            $i++;
        }
        return $array;
    }

    //只有INNODB和BDB类型的数据表才能支持事务处理
    /*
     * 关闭数据库
     */
    function close() {
        mysql_close($this->db);
    }

    /*
     * 显示页数 返回一维数组
     */

    function &SelectLimit($sql_str, $nrows = -1, $offset = -1) {
        $offsetStr = ($offset >= 0) ? intval($offset) . "," : '';
        if ($nrows < 0)
            $nrows = '18446744073709551615';
        $sql = $sql_str . " LIMIT $offsetStr " . $nrows;
        $re = & $this->execute($sql);
        return $re;
    }

    /**
     * 事务开始
     */
    function begin() {
        $re = $this->execute("begin");
        if ($re) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 确认执行,并结束事务
     * @return boolean
     */
    function commit() {
        $re = $this->execute("commit");
        if ($re) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 执行失败，恢复初始
     * @return boolean
     */
    function recall() {
        $re = $this->execute("rollback");
        if ($re) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
<?php

class Admin_Public extends Cortrol {

    public function _construct() {
        setUTF8Header();
        header("Access-Control-Allow-Origin:*");
    }

    Function Admin_Public() {
        session_start();
        $this->Cortrol();
        $moduleAction = ACTION_PREFIX . ucfirst(ACTION_NAME);
        $this->$moduleAction();
        return;
    }

    /**
     * 验证是否登录
     */
    Function publicCheckLogin() {
        if (empty($_SESSION['user']['strAdminPass'])) {
            goBack('', 'top|/admin.php?module=index&action=login');
        }
    }

    /**
     * 创建数据库连接
     */
    Function getConnect(){
        try {
            $pdo = new PDO('mysql:host=120.27.103.38;dbname=wdsq','xwsd','xwsdliu2016');
            $pdo->query('set names utf8');
                
        } catch (PDOException $e) {
            $e->getMessage();
        }
          return $pdo;
    }



}

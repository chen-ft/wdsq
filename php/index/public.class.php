<?php

class Home_Public extends Cortrol {

    Function Home_Public() {
        session_start();
        $this->Cortrol();
        $moduleAction = ACTION_PREFIX . ucfirst(ACTION_NAME);
        //$this->$moduleAction();
        return;
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
  

    /**
     * 验证是否登录
     */
    Function publicCheckLogin() {
        if (empty($_SESSION['login']['strPass'])) {
            //goBack('亲，请登录帐号', 'top|/admin.php?module=index&action=login');

            goBack('', 'top|/index.php?module=index&action=login');
        }
        //$this->getWebPriv();
    }





}

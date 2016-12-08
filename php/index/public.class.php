<?php

class Home_Public extends Cortrol {

    public function _construct() {
        setUTF8Header();
        header("Access-Control-Allow-Origin:*");
    }

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

    Function showSetXml($cmd, $arrData, $adviceURL = 'http://www.xwsdvip.com/adviceurl.php') {
        //header('Content-type: text/xml;charset=utf-8');
        $token = $_SESSION['user']['strToken'];
        $strOperation = $_SESSION['user']['strOperationId'];
        $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
        $arrData = $arrData;
        $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
        return $strXml;
    }

    Function setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData) {
        $array['cmd'] = $cmd;
        $array['strOfficeNum'] = API_OFFICE;
        $array['strOperation'] = $strOperation;
        $array['strTradeNo'] = $strTradeNo;
        $array['adviceURL'] = $adviceURL;  //异步反馈
        $array['arrData'] = $arrData;
        $strHeader = $array['cmd'] . $array['strOfficeNum'] . $array['strOperation'] . $array['strTradeNo'] . $array['adviceURL'];
        if (isset($array['arrData'])) {
            foreach ($array['arrData'] as $value) {
                if ("" != trim($value)) {
                    $strHeader .= $value;
                }
            }
        }
        $array['arrData']['secureCode'] = md5($strHeader . $token);
        return arrayToXml($array);
    }

}

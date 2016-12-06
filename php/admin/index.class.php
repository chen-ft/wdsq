<?php

class Index extends Admin_Public {

    var $key = 0;

    Function __toString() {
        return "后台管理基类";
    }

    Function showIndex() {
        $this->publicCheckLogin();
        $this->display();
    }

    //用户登录
    Function showLogin() {
        $this->display();
    }

    Function doLogin() {
        //第一步：验证验证码
        if ($_SESSION['code'] != strtolower($_POST['checkCode'])) {
            goBack('验证码错误', '');
        }
        //第二步：验证账号       
        $cmd = 'cmdBranchUserLogin';
        $token = API_TOKEN;
        $strOperation = API_ID;
        $strTradeNo = '132ss23432aa12334233';
        $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
        $arrData = $_POST['info'];
        $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
        $strJson = CurlPost(API_HOST, $strXml);
        $arrReturn = json_decode($strJson, TRUE);
        if ('0000' != $arrReturn['ret']) {
            goBack('账号密码错误', '/admin.php?module=index&action=login');
        }
        //第三步：登录成功，存储信息
        $_SESSION['user'] = $arrReturn['data']['content'];
        goBack('登录成功', '/admin.php');
    }

    function showLogout() {
        unset($_SESSION['user']);
        goBack('登出成功', '/admin.php?module=index&action=login');
    }

}

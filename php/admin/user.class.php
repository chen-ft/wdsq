<?php

/* 登录登出操作 */

class User extends Admin_Public {

    var $key = 0;

    Function showIndex() {
        $this->publicCheckLogin();
        $this->display();
    }

    Function showEdit() {
        $this->publicCheckLogin();
        $this->display();
    }

    /**
     * 编辑客户资料
     */
    Function doEditUserInfo() {
        $this->publicCheckLogin();
        $cmd = 'cmdUserInfoEdit';
        $token = $_SESSION['user']['strToken'];
        $strOperation = $_SESSION['user']['strOperationId'];
        $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
        $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
        if (!empty($_POST['userInfo'])) {
            $arrData = arrayDelNull($_POST['userInfo']);
        }
        $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
        $strJson = CurlPost(API_HOST, $strXml);
        $arrReturn = json_decode($strJson, TRUE);
        if ('0000' == $arrReturn['ret']) {
            goBack('保存成功', '/admin.php?module=user&action=edit&strUserId=' . $_POST['userInfo']['strUserId']);
        } else {
            print_r($arrReturn);
        }
    }
    /**
     * 编辑联系人
     */
    function doEditLink() {
        $this->publicCheckLogin();
        if (!empty($_POST['userLink1'])) {
            $cmd = 'cmdUserLinkEdit';
            $token = $_SESSION['user']['strToken'];
            $strOperation = $_SESSION['user']['strOperationId'];
            $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
            $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
            $arrData = arrayDelNull($_POST['userLink1']);
            $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
            $strJson1 = CurlPost(API_HOST, $strXml);

            $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
            $arrData = arrayDelNull($_POST['userLink2']);
            $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
            $strJson2 = CurlPost(API_HOST, $strXml);

            $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
            $arrData = arrayDelNull($_POST['userLink3']);
            $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
            $strJson3 = CurlPost(API_HOST, $strXml);

            $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
            $arrData = arrayDelNull($_POST['userLink4']);
            $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
            $strJson4 = CurlPost(API_HOST, $strXml);
        }
        //exit($strJson1.$strJson2.$strJson3.$strJson4);
        goBack('保存成功', '/admin.php?module=user&action=edit&strUserId=' . $_POST['userLink1']['strUserId']);
    }

    /**
     * 编辑公司信息
     */
    function doEditOffice() {
        $this->publicCheckLogin();
        if (!empty($_POST['userOffice'])) {
            $cmd = 'cmdUserOfficeEdit';
            $token = $_SESSION['user']['strToken'];
            $strOperation = $_SESSION['user']['strOperationId'];
            $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
            $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
            $arrData = arrayDelNull($_POST['userOffice']);
            $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
            $strJson = CurlPost(API_HOST, $strXml);
            $arrReturn = json_decode($strJson, TRUE);
            if ('0000' == $arrReturn['ret']) {
                goBack('保存成功', '/admin.php?module=user&action=edit&strUserId=' . $_POST['userOffice']['strUserId']);
            } else {
                print_r($arrReturn);
            }
        }
    }
}

<?php

/* 审批操作 */

class Ajax extends Admin_Public {

    var $key = 0;

    Function showUpdatFile() {
        $url = 'http://asset.xwsd.com/xfjr.php';
        $data['name'] = $_FILES['file']['name'];
        $data['type'] = $_FILES['file']['type'];
        $data['file'] = '@' . $_FILES['file']['tmp_name'];
        $data['error'] = $_FILES['file']['error'];
        $data['size'] = $_FILES['file']['size'];
        $return = CurlPostWeb(CFG_FILE_WEB, $data);
        $i=10;
        $arr = json_decode($return,true);
        echo json_encode([ 'initialPreview' => [ "<img src='".$arr[max]."'style='height:160px' alt='未找到图片' title='图片'>", ], 'initialPreviewConfig' => [ ['caption' => "example.jpg", 'width' => '120px', 'url' => '/admin.php?module=ajax&action=deleteFile', 'key' => $i], ], 'append' => true ]);
        $i++;
    }
    /**
    * 上传申请表到数据库
    */
    Function showTablePic() {
        if(!empty($_POST['table'])){

           //第一步：验证是否登录
           $this->publicCheckLogin();
           //第二步：验证账号  
     //---!      $cmd = '';   
           $token = $_SESSION['user']['strToken'];
           $strOperation = $_SESSION['user']['strOperationId'];
           $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
           $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
           $arrData['strUserId'] = $_GET['strUserId'];
    //--!        $arrData['strKey'] = '';   
           $arrData['strValue'] = stripslashes(json_encode($_POST['table']));
           $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
           $strJson = CurlPost(API_HOST, $strXml);
           echo $strJson;
       }

    }
     /**
    * 上传身份证图片到数据库
    */
    Function showIcardPic() {
      var_dump($_SESSION);
        if(!empty($_POST['icard'])){

           //第一步：验证是否登录
           $this->publicCheckLogin();
           //第二步：验证账号  
           $cmd = 'cmdImgIcardEdit';
           $token = $_SESSION['user']['strToken'];
           $strOperation = $_SESSION['user']['strOperationId'];
           $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
           $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
           $arrData['strUserId'] = $_GET['strUserId'];
           $arrData['strKey'] = 'strIcardJson';
           $arrData['strValue'] = stripslashes(json_encode($_POST['icard']));
           $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
           $strJson = CurlPost(API_HOST, $strXml);
           echo $strJson;
       }

    }
    /**
    * 上传网查资料图片到数据库
    */
    Function showNetPic() {
        if(!empty($_POST['network'])){   

           //第一步：验证是否登录
           $this->publicCheckLogin();
           //第二步：验证账号  
           $cmd = 'cmdImgNetworkEdit';   
           $token = $_SESSION['user']['strToken'];
           $strOperation = $_SESSION['user']['strOperationId'];
           $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
           $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
           $arrData['strUserId'] = $_GET['strUserId'];
           $arrData['strKey'] = 'strNetworkJson';   
           $arrData['strValue'] = stripslashes(json_encode($_POST['network'])); 
           $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
           $strJson = CurlPost(API_HOST, $strXml);
           echo $strJson;
       }

    }
    /**
    * 上传银行卡图片到数据库
    */
    Function showBankPic() {
        if(!empty($_POST['card'])){   

           //第一步：验证是否登录
           $this->publicCheckLogin();
           //第二步：验证账号  
           $cmd = 'cmdImgBankEdit';   
           $token = $_SESSION['user']['strToken'];
           $strOperation = $_SESSION['user']['strOperationId'];
           $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
           $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
           $arrData['strUserId'] = $_GET['strUserId'];
           $arrData['strKey'] = 'strBankJson';   
           $arrData['strValue'] = stripslashes(json_encode($_POST['card'])); 
           $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
           $strJson = CurlPost(API_HOST, $strXml);
           echo $strJson;
       }

    }
    /**
    * 上传社保公积金图片到数据库
    */
    Function showSocialPic() {
        if(!empty($_POST['social'])){   

           //第一步：验证是否登录
           $this->publicCheckLogin();
           //第二步：验证账号  
           $cmd = 'cmdImgSocialEdit';   
           $token = $_SESSION['user']['strToken'];
           $strOperation = $_SESSION['user']['strOperationId'];
           $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
           $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
           $arrData['strUserId'] = $_GET['strUserId'];
           $arrData['strKey'] = 'strSocialJson';   
           $arrData['strValue'] = stripslashes(json_encode($_POST['social'])); 
           $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
           $strJson = CurlPost(API_HOST, $strXml);
           echo $strJson;
       }

    }
    /**
    * 上传寿险保单图片到数据库
    */
    Function showSafePic() {
        if(!empty($_POST['insurance'])){   

           //第一步：验证是否登录
           $this->publicCheckLogin();
           //第二步：验证账号  
           $cmd = 'cmdImgSafeEdit';   
           $token = $_SESSION['user']['strToken'];
           $strOperation = $_SESSION['user']['strOperationId'];
           $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
           $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
           $arrData['strUserId'] = $_GET['strUserId'];
           $arrData['strKey'] = 'strSafeJson';   
           $arrData['strValue'] = stripslashes(json_encode($_POST['insurance'])); 
           $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
           $strJson = CurlPost(API_HOST, $strXml);
           echo $strJson;
       }

    }

    /**
    * 上传其他图片到数据库
    */
    Function showOtherPic() {
        if(!empty($_POST['other'])){   

           //第一步：验证是否登录
           $this->publicCheckLogin();
           //第二步：验证账号  
           $cmd = 'cmdImgOtherEdit';   
           $token = $_SESSION['user']['strToken'];
           $strOperation = $_SESSION['user']['strOperationId'];
           $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
           $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
           $arrData['strUserId'] = $_GET['strUserId'];
           $arrData['strKey'] = 'strOtherJson';   
           $arrData['strValue'] = stripslashes(json_encode($_POST['other'])); 
           $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
           $strJson = CurlPost(API_HOST, $strXml);
           echo $strJson;
       }

    }
    /**
    * 预览图片中的删除按钮url(没用,但必须有)
    */
    Function showDeleteFile(){
        echo $_POST['key'];
    }

    /**
    * 验证登陆
    */
    Function showUserAdd() {
        //第一步：验证是否登录
        $this->publicCheckLogin();
        //第二步：验证账号       
        $cmd = 'cmdUserReg';
        $token = $_SESSION['user']['strToken'];
        $strOperation = $_SESSION['user']['strOperationId'];
        $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
        $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
        $arrData['strPhone'] = $_POST['info']['0']['value'];
        $arrData['strPass'] = $_POST['info']['1']['value'];
        $arrData['strCode'] = $_POST['info']['2']['value'];
        $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
        $strJson = CurlPost(API_HOST, $strXml);
        echo $strJson;
    }

    Function showCodeGet() {
        if (!empty($_POST['phone'])) {
            //第一步：验证是否登录
            $this->publicCheckLogin();
            //第二步：验证账号       
            $cmd = 'cmdGetSmsCode';
            $token = $_SESSION['user']['strToken'];
            $strOperation = $_SESSION['user']['strOperationId'];
            $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
            $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
            $arrData['strPhone'] = $_POST['phone'];
            $arrData['strSmsType'] = '验证';
            $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
            $strJson = CurlPost(API_HOST, $strXml);
            echo $strJson;
        }
    }

    /**
     * 待处理任务
     */
    Function showIndex() {
        //第一步：验证是否登录
        $this->publicCheckLogin();
        //第二步：验证账号       
        $cmd = 'cmdLoanGetWork';
        $token = $_SESSION['user']['strToken'];
        $strOperation = $_SESSION['user']['strOperationId'];
        $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
        $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
        $arrData = ['enType' => '0'];
        $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
        $strJson = CurlPost(API_HOST, $strXml);
        $arrReturn = json_decode($strJson, TRUE);
        if ('0000' == $arrReturn['ret']) {
            $this->Tmpl['data'] = $arrReturn['data']['content'];
        } else {
            $this->Tmpl['data'] = array();
        }
        $this->display();
    }

    /**
     * 已处理
     */
    Function showFinish() {
        //第一步：验证是否登录
        $this->publicCheckLogin();
        //第二步：验证账号       
        $cmd = 'cmdLoanGetWork';
        $token = $_SESSION['user']['strToken'];
        $strOperation = $_SESSION['user']['strOperationId'];
        $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
        $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
        $arrData = ['enType' => '1'];
        $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
        $strJson = CurlPost(API_HOST, $strXml);
        $arrReturn = json_decode($strJson, TRUE);
        if ('0000' == $arrReturn['ret']) {
            $this->Tmpl['data'] = $arrReturn['data']['content'];
        } else {
            $this->Tmpl['data'] = array();
        }
        $this->display();
    }

    /**
     * 已拒绝
     */
    Function showRefuse() {
        //第一步：验证是否登录
        $this->publicCheckLogin();
        //第二步：验证账号       
        $cmd = 'cmdLoanGetWork';
        $token = $_SESSION['user']['strToken'];
        $strOperation = $_SESSION['user']['strOperationId'];
        $strTradeNo = 'work_' . md5(microtime()) . rand(100000, 999999);
        $adviceURL = 'http://www.xwsdvip.com/adviceurl.php';
        $arrData = ['enType' => '-1'];
        $strXml = $this->setPostXml($cmd, $token, $strOperation, $strTradeNo, $adviceURL, $arrData);
        $strJson = CurlPost(API_HOST, $strXml);
        $arrReturn = json_decode($strJson, TRUE);
        if ('0000' == $arrReturn['ret']) {
            $this->Tmpl['data'] = $arrReturn['data']['content'];
        } else {
            $this->Tmpl['data'] = array();
        }
        $this->display();
    }

    /**
     * 处理审批
     */
    Function showHandle() {
        $this->publicCheckLogin();
        //第一步：获取借款人信息
        $cmd = 'cmdUserInfoAllGet';
        $arrData = ['strUserId' => $_GET['strUserId']];
        $strXml = $this->showSetXml($cmd, $arrData, $adviceURL = 'http://www.xwsdvip.com/adviceurl.php');
        $strJson = CurlPost(API_HOST, $strXml);
        $arrReturn = json_decode($strJson, TRUE);
        if ('0000' == $arrReturn['ret']) {
            $arrUser = $arrReturn;
        } else {
            $arrUser = $arrReturn;
        }
        echo json_encode($arrUser);
    }

    /**
     * 获取评论列表
     */
    Function showVerifyList() {
        $this->publicCheckLogin();
        //第一步：获取借款人信息
        $cmd = 'cmdLoanVerifyList';
        $arrData = ['strWorkNum' => $_GET['strWorkNum']];
        $strXml = $this->showSetXml($cmd, $arrData, $adviceURL = 'http://www.xwsdvip.com/adviceurl.php');
        $strJson = CurlPost(API_HOST, $strXml);
        $arrReturn = json_decode($strJson, TRUE);
        if ('0000' == $arrReturn['ret']) {
            $arrUser = $arrReturn;
        } else {
            $arrUser = array();
        }
        echo json_encode($arrUser);
    }

    Function showWorkList() {
        //第一步：验证是否登录
        $this->publicCheckLogin();
        //第二步：验证账号       
        $cmd = 'cmdLoanGetWork';
        $arrData = ['enType' => '0'];
        $strXml = $this->showSetXml($cmd, $arrData, $adviceURL = 'http://www.xwsdvip.com/adviceurl.php');
        $strJson = CurlPost(API_HOST, $strXml);
        $arrReturn = json_decode($strJson, TRUE);
        if ('0000' == $arrReturn['ret']) {
            $arrUser = $arrReturn;
        } else {
            $arrUser = array();
        }
        echo json_encode($arrUser);
    }

    function showUserList() {
        //第一步：验证是否登录
        $this->publicCheckLogin();
        //第二步：验证账号       
        $cmd = 'cmdUserSearchData';
        //$arrData['userinfo.strUserId'] = '201611110000001';
        $arrData['page'] = '1';
        $strXml = $this->showSetXml($cmd, $arrData, $adviceURL = 'http://www.xwsdvip.com/adviceurl.php');
        $strJson = CurlPost(API_HOST, $strXml);
        $arrReturn = json_decode($strJson, TRUE);
        if ('0000' == $arrReturn['ret']) {
            $arrUser = $arrReturn;
        } else {
            $arrUser = array();
        }
        echo json_encode($arrUser);
    }

}

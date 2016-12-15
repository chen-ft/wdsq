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
        $pdo = $this->getConnect();
        $sql = "SELECT * from wd_admin where strAdminUser='".$_POST['info']['strOperation']."' && strAdminPass=".$_POST['info']['strPass'];
        $rs = $pdo->prepare($sql);
        $rs->execute();
        $row = $rs->fetch(PDO::FETCH_ASSOC);
        if (empty($row)) {
           goBack('账号密码错误', '/admin.php?module=index&action=login');
        }
      
        //第三步：登录成功，存储信息
        $_SESSION['user'] = $row;
        goBack('登录成功', '/admin.php');
    }

    function showLogout() {
        unset($_SESSION['user']);
        goBack('登出成功', '/admin.php?module=index&action=login');
    }

}

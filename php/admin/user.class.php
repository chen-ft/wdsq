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

    Function showUser() {
        $this->publicCheckLogin();
        $this->display();
    }



}

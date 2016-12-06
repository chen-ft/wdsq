<?php

/* 审批操作 */

class Work extends Admin_Public {

    var $key = 0;

    /**
     * 待处理页面
     */
    Function showIndex() {
        $this->publicCheckLogin();
        $this->display();
    }
    /**
     * 处理审批
     */
    Function showHandle() {
        $this->publicCheckLogin();
        $this->display();
    }
}

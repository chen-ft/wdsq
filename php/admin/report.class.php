<?php

/* 审批操作 */

class Report extends Admin_Public {

    var $key = 0;

    /**
     * 待处理页面
     */
    Function showReport() {
        $this->publicCheckLogin();
        $this->display();
    }
    /**
     * 处理审批
     */
    Function showDeal() {
        $this->publicCheckLogin();
        $this->display();
    }
}

<?php

class Index  extends Home_Public
{

    var $key = 0;

    Function __toString() 
    {
        return "前台管理基类";
    }

    Function showIndex() 
    {
        $this->display();
    }
    Function showLogin(){

        $this->display();
    }

    Function showAnswer() 
    {
         $this->publicCheckLogin();
        $this->display();
    }
    Function showHot() 
    {
        $this->publicCheckLogin();
        $this->display();
    }
    Function showInvite() 
    {
        $this->publicCheckLogin();
        $this->display();
    }
    Function showTopic() 
    {
        $this->publicCheckLogin();
        $this->display();
    }
    Function showQuestion() 
    {
        $this->publicCheckLogin();
        $this->display();
    }
    Function showTest(){
        $this->display();
    }

}

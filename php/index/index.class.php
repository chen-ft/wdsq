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
    Function showAnswer() 
    {
      
        $this->display();
    }
    Function showHot() 
    {
      
        $this->display();
    }
    Function showInvite() 
    {
      
        $this->display();
    }
    Function showTopic() 
    {

        $this->display();
    }
    Function showQuestion() 
    {
        
        $this->display();
    }

}

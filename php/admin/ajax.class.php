<?php

class Ajax extends Admin_Public {

    var $key = 0;


    Function showQuestionList(){

          $sql = 'SELECT q.tpId,qsCreateTime,t.tpName,q.qsId,q.qsTitle,u.strUserId,u.strName FROM wd_question AS q  LEFT JOIN wd_topic AS t ON q.tpId = t.tpId LEFT JOIN wd_user AS u ON q.strUserId = u.strUserId';
          $array = $this->myFetchAll($sql);
          echo json_encode($array);
    }

    Function showEditLoadQuestion(){

      $dataId = $_POST['id'];

      $sql = "SELECT tpName,q.tpId,qsId,qsTitle,qsContent,qsCreateTime FROM wd_question AS q LEFT JOIN wd_topic AS t ON q.tpId = t.tpId WHERE qsId=".$dataId;
      $array = $this->myFetchAll($sql);

      $ansArr = $this->myFetchAll("SELECT a.strUserId,u.strName,a.strAnsId,strAnsContent,strAnsAgree,strAnsAttentions,strAnsComment FROM wd_answer AS a INNER JOIN wd_user AS u ON a.strUserId = u.strUserId WHERE a.strQsId=".$dataId);

      $array['questions'] = $ansArr;
      echo json_encode($array);

    }

    Function showDelQuestion(){

      $pdo = $this->getConnect();
      $sql = "delete FROM wd_question WHERE qsId = ".$_POST['id'];
      $rs = $pdo->prepare($sql);
      if($rs->execute()){
        echo json_encode('0000');
      }

    }

    //删除问题评论
    Function showDelComment(){
      $pdo = $this->getConnect();
      $sql = "delete FROM wd_answer WHERE strAnsId = ".$_POST['id'];
      $rs = $pdo->prepare($sql);
      if($rs->execute()){
        echo json_encode('0000');
      }
    }

    //举报内容
    Function showReportList(){
      $sql = "SELECT strQsId,strReason,tCreateTime,qsTitle FROM wd_report AS r LEFT JOIN wd_question AS q ON r.strQsId = q.qsId ";
      $row = $this->myFetchAll($sql);
      $_SESSION['report']['num'] = count($row);
      echo json_encode($row);
    }
    
    //获取话题数
    Function showGetTopics(){
      $pdo = $this->getConnect();
      $sql = "SELECT tpId FROM wd_topic";
      $rowTc = $this->myFetchAll($sql);

      //随机数组
      $a=array("#f56954","#00a65a","#f39c12","#00c0ef","#3c8dbc","#d2d6de","#FFEED8","#33338C");
      foreach ($rowTc as $key => $value) {
        $sql = "SELECT count(strType) AS value,tpName as label FROM wd_focus AS f LEFT JOIN wd_topic AS t ON f.strFcId=t.tpId  WHERE strFcId = ".$value['tpId']." AND strType = 'topic'";
        $rs = $pdo->prepare($sql);
        $rs->execute();
        $info = $rs->fetch(PDO::FETCH_ASSOC);
        $info['color'] = $a[$key = ($key>16) ? ($key-16):(abs(7-$key))];
        $array[] = $info;
       
      }
      echo json_encode($array);


    }






   /**
   * 方法封装
   */
    Function myFetchAll($sql){
      $pdo = $this->getConnect();
      $rs = $pdo->prepare($sql);
      $rs->execute();
        $array = [];
      while ( $row = $rs->fetchAll(PDO::FETCH_ASSOC)) {
        $array  = $row;
      }
      return $array;
    }

    Function myFetchOne($sql){
      $pdo = $this->getConnect();
      $rs = $pdo->prepare($sql);
      $rs->execute();
      $info = $rs->fetch(PDO::FETCH_ASSOC);
      return $info;
    }

    /**
    * 多条件拼接,二维数组
    */
    Function getWhere($arr,$condition,$key){
        $string = '';
        for ($i=0; $i < count($arr); $i++) { 
            if ($i == 0) {
                $string .= $arr[$i][$key];
            }else{
                $string .= " || ".$condition." = ".$arr[$i][$key];
            }
        }
        $where = "WHERE ".$condition." = ".$string;
        return $where;
    }


}
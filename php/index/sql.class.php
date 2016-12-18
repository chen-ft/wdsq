<?php
/**
* 读取数据库
*/
class Sql extends Home_Public
{
	var $key = 0;

	Function __toString(){
		return "数据库连接基类";
	}

	Function showPublish(){
		if ($_POST['title']) {
			//连接数据库
			$pdo = $this->getConnect();
			// 获取数据
			$title   = "'".$_POST['title']."'";
			$content = "'".htmlspecialchars_decode($_POST['content'])."'";
			$topic   = $_POST['topic'];
			$num     = $this->getLastId('qsId','wd_question');
			$userId  = $_SESSION['login']['strUserId'];
			$sql = "insert into wd_question(qsId,tpId,strUserId,qsTitle,qsContent,qsCreateTime) values($num,$topic[0],$userId,$title,$content,CURDATE())";
			$rs = $pdo->prepare($sql);
			if ($rs->execute()) {
				echo json_encode('0000');
			}else{	
				echo json_encode('1111');
			}


		}
	}

	Function showTopic(){
		//连接数据库
		$search = $_GET['q'];
		$pdo = $this->getConnect();
		$sql = "select tpId,tpName from wd_topic where tpName like '%".$search."%' limit 6";
		$rs  = $pdo->prepare($sql);
		$rs->execute();
		$arr = [];
		while ($row = $rs->fetchAll(PDO::FETCH_ASSOC)) {
			$arr = $row;
		}
		echo json_encode($arr);
	}

	Function showTest(){
		$results = [];
        $input   = $_GET['q'];
        if ($input == 123) {
            $results[] = array("id"=>"1","tpName"=>"benz");
           
        }
         $results[] = array("id"=>"2","tpName"=>"bmw");
         $results[] = array("id"=>"2","tpName"=>"audi");


         echo json_encode(array('results' => $results));
    }

    Function showLoadData(){

		$page= $_POST['page']*10;
		$sql = 'SELECT q.tpId,t.tpName,q.qsId,a.strAnsAgree,q.qsTitle,u.strUserId,
               u.strName,u.strDetail,a.strAnsContent,a.strAnsId,a.strAnsComment,
               a.strAnsImg,a.strAnsAttentions  FROM wd_question AS q LEFT JOIN 
               (select * from wd_answer ORDER BY strAnsAgree desc) AS a ON q.qsId = a.strQsId LEFT JOIN 
                wd_topic AS t ON q.tpId = t.tpId LEFT JOIN 
                wd_user AS u ON a.strUserId = u.strUserId 
				GROUP BY q.qsId';

		$limit = ' limit 0,'.$page;
        $array = $this->myFetchAll($sql.$limit);
	   	foreach ($array as $key => $value) {
	   		$text = strip_tags($value['strAnsContent']);
	   		$array[$key]['shutAnsContent'] = mb_substr($text,'0','120','utf-8').'...'; 
	   	}
 
	   	$dataJson = json_encode($array);
	   	echo $dataJson;
	}


    Function showGetTopic(){
    	$pdo = $this->getConnect();
    	$dataId = $_POST['id'];

    	$sql = "SELECT tpId,tpName,tpDetail from wd_topic where tpId=".$dataId;
    	$row = $this->myFetchOne($sql);

   		$sql = "SELECT COUNT(strType) AS num FROM wd_focus WHERE strFcId = ".$dataId." AND strType = 'topic'";
   		$fcNum = $this->myFetchOne($sql);

   		$sql = "SELECT COUNT(qsId) AS qsNum FROM wd_question WHERE tpId = ".$dataId;
   		$qsNum = $this->myFetchOne($sql);

   		foreach ($row as $key => $value) {
   			$list[$key] = $value;
   			$list['fcNum'] = $fcNum[num];
   			$list['qsNum'] = $qsNum[qsNum];
   		}

   		echo json_encode($list);
    }

    Function showGetUser(){
        $pdo = $this->getConnect();
        $dataId = $_POST['id'];

        $sql = "SELECT strUserId,strName,strDetail from wd_user where strUserId=".$dataId;
        $row = $this->myFetchOne($sql);

        $sql = "SELECT COUNT(strType) AS num FROM wd_focus WHERE strFcId = ".$dataId." AND strType = 'user'";
        $fcNum = $this->myFetchOne($sql);

        $sql = "SELECT COUNT(id) AS usNum FROM wd_answer WHERE strUserId = ".$dataId;
        $usNum = $this->myFetchOne($sql);

        foreach ($row as $key => $value) {
            $list[$key] = $value;
            $list['fcNum'] = $fcNum[num];
            $list['usNum'] = $usNum[usNum];
        }

        echo json_encode($list);
    }

    Function showLoadQuestiton(){
    	
    	$dataId = $_POST['id'];

    	$sql = "SELECT tpName,q.tpId,qsId,qsTitle,qsContent,qsCreateTime FROM wd_question AS q LEFT JOIN wd_topic AS t ON q.tpId = t.tpId WHERE qsId=".$dataId;
    	$array = $this->myFetchAll($sql);

    	$ansArr = $this->myFetchAll("SELECT a.strUserId,u.strName,a.strAnsId,strAnsContent,strAnsAgree,strAnsAttentions,strAnsComment FROM wd_answer AS a INNER JOIN wd_user AS u ON a.strUserId = u.strUserId WHERE a.strQsId=".$dataId);

    	$array['questions'] = $ansArr;
   		echo json_encode($array);

    }
    Function showReplay(){

        if (!empty($_POST['content'])) {
        	$pdo = $this->getConnect();
        	$content = "'".htmlspecialchars_decode($_POST['content'])."'";
        	$qsId = $_POST['qsId'];
        	$userId = $_SESSION['login']['strUserId'];
            $ansId = $this->getLastId('strAnsId','wd_answer');

            if ($_SESSION['replay']) {
                $img = "'".$_SESSION['replay']['img']."'";
                $sql = "insert into wd_answer(strAnsId,strQsId,strUserId,strAnsContent,strAnsImg,createTime) values($ansId,$qsId,$userId,$content,$img,CURDATE())";
            }

            $img = '';
        	$sql = "insert into wd_answer(strAnsId,strQsId,strUserId,strAnsContent,createTime) values($ansId,$qsId,$userId,$content,CURDATE())";
        	$rs = $pdo->prepare($sql);
            $_SESSION['replay'] = '';
       		if ($rs->execute()) {
       			echo json_encode('0000');
       		}
        }

    }

    Function showLoginYz(){
    	$sql = "SELECT * from wd_user where strName='".$_POST['name']."' && strPass=".$_POST['pass'];
    	$row = $this->myFetchOne($sql);
    	if ($row) {
    		echo json_encode('0000');
    		$_SESSION['login'] = $row;
    	}else{
    		echo json_encode('1111');
    	}
    }

    Function showRegister(){
    	$pdo = $this->getConnect();
        $pass= $_POST['pass'];
    	$email= $_POST['email'];
    	$name= "'".$_POST['name']."'";
    	$id = $this->getLastId('strUserId','wd_user');
    	//判断是否已存在用户
    	$sql = "SELECT * from wd_user where strName=".$name;
    	if ($this->myFetchOne($sql)) {
    		echo json_encode('2222');
    		return;
    	}
    	$sql = "insert into wd_user(strUserId,strName,strPass,strEmail) values($id,$name,$pass,$email)";
    	$rs  = $pdo->prepare($sql);
    	if ($rs->execute()) {
    		echo json_encode('0000');
    	}else{
    		echo json_encode('1111');
    	}
    }

    // 问题评论
    Function showGetQsComment(){
    	$sql = "SELECT strQsCmtId,qsId,u.strName,u.strUserId,strCmtContent,tCreateTime FROM wd_q_comment as c INNER JOIN wd_user as u on c.strUserId = u.strUserId WHERE qsId=".$_GET['ques_id'];
    	$array = $this->myFetchAll($sql);
    	if (count($array)) {
    		echo json_encode($array);
    	}else{
    		echo json_encode('1111');
    	}

    }

    Function showSaveQsComment(){
    	if (!empty($_POST['content'])) {
	    	$pdo = $this->getConnect();
	    	$cmtId = $this->getLastId('strQsCmtId','wd_q_comment');
	    	$qsId  = $_GET['ques_id'];
	    	$userId = $_SESSION['login']['strUserId'];
	    	$content = "'".$_POST['content']."'";
	    	$sql = "insert into wd_q_comment(strQsCmtId,qsId,strUserId,strCmtContent,tCreateTime) values($cmtId,$qsId,$userId,$content,CURDATE())";
	    	$rs = $pdo->prepare($sql);
			if ($rs->execute()) {
				echo json_encode('0000');
			}else{	
				echo json_encode('1111');
			}
    		
    	}
    }

    //问答评论
    Function showGetAnsComment(){
        $sql = "SELECT strAnsCmtId,strAnsId,u.strName,u.strUserId,strCmtContent,tCreateTime FROM wd_a_comment as c INNER JOIN wd_user as u on c.strUserId = u.strUserId WHERE strAnsId=".$_GET['ques_id'];
        $array = $this->myFetchAll($sql);

        if (count($array)) {
            echo json_encode($array);
        }else{
            echo json_encode('1111');
        }

    }

    Function showSaveAnsComment(){
    	if (!empty($_POST['content'])) {
	        $pdo = $this->getConnect();
	        $cmtId = $this->getLastId('strAnsCmtId','wd_a_comment');
	        $qsId  = $_GET['ques_id'];
	        $userId = $_SESSION['login']['strUserId'];
	        $content = "'".$_POST['content']."'";
	        $sql = "insert into wd_a_comment(strAnsCmtId,strAnsId,strUserId,strCmtContent,tCreateTime) values($cmtId,$qsId,$userId,$content,CURDATE())";
	        $rs = $pdo->prepare($sql);
	        if ($rs->execute()) {
	            echo json_encode('0000');
	        }else{  
	            echo json_encode('1111');
	        }
        }
    }

    //获取邀请人
    Function showGetInvitor(){
        $id = $_GET['id'];
        $sql = "SELECT qsId FROM wd_question WHERE tpId =".$id;
        $arr = $this->myFetchAll($sql);
        $where = $this->getWhere($arr,'strQsId','qsId');
            
        $sql = "SELECT strUserId FROM wd_answer ".$where." GROUP BY strUserId";
        $array = $this->myFetchAll($sql);
        $where = $this->getWhere($array,'strUserId','strUserId');

        $sql = "SELECT strUserId,strName,strDetail FROM wd_user ".$where;
        $arr = $this->myFetchAll($sql);

        echo json_encode($arr);

    }


    Function showImgUpload(){

    	$imgName = $_FILES['file']['name'];
    	$tmp = $_FILES['file']['tmp_name'];
    	$path = "home/pageImg/".$imgName;
    	move_uploaded_file($tmp, $path);
    	$_SESSION['replay']['img'] = $path;

    	echo $path;
    }

    Function showQuestionImg(){
        $imgName = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];
        $path = "home/questionImg/".$imgName;
        move_uploaded_file($tmp, $path);
        echo $path;
    }

    //邀请用户
    Function showInviterUser(){

    	$qsId = $_POST['ques_id'];
    	$userId = $_POST['user_id'];
        $inviteId = $_SESSION['login']['strUserId'];
    	$pdo = $this->getConnect();
    	$sql = "insert into wd_invite(qsId,strUserId,strInviteId,tCreateTime) values($qsId,$userId,$inviteId,CURDATE())";
    	$rs  = $pdo->prepare($sql);
    	if ($rs->execute()) {
    		echo json_encode('0000');
    	}
    	
    }

    //取消邀请
    Function showCancelInvite(){
    	$qsId = $_POST['ques_id'];
    	$inviteId = $_SESSION['login']['strUserId'];
    	$pdo = $this->getConnect();
    	$sql = "DELETE from wd_invite WHERE qsId = ".$qsId." AND  strInviteId = ".$inviteId;
    	$rs  = $pdo->prepare($sql);
    	if ($rs->execute()) {
    		echo json_encode('0000');
    	}
    }

    //退出
    Function showLogOut(){
        session_unset();//清除数据
        session_destroy();//销毁文件
        goback('退出成功','/index.php?module=index&action=login');
    } 

    //举报
    Function doReport(){
        if (!empty($_POST['reason'])) {
            $pdo = $this->getConnect();
            $reson = "'".$_POST['reason']."'";
            $qsId = $_POST['strQsId'];
            $userId = $_POST['strUserId'];
            $sql = "insert into wd_report(strQsId,strUserId,strReason,tCreateTime) values($qsId,$userId,$reson,CURDATE())";
            $rs  = $pdo->prepare($sql);
            if ($rs->execute()) {
                goback('','/index.php?module=question&action=question&id='.$_POST['strQsId']);
            }else{
                echo "出现错误";
            }
        }
      } 

    //信息设置
    Function doUserSet(){
        if (!empty($_POST[info])) {
            $birthday = "'".$_POST[info]['birthday_y']."-".$_POST[info]['birthday_m']."-".$_POST[info]['birthday_d']."'";
            $detail = "'".$_POST[info]['signature']."'";
            $mobile = $_POST[info]['mobile'];
            $sex = $_POST[info]['sex'];
            $userId = $_SESSION['login']['strUserId'];

            $pdo = $this->getConnect();
            $sql = "UPDATE wd_user SET strSex = ".$sex.",strDetail = ".$detail.",strMobile = ".$mobile.",strBirthday = ".$birthday." WHERE strUserId = ".$userId;
            $rs  = $pdo->prepare($sql);
            if ($rs->execute()) {
                goback('保存成功','/index.php?module=user&action=profile');
            }else{
                echo "出现错误";
            }
        }
    }

    Function doImgUp(){
    	$name = 'user-'.$_SESSION['login']['strUserId'].'.jpg';
    	$tmp = $_FILES['File1']['tmp_name'];
    	$path = "home/userImg/".$name;
    	move_uploaded_file($tmp, $path);
    	$_SESSION['user']['img'] = $path;
    	goback('','/index.php?module=user&action=profile');
    }

    Function doSetPass(){
        $pdo = $this->getConnect();
        $sql = 'SELECT * FROM wd_user where strUserId = '.$_SESSION['login']['strUserId'].' and strPass = '.$_POST['old_password'];
        $row = $this->myFetchOne($sql);
        if (!$row) {
            goback('当前密码不正确','/index.php?module=user&action=security');
        }

        $rs = $pdo->prepare('UPDATE wd_user SET strPass = '.$_POST['password'].' where strUserId = '.$_SESSION['login']['strUserId']);
        if (!$rs->execute()) {
            goback('修改失败,请重试','/index.php?module=user&action=security');
        }   
            session_destroy();
            goback('修改成功,请重新登录','/index.php');
    }

    //search
    Function showSearchData(){
        $sql = "SELECT strUserId,strName,strDetail FROM wd_user where strName like '%".$_GET['q']."%' limit ".$_GET['limit'];
        $row = $this->myFetchAll($sql);
        foreach ($row as $key => $value) {
            $res = $value;
            $res['type'] = 'users';
            $list[] = $res;
        }

        $sql = "SELECT tpId,tpName FROM wd_topic where tpName like '%".$_GET['q']."%' limit ".$_GET['limit'];
        $row = $this->myFetchAll($sql);
        foreach ($row as $key => $value) {
            $res = $value;
            $res['type'] = 'topics';
            $list[] = $res;
        }
        $sql = "SELECT qsId,qsTitle FROM wd_question where qsTitle like '%".$_GET['q']."%' limit ".$_GET['limit'];
        $row = $this->myFetchAll($sql);
        foreach ($row as $key => $value) {
            $res = $value;
            $res['type'] = 'questions';
            $list[] = $res;
        }
        echo json_encode($list);
    }

    //搜索邀请人
    Function showSearchInvite(){
        $sql = "SELECT strUserId,strName,strDetail FROM wd_user where strName like '%".$_GET['q']."%' limit ".$_GET['limit'];
        $row = $this->myFetchAll($sql);
        foreach ($row as $key => $value) {
            $list[] = $value;
        }
        echo json_encode($list);
        
    }

    Function showAllTopics(){
    	$row = $this->myFetchAll('SELECT tpId,tpName,tpDetail FROM wd_topic');
        foreach ($row as $key => $value) {
            $text = strip_tags($value['tpDetail']);
            $row[$key]['stortDetail'] = mb_substr($text,'0','15','utf-8').'..'; 
        }
    	echo json_encode($row);
    }

    Function showTopicQuestions(){

        $row = $this->myFetchAll('SELECT qsId,q.strUserId,qsTitle,qsContent,strName,qsCreateTime FROM wd_question AS q LEFT JOIN wd_user AS u ON q.strUserId = u.strUserId  WHERE q.tpId = '.$_GET['id']);
        $topic = $this->myFetchOne('SELECT tpName,tpDetail FROM wd_topic WHERE tpId = '.$_GET['id']);

        $list['questions'] = $row;
        $list['topic'] = $topic;

        echo json_encode($list);
    }

    Function showSelectQuestion(){

        $arr = $_POST['data'];
        for ($i=0; $i < count($arr); $i++) { 
            if ($i == 0) {
                $string .= $arr[$i]."'";
            }else{
                $string .= " || tpName = '".$arr[$i]."'";
            }
        }
        $where = "WHERE tpName = '".$string;
        $sql = "SELECT tpId FROM wd_topic ".$where;
        $row = $this->myFetchAll($sql);
        $where = $this->getWhere($row,'q.tpId','tpId');

        $sql = "SELECT q.qsId,t.tpName,t.tpId,qsTitle FROM wd_question as q LEFT JOIN wd_topic as t on q.tpId= t.tpId ".$where;
        $row = $this->myFetchAll($sql);
        echo json_encode($row);

    }

    //添加关注
    Function showFocus(){

    	$pdo = $this->getConnect();
    	$fcId = $_GET['id'];
    	$type ="'".$_GET['type']."'";
    	$userId = $_SESSION['login']['strUserId'];
    	$sql = "insert into wd_focus(strType,strFcId,strUserId) values($type,$fcId,$userId)";
    	$rs = $pdo->prepare($sql);
    	if($rs->execute()){
    		echo json_encode('0000');
    	};
    }

    //取消关注
    Function showDelFocus(){

    	$pdo = $this->getConnect();
    	$fcId = $_GET['id'];
    	$userId = $_SESSION['login']['strUserId'];
    	$sql = "DELETE FROM wd_focus WHERE strFcId =".$fcId." AND strUserId = ".$userId;
    	$rs = $pdo->prepare($sql);
    	if($rs->execute()){
    		echo json_encode('0000');
    	};
    }

    //关注问题
     Function showLoadFocusQues(){

        $page= $_POST['page']*10; 
        $limit = ' limit 0,'.$page;

		$sql = "SELECT strFcId FROM wd_focus WHERE strUserId = ".$_SESSION['login']['strUserId']." AND strType = 'question'";
		$row = $this->myFetchAll($sql);
		$where = $this->getWhere($row,'qsId','strFcId');

		$string = "SELECT t.tpName,q.tpId,qsTitle FROM wd_question AS q LEFT JOIN wd_topic AS t ON q.tpId = t.tpId ";
		$row = $this->myFetchAll($string.$where.$limit);
		echo json_encode($row);
	}

	//关注话题
	Function showLoadFocusTopics(){

        $page= $_POST['page']*10; 
        $limit = ' limit 0,'.$page;

		$sql = "SELECT strFcId FROM wd_focus WHERE strUserId = ".$_SESSION['login']['strUserId']." AND strType = 'topic'";
		$row = $this->myFetchAll($sql);
		$where = $this->getWhere($row,'tpId','strFcId');

		$string = "SELECT tpName,tpId,tpDetail FROM wd_topic ";
		$row = $this->myFetchAll($string.$where.$limit);
		foreach ($row as $key => $value) {
            $text = strip_tags($value['tpDetail']);
            $row[$key]['stortDetail'] = mb_substr($text,'0','15','utf-8').'..'; 
        }
		echo json_encode($row);
	}

    //获取邀请回答
    Function showLoadInvite(){

        $page= $_POST['page']*10; 
        $limit = ' limit 0,'.$page;
        $userId = $_SESSION['login']['strUserId'];
        $sql = "SELECT qsId,strInviteId FROM wd_invite WHERE strUserId = ".$userId;
        $invitArr = $this->myFetchAll($sql);

        $qsWhere = $this->getWhere($invitArr,'qsId','qsId');
        $sql = "SELECT tpId,qsTitle FROM wd_question ".$qsWhere;
        $qsArr = $this->myFetchAll($sql);

        $inWhere = $this->getWhere($invitArr,'strUserId','strInviteId');
        $sql = "SELECT strName FROM wd_user ".$inWhere;
        $inArr = $this->myFetchAll($sql);

        foreach ($invitArr as $key => $value) {
            $invitArr[$key] = $value;
            $invitArr[$key]['tpId'] = $qsArr[$key]['tpId'];
            $invitArr[$key]['qsTitle'] = $qsArr[$key]['qsTitle'];
            $invitArr[$key]['strName'] = $inArr[$key]['strName'];
        }

        echo json_encode($invitArr);





    }

    Function showInitInvite(){

        $userId = $_SESSION['login']['strUserId'];

        if ($_GET['type'] == 'question') {
          $sql = "SELECT * FROM wd_focus WHERE strFcId = ".$_GET['qsId']." AND strUserId = ".$userId;
        }
        if ($_GET['type'] == 'topic') {
          $sql = "SELECT * FROM wd_focus WHERE strFcId = ".$_GET['tpId']." AND strUserId = ".$userId;
        }
        if ($_GET['type'] == 'user') {
          $sql = "SELECT * FROM wd_focus WHERE strFcId = ".$_GET['userId']." AND strUserId = ".$userId;
        }
      
        $info = $this->myFetchOne($sql);
        if ($info) {
            echo json_encode('0000');
        }
    }

    Function showPeople(){

        $userId = $_POST['useid'];

        $sql = "SELECT strQsId,strAnsContent,strAnsAgree,createTime FROM wd_answer where strUserId = ".$userId;
        $ques = $this->myFetchAll($sql);
        $where = $this->getWhere($ques,'qsId','strQsId');

        $sql = "SELECT qsTitle FROM wd_question ";
        $qsTitle = $this->myFetchAll($sql.$where);
      
        foreach ($ques as $key => $value) {
            $quesArr[$key] = $value;
            $quesArr[$key]['qsTitle'] = $qsTitle[$key]['qsTitle'];
        }


        $sql = "SELECT qsId,qsTitle,qsCreateTime FROM wd_question where strUserId = ".$userId;
        $ansArr = $this->myFetchAll($sql);

        $list['quesArr'] = $ansArr;
        $list['ansArr'] = $quesArr;
        echo json_encode($list);
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
    * 获取最新id
    */
    Function getLastId($id,$table){
        $this->getConnect();
        $sql = "SELECT max($id) as lastId FROM $table";
        $strLastId = $this->myFetchOne($sql);
        $lastId =  $strLastId['lastId'];
        $lastId++;
        return $lastId;
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




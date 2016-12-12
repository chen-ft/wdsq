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

		$pdo = $this->getConnect();
		$page= $_POST['page']*10;
		$sql = 'SELECT q.tpId,t.tpName,q.qsId,a.strAnsAgree,q.qsTitle,u.strUserId,u.strName,
				u.strDetail,a.strAnsContent,a.strAnsId,a.strAnsComment,a.strAnsImg,
				a.strAnsAttentions  FROM wd_question AS q LEFT JOIN (select * from wd_answer 
				ORDER BY strAnsAttentions desc) AS a ON q.qsId = a.strQsId LEFT JOIN wd_topic 
				AS t ON q.tpId = t.tpId LEFT JOIN wd_user AS u ON a.strUserId = u.strUserId 
				GROUP BY q.qsId';

		$limit = ' limit 0,'.$page;
		$rs = $pdo->prepare($sql.$limit);
		$rs->execute();
		$array = [];
		while ( $row = $rs->fetchAll(PDO::FETCH_ASSOC)) {
			$array  = $row;
		}
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

    	$sql = "SELECT tpId,tpName,tpQuestions,tpAttentions,tpDetail from wd_topic where tpId=".$dataId;
    	$rs = $pdo->prepare($sql);
   		$rs->execute();
        $array = [];
   		while ( $row = $rs->fetchAll(PDO::FETCH_ASSOC)) {
   			$array  = $row;
   		}

   		echo json_encode($array);
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

        	$img = "'".$_SESSION['replay']['img']."'";
        	$ansId = $this->getLastId('strAnsId','wd_answer');
        	$sql = "insert into wd_answer(strAnsId,strQsId,strUserId,strAnsContent,strAnsImg,createTime) values($ansId,$qsId,$userId,$content,$img,CURDATE())";
        	$rs = $pdo->prepare($sql);
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
    	$name= "'".$_POST['name']."'";
    	$id = $this->getLastId('strUserId','wd_user');
    	//判断是否已存在用户
    	$sql = "SELECT * from wd_user where strName=".$name;
    	if ($this->myFetchOne($sql)) {
    		echo json_encode('2222');
    		return;
    	}
    	$sql = "insert into wd_user(strUserId,strName,strPass) values($id,$name,$pass)";
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

    //邀请用户
    Function showInviterUser(){
    	// print_r($_POST);
    	$qsId = $_POST['ques_id'];
    	$userId = $_POST['user_id'];
    	$pdo = $this->getConnect();
    	$sql = "insert into wd_invite(qsId,strUserId,tCreateTime) values($qsId,$userId,CURDATE())";
    	$rs  = $pdo->prepare($sql);
    	if ($rs->execute()) {
    		echo json_encode('0000');
    	}
    	
    }

    //取消邀请
    Function showCancelInvite(){
    	$qsId = $_POST['ques_id'];
    	$userId = $_POST['user_id'];
    	$pdo = $this->getConnect();
    	$sql = "DELETE from wd_invite WHERE qsId = ".$qsId." AND  strUserId = ".$userId;
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
        var_dump($_POST[info]);
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
   		$row = $rs->fetch(PDO::FETCH_ASSOC);
   		return $row;
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




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
	   				u.strDetail,a.strAnsContent,a.strAnsId,a.strAnsComment,a.strAnsAttentions  FROM 
	   				wd_question AS q LEFT JOIN (select * from wd_answer ORDER BY strAnsAttentions
	   				 desc) AS a ON q.qsId = a.strQsId LEFT JOIN wd_topic AS t ON q.tpId = t.tpId LEFT JOIN wd_user AS u ON a.strUserId = u.strUserId  GROUP BY q.qsId';

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

    	$sql = "SELECT tpName,qsId,qsTitle,qsContent,qsCreateTime FROM wd_question AS q LEFT JOIN wd_topic AS t ON q.tpId = t.tpId WHERE qsId=".$dataId;
    	$array = $this->myFetchAll($sql);

    	$array2 = $this->myFetchAll("SELECT a.strUserId,u.strName,a.strAnsId,strAnsContent,strAnsAgree,strAnsAttentions,strAnsComment FROM wd_answer AS a INNER JOIN wd_user AS u ON a.strUserId = u.strUserId WHERE a.strQsId=".$dataId);

    	$array['questions'] = $array2;
   		echo json_encode($array);

    }
    Function showReplay(){
    	$pdo = $this->getConnect();
    	$content = "'".htmlspecialchars_decode($_POST['content'])."'";
    	$qsId = $_POST['qsId'];
    	$userId = $_SESSION['login']['strUserId'];
    	$ansId = $this->getLastId('strAnsId','wd_answer');
    	$sql = "insert into wd_answer(strAnsId,strQsId,strUserId,strAnsContent,createTime) values($ansId,$qsId,$userId,$content,CURDATE())";
    	$rs = $pdo->prepare($sql);
   		if ($rs->execute()) {
   			echo json_encode('0000');
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




	
}




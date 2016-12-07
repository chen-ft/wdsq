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
			$title = "'".$_POST['title']."'";
			$content = "'".htmlspecialchars_decode($_POST['content'])."'";
			$topic = $_POST['topic'];
			$num = 100100;
			$userId = '201002';
			$sql = "insert into wd_question(qsId,tpId,strUserId,qsTitle,qsContent,qsCreateTime) values($num,$topic[0],$userId,$title,$content,CURDATE())";
			$rs = $pdo->prepare($sql);
			$rs->execute();
			echo $sql;

			if ($rs) {
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
	   				u.strDetail,a.strAnsContent,a.strAnsComment,a.strAnsAttentions  FROM 
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

    	$sql = "SELECT tpName,qsTitle,qsContent,qsCreateTime FROM wd_question AS q LEFT JOIN wd_topic AS t ON q.tpId = t.tpId WHERE qsId=".$dataId;
    	$array = $this->myQuery($sql);

    	$array2 = $this->myQuery("SELECT a.strUserId,u.strName,strAnsContent,strAnsAgree,strAnsAttentions,strAnsComment FROM wd_answer AS a INNER JOIN wd_user AS u ON a.strUserId = u.strUserId WHERE a.strQsId=".$dataId);

    	$array['questions'] = $array2;
   		echo json_encode($array);

    }
    Function showReplay(){
    	$pdo = $this->getConnect();
    	$content = "'".htmlspecialchars_decode($_POST['content'])."'";
    	$id = $_POST['qsId'];
    	$userId = $_POST['userId'];
    	
    	$sql = "insert into wd_answer(strQsId,strUserId,strAnsContent) values($id,$userId,$content)";
    	$rs = $pdo->prepare($sql);
   		$rs->execute();

    }


    Function myQuery($sql){
    	$pdo = $this->getConnect();
    	$rs = $pdo->prepare($sql);
   		$rs->execute();
        $array = [];
   		while ( $row = $rs->fetchAll(PDO::FETCH_ASSOC)) {
   			$array  = $row;
   		}
   		return $array;
    }


	
}




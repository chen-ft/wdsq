<?php
/**
 * Created by PhpStorm.
 * User: dt.thxopen.com
 * Date: 2014/12/7
 * Time: 11:13
 */
try {
    //连接数据库
    $db = new PDO('mysql:host=localhost;dbname=test',"root","root");
    // $stme = $db->excute('select * from demo');
    // var_dump($stme->fetchAll());exit(0);
} catch (PDOException $e) {
    fatal(
        "数据库连接出错" . $e->getMessage()
    );
}
 
//获取Datatables发送的参数 必要
$draw = $_GET['draw'];//这个值作者会直接返回给前台
 
//排序
$order_column = $_GET['order']['0']['column'];//那一列排序，从0开始
$order_dir = $_GET['order']['0']['dir'];//ase desc 升序或者降序
 
//拼接排序sql
$orderSql = "";
if(isset($order_column)){
    $i = intval($order_column);
    switch($i){
        case 0;$orderSql = " order by first_name ".$order_dir;break;
        case 1;$orderSql = " order by last_name ".$order_dir;break;
        case 2;$orderSql = " order by office ".$order_dir;break;
        case 3;$orderSql = " order by start_date ".$order_dir;break;
        case 4;$orderSql = " order by position ".$order_dir;break;
        default;$orderSql = '';
    }
}
//搜索
$search_num = $_GET['data_num'];
$search_client = $_GET['data_client'];
$search_company = $_GET['data_company'];


//分页
$start = $_GET['start'];//从多少开始
$length = $_GET['length'];//数据长度
$limitSql = '';
$limitFlag = isset($_GET['start']) && $length != -1 ;
if ($limitFlag ) {
    $limitSql = " LIMIT ".intval($start).", ".intval($length);
}
 
//定义查询数据总记录数sql
$sumSql = "SELECT count(first_name) as sum FROM demo";
//条件过滤后记录数 必要
$recordsFiltered = 0;
//表的总记录数 必要
$recordsTotal = 0;
$recordsTotalResult = $db->query($sumSql);
$stmt = $recordsTotalResult->fetchAll();
foreach ($stmt as $row) {
    $recordsTotal =  $row['sum'];
}


//定义过滤条件查询过滤后的记录数sql
$sumSqlWhere = " where ";
$where = array();
$j = '';
$whereStr = '';
if (strlen($search_num)>0) {
    $where[] = " first_name LIKE '%".$search_num."%' ";
}
if (strlen($search_client)>0) {
    $where[] = " last_name LIKE '%".$search_client."%' ";
}
if (strlen($search_company)>0) {
    $where[] = " office LIKE '%".$search_company."%'";
}
/*Array
(
    [0] =>  first_name LIKE '%12%' 
    [1] =>  last_name LIKE '%12%' 
    [2] =>  office LIKE '%12%'
)*/
//拼接条件语句
if (count($where)>0) {
    for ($i=0; $i < count($where)-1; $i++) { 
     $whereStr.= $where[$i]." and ";
    }
    $sumSqlWhere .= $whereStr.$where[(count($where)-1)];

}


if(strlen($search_num)>0||strlen($search_client)>0||strlen($search_company)>0){
    $recordsFilteredResult = $db->query($sumSql.$sumSqlWhere);
    // echo $sumSql.$sumSqlWhere;exit();
    $stmt = $recordsFilteredResult->fetchAll();
    foreach ($stmt as $row) {
    $recordsTotal =  $row['sum'];
}
}else{
    $recordsFiltered = $recordsTotal;
}
 /*<td>
  <a class="btn btn-block btn-primary" style="width:60px;margin:0 auto">查看</a>
</td>*/

//拼接操作按钮

$str = "<a href='client-list-edit.php' class='btn btn-block btn-primary' style='width:60px;margin:0 auto'>查看</a>";

//query data
$totalResultSql = "SELECT first_name,last_name,office,start_date,position FROM demo";
$infos = array();
if(strlen($search_num)>0||strlen($search_client)>0||strlen($search_company)>0){
    //如果有搜索条件，按条件过滤找出记录
    $dataResult = $db->query($totalResultSql.$sumSqlWhere.$orderSql.$limitSql);
    // echo $totalResultSql.$sumSqlWhere.$orderSql.$limitSql;exit();
    $stmt = $dataResult->fetchAll();
     foreach ($stmt as $row) {
       $obj = array($row['first_name'], $row['last_name'], $row['office'], $row['start_date'], $row['position']);
       array_push($obj, $str);
        array_push($infos,$obj);
    }
}else{
    //直接查询所有记录
    $dataResult = $db->query($totalResultSql.$orderSql.$limitSql);
    // echo $totalResultSql.$orderSql.$limitSql;
    $stmt = $dataResult->fetchAll();
    foreach ($stmt as $row) {
       $obj = array($row['first_name'], $row['last_name'],$row['office'], $row['start_date'], $row['position']);
       array_push($obj, $str);
        array_push($infos,$obj);
    }
}


 
/*
 * Output 包含的是必要的
 */
echo json_encode(array(
    "draw" => intval($draw),
    "recordsTotal" => intval($recordsTotal),
    "recordsFiltered" => intval($recordsFiltered),
    "data" => $infos
));
 
 
function fatal($msg)
{
    echo json_encode(array(
        "error" => $msg
    ));
    exit(0);
}
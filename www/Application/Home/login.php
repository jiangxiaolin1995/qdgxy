<?php
//session用来存储数据
session_start();


mysql_connect('localhost','root','qdgxy','qdgxy');

mysql_set_charset('utf8');

mysql_select_db('qdgxy');


//接收数据
$name = $_POST['name'];
$password = md5($_POST['password']);

$sql = "select * from user where name='$name' and password='$password'";
$res = mysql_query($sql);


$arr = mysql_fetch_assoc('$res');

if($arr[id]){
    $_SESSION['qdgxy_id'] = $arr['id'];
    $_SESSION['qdgxy_name'] = $arr['name'];
    $arr = array('code'=>'200','info'=>'登录成功');

}else{
    $arr = array('code'=>'404','info'=>'登录失败');
}
echo json_encode($arr);


?>
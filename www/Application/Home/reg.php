<?php
//用sql_connect会报错，说在新版本中可能会弃用这个方法，所以改成mysqli_connect
//$mysqli = new mysqli('localhost','root','','volunteer');
//旧方法
mysql_connect('localhost','root','qdgxy','qdgxy');

mysql_set_charset('utf8');

mysql_select_db('qdgxy');

//模拟用户名密码的传递
$name=$_POST['name'];
$password=md5($_POST['password']);
$regtime=time();


 $sql="insert into user values(null,'$name','$password','$regtime')";

// echo $sql;

//并且将mysql_query改成mysqli_query
if(mysql_query($sql)){
    $arr =array('code'=>'200','info'=>'注册成功');
}else{
    $arr = array('code'=>'404','info'=>'注册失败');
}

echo json_encode($arr);

?>
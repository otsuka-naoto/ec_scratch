<?php
try{
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $db = new PDO('mysql:dbname=mysql;host=localhost;charset=utf8','root', 'root');
    $sql = "insert into mst_user (Name, Pass) values ('" . $name . "', '" . $pass . "') ";
    $db -> query($sql);
    http_response_code(200) ;
	header( "Location: user_regist_view.php" ) ;
	exit ;
}catch (Exception $ex){
    echo '接続エラー(' . $ex . '.';
}
?>
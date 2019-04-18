<?php
$arr=array(0,1,2,array(3,4,array(5,array(6,7),8)));

function getarr($arr){
	// 声明静态 指下一次执行 不会被销毁
	static $data=[];
	foreach($arr as $v){
		if(is_array($v)){
			getarr($v);
		}else{
			$data[]=$v;
		}
	}
	return $data;
}
echo '<pre>';
print_r(getarr($arr));

echo '<hr>';

// 案例预编译语句

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "stu";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
// 预处理及绑定
$stmt = $conn->prepare("INSERT INTO yubian (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);
// 设置参数并执行
$firstname = "John";
$lastname = 5;
$email = "john@example.com";
$stmt->execute();
 
echo "新记录插入成功";
echo "测试";
echo "测试2";
$stmt->close();
$conn->close();

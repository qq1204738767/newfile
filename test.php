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
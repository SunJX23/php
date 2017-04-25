
<?php

//在一个二维数组中，每一行都按照从左到右递增的顺序排序，每一列都按照从上到下递增的顺序排序。请完成一个函数，输入这样的一个二维数组和一个整数，判断数组中是否含有该整数。

function Find($target, $array)
{
    // write code here
    $col=count($array[0])-1;
    $row=count($array)-1;
    $j=0;
    $i=$row;
    if($array[$row][$col]<$target||$array[0][0]>$target){
    	return false;//此处有错？
    }
    while($i>=0&&$j<=$col){
    	if($target==$array[$i][$j])
    		return ture;
    	else if($target<$array[$i][$j]){
    		$i--;
        }
    	else if($target>$array[$i][$j]){
    		$j++;
        }
    	else{
    		return false;
        }
    }
    return false;
}

$s = [[1,2,8,9],[4,7,10,13]];
var_dump(Find(7, $s));

?>
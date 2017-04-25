<?php

//输入某二叉树的前序遍历和中序遍历的结果，请重建出该二叉树。假设输入的前序遍历和中序遍历的结果中都不含重复的数字。例如输入前序遍历序列{1,2,4,7,3,5,6,8}和中序遍历序列{4,7,2,1,5,3,8,6}，则重建二叉树并返回。


// $prea = array('A','B','D','E','C','F');
// $ina = array('D','B','E','A','C','F');

// $prea = array('A','D','E','H','F','J','G','B','C','K');
// $ina = array('H','E','J','F','G','D','A','B','K','C');

class TreeNode{  //树节点类
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
    function createBinaryTree(TreeNode $lchird = NULL, TreeNode $rchird = NULL){
    	if(!is_null($lchird))
    		$this->left = $lchird;
    	if(!is_null($rchird))
    		$this->right = $rchird;
	}
}



function preOrder($root, $pre){ //先序遍历二叉树并将结果存储在数组pre中
	$pre[] = $root->val;
	if(!is_null($root->left)){
		$pre = preOrder($root->left, $pre);
	}
	if(!is_null($root->right)){
		$pre = preOrder($root->right, $pre);
	}
	return $pre;
}

function inOrder($root, $in){//中序遍历二叉树并将结果存储在数组in中
	if(!is_null($root->left))
		$in = inOrder($root->left, $in);
	$in[] = $root->val;
	if(!is_null($root->right))
		$in = inOrder($root->right, $in);
	return $in;
}

function postOrder($root, $post){//后序遍历二叉树并将结果存储在数组post中
	static $i = 0;
	if(!is_null($root->left))
		$post = postOrder($root->left, $post);
	if(!is_null($root->right))
		$post = postOrder($root->right, $post);
	$post[] = $root->val;
	return $post;
}

function getdepth($root){//获取二叉树的高度
	if(is_null($root))
		return 0;
	$left = getdepth($root->left);
	$right = getdepth($root->right);
	$depth = ($left > $right ? $left : $right) + 1;
	return $depth;
}

function breadOrder1($root, $bread){  //用递归方式实现广度优先遍历二叉树并将结果存储在数组bread中
	for($i=1; $i<=getdepth($root); $i++)
		$bread = breadOrder11($root, $bread,$i);
	return $bread;
}

function breadOrder11($root, $bread, $level){
	if($root == NULL || $level < 1){
        return $bread;
    }
    if($level == 1){
    	$bread[] = $root->val;
        return $bread;
    }
    if(!is_null($root->left))
        $bread = breadOrder11($root->left, $bread, $level-1);
    if(!is_null($root->right))
        $bread = breadOrder11($root->right, $bread, $level-1);
    return $bread;
}

function breadOrder2($root, $bread){  //用队列方式实现广度优先遍历二叉树并将结果存储在数组bread中
	array_push($bread, $root);
	while (!is_null($root = array_shift($bread))) {
		echo $root->val;
		if(!is_null($root->left))
			array_push($bread, $root->left);
		if(!is_null($root->right))
			array_push($bread, $root->right);
	}
}

function reConstructBinaryTree($pre, $in){ //根据先序遍历和中序遍历结果重构二叉树
	return reConstruct(0,count($pre)-1,0,count($in)-1,$pre,$in);
}

function reConstruct($startpre, $endpre, $startin, $endin, $pre, $in){
	$root = new TreeNode($pre[$startpre]);
	if(($endpre-$startpre) > 0){
		$flag = array_search($pre[$startpre], $in);
		if(($flag-$startin) > 0)//构建左子树
			$root->left = reConstruct($startpre+1, $flag-$startin+$startpre, $startin, $flag-1, $pre,$in);
		if(($endin-$flag) > 0)//构建右子树
			$root->right = reConstruct($flag-$startin+$startpre+1, $endpre, $flag+1, $endin, $pre, $in);
	}
	return $root;
}



//构建二叉树
// $j = new TreeNode('J');
// $g = new TreeNode('G');
// $f = new TreeNode('F');
// $h = new TreeNode('H');
// $e = new TreeNode('E');
// $d = new TreeNode('D');
// $k = new TreeNode('K');
// $c = new TreeNode('C');
// $b = new TreeNode('B');
// $a = new TreeNode('A');
// $a->left = $d;
// $a->right = $b;
// $d->left = $e;
// $e->left = $h;
// $e->right = $f;
// $f->left = $j;
// $f->right = $g;
// $b->right = $c;
// $c->left = $k;


$d = new TreeNode('D');
$e = new TreeNode('E');
$f = new TreeNode('F');
$c = new TreeNode('C');
$b = new TreeNode('B');
$a = new TreeNode('A');
// $c->right = $f;
// $b->left = $d;
// $b->right = $e;
// $a->left = $b;
// $a->right = $c;
$a->createBinaryTree($b,$c);
$b->createBinaryTree($d,$e);
$c->createBinaryTree(null,$f);


var_dump($a);

//遍历二叉树
$pre = array();
$in = array();
$post = array();
$bread = array();

// echo "先序遍历： ";
// $pre = preOrder($a,$pre);
// echo "<br>";
// var_dump($pre);

// echo "中序遍历： ";
// $in = inOrder($a,$in);
// echo "<br>";
// var_dump($in);

// echo "后序遍历： ";
// $post = postOrder($a,$post);
// echo "<br>";
// var_dump($post);

// echo "树的深度为：";
// var_dump(getdepth($a));


// echo "广度优先遍历： ";

// //$bread = breadOrder1($a,$bread);
// $bread = breadOrder2($a,$bread);

// echo "<br>";
// var_dump($bread);


//重构二叉树
// echo "重构二叉树：";

// // $z = reConstructBinaryTree($prea,$ina);

// $z = reConstructBinaryTree($prea,$ina);
// var_dump($z);







// function reConstructBinaryTree($pre, $in){//根据先序遍历和中序遍历结果重构二叉树
// 	$root = new TreeNode($pre[0]);
// 	$count = count($pre);
// 	if($count>1){
// 		$flag = array_search($pre[0], $in);
// 		$pleft = array();
// 		$pright = array();
// 		$ileft = array();
// 		$iright = array();
// 		array_shift($pre);
// 		for($i=0; $i<$flag; $i++){
// 			$pleft[$i] = $pre[$i];
// 			$ileft[$i] = $in[$i];
// 		}
// 		for($i=0; $i<$count-$flag-1; $i++){
// 			$pright[$i] = $pre[$i+$flag]; 
// 			$iright[$i] = $in[$i+$flag+1];
// 		}
// 		if(count($pleft)&&count($pright)){
// 			$root->left = reConstructBinaryTree($pleft,$ileft);
// 			$root->right = reConstructBinaryTree($pright,$iright);
// 		}
// 		else if(count($pleft)){
// 			$root->left = reConstructBinaryTree($pleft,$ileft);
// 		}
// 		else if(count($pright)){
// 			$root->right = reConstructBinaryTree($pright,$iright);
// 		}
// 	}
// 	return $root;
// }
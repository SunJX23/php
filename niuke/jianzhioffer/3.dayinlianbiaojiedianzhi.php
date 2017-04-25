<?php

//输入一个链表，从尾到头打印链表每个节点的值。

class ListNode{    //结点类
	var $val;
	var $next;
	function __construct($value){
		$this->val = $value;
		$this->next = null;
	}
}

// class List{     //链表类
// 	public $head;
// 	function __construct($value){
// 		$this->head = new ListNode($value);
// 	}
	function createList(ListNode $head,$value)
	{
		if($head->val != null){
			$pnode = new ListNode($value);
			$head->next = $pnode;
		}
		else 
			echo "error!";
		return $pnode;
	}
// }


function printListFromHeadToTail($head)//从头到尾打印
{
	$current = $head;
	while ($current != null){
		echo $current->val." ";
		$current = $current->next;
	}
}

function printListFromTailToHead($head)//从尾到头打印
{
	$reverse = array();
	$current = $head;
	$i = 0;
	while ($current != null){
		$reverse[$i++] = $current->val;
		$current = $current->next;
	}
	return array_reverse($reverse);

}

$a = new ListNode(1);
$b = createList($a,2);
$c = createList($b,3);
$d = createList($c,4);
//printListFromHeadToTail($a);
print_r(printListFromTailToHead($a));


?>